<?php
/**
 * Main plugin Templates Post Type File.
 *
 * @since 1.0
 * @package	Foodbakery
 */
// Direct access not allowed.
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Templates Post Type Class.
 */
class Foodbakery_Email_Templates_Post {

    public static $email_template_options;

    /**
     * Put hooks in place and activate.
     */
    public function __construct() {
	add_action('init', array($this, 'init'), 5);
    }

    public function init() {
	$this->register_emails_post_type();
	$this->register_email_post_taxonomy();
	$this->load_email_template_options();
	add_action('save_post', array($this, 'save_templates_meta'));
	if (is_admin()) {
	    add_action('add_meta_boxes', array($this, 'templates_meta_box'));
	    add_filter('post_row_actions', array($this, 'remove_quick_edit'), 10, 2);
	    add_action('admin_head', array($this, 'custom_admin_css_callback'));
	    add_filter('manage_posts_columns', array($this, 'remove_post_columns_callback'));
	    add_filter('manage_edit-jh-templates_columns', array($this, 'columns'), 15);
	    add_action('manage_jh-templates_posts_custom_column', array($this, 'custom_columns'), 15, 2);
	}
    }

    /**
     * Load email template types.
     */
    public function load_email_template_options() {
	self::$email_template_options = array(
	    'types' => array(),
	    'templates' => array(),
	    'variables' => array(),
	);

	self::$email_template_options = apply_filters('foodbakery_email_template_settings', self::$email_template_options, 1);
    }

    /**
     * Remove Checkboxes column from Email Template restaurant page
     */
    public function remove_post_columns_callback($columns) {
	global $post;

	if (isset($post) && $post->post_type == 'jh-templates') {

	    // Remove the checkbox and date column

	    unset($columns['date']);
	}
	return $columns;
    }

    public function columns($columns) {
	$columns['help'] = __('Help', 'jh-emails');
	return $columns;
    }

    public function custom_columns($column, $post_id) {
	if ($column == 'help') {
	    $description = get_post_meta($post_id, 'description', true);
	    if ($description != '') {
		if (function_exists('foodbakery_tooltip_text')) {
		    echo foodbakery_tooltip_text($description);
		}
	    } else {
		echo esc_html('&ndash;');
	    }
	}
    }

    /**
     * Remove Table nav, filters and search box from Email templates restaurant.
     */
    public function custom_admin_css_callback() {
	global $post;
	if (isset($post) && $post->post_type == 'jh-templates') {
	    wp_enqueue_style('foodbakery_email_templates_css', plugins_url('/assets/css/foodbakery-email-templates.css', __FILE__));
	}
    }

    /**
     * Removes quick edit and delete from custom post type list.
     */
    public function remove_quick_edit($actions) {
	global $post;
	if ($post->post_type == 'jh-templates') {
	    unset($actions['inline hide-if-no-js']);
	    unset($actions['trash']);
	    unset($actions['duplicate_post']);
	}
	return $actions;
    }

    /**
     * Save Post type meta data.
     */
    public function save_templates_meta($post_id = '') {
	global $post;

	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
	    return;
	}
	if (is_admin()) {

	    foreach ($_POST as $key => $value) {
		if (strstr($key, 'jh_')) {
		    update_post_meta($post_id, $key, $value);
		}
	    }
	    if (!empty($_POST)) {
		$value = (isset($_POST['jh_email_notification']) && $_POST['jh_email_notification'] == 1) ? $_POST['jh_email_notification'] : 0;
		update_post_meta($post_id, 'jh_email_notification', $value);
	    }
	}
    }

    /**
     * Register Custom Post Type for Job Email_Templates
     */
    public function register_emails_post_type() {

	$labels = array(
	    'name' => _x('Email Templates', 'post type general name', 'foodbakery-email-templates'),
	    'singular_name' => _x('Email Templates', 'post type singular name', 'foodbakery-email-templates'),
	    'menu_name' => _x('Email Templates', 'admin menu', 'foodbakery-email-templates'),
	    'name_admin_bar' => _x('Email Templates', 'add new on admin bar', 'foodbakery-email-templates'),
	    'add_new' => _x('Add New', 'book', 'foodbakery-email-templates'),
	    'add_new_item' => __('Add New Email Template', 'foodbakery-email-templates'),
	    'new_item' => __('New Email Template', 'foodbakery-email-templates'),
	    'edit_item' => __('Edit Email Template', 'foodbakery-email-templates'),
	    'view_item' => __('View Email Template', 'foodbakery-email-templates'),
	    'search_items' => __('Search Email Templates', 'foodbakery-email-templates'),
	    'parent_item_colon' => __('Parent Job Emails:', 'foodbakery-email-templates'),
	    'not_found' => __('No Email Template found.', 'foodbakery-email-templates'),
	    'not_found_in_trash' => __('No Email Templates found in Trash.', 'foodbakery-email-templates')
	);

	$args = array(
	    'labels' => $labels,
	    'description' => __('This allows user to manage job email templates.', 'foodbakery-email-templates'),
	    'public' => false,
	    'publicly_queryable' => false,
	    'show_ui' => true,
	    'show_in_menu' => 'edit.php?post_type=restaurants',
	    'query_var' => false,
	    'rewrite' => array('slug' => 'jh-templates'),
	    'capability_type' => 'post',
	    'create_posts' => false,
	    'has_archive' => false,
	    'hierarchical' => false,
	    'menu_position' => null,
	    'supports' => array('title', 'editor')
	);

	// Register custom post type.
	register_post_type("jh-templates", $args);
    }

    /**
     * Add new taxonomy for email post type, make it hierarchical (like categories).
     */
    public function register_email_post_taxonomy() {

	$labels = array(
	    'name' => _x('Email Template Groups', 'Email Template Group', 'foodbakery-email-templates'),
	    'singular_name' => _x('Email Template Group', 'Email Template Group', 'foodbakery-email-templates'),
	    'search_items' => __('Search Email Template Groups', 'foodbakery-email-templates'),
	    'all_items' => __('All Email Template Group', 'foodbakery-email-templates'),
	    'parent_item' => __('Parent Email Template Group', 'foodbakery-email-templates'),
	    'parent_item_colon' => __('Parent Email Template Group:', 'foodbakery-email-templates'),
	    'edit_item' => __('Edit Email Template Group', 'foodbakery-email-templates'),
	    'update_item' => __('Update Email Template Group', 'foodbakery-email-templates'),
	    'add_new_item' => __('Add New Email Template Group', 'foodbakery-email-templates'),
	    'new_item_name' => __('New Email Template Group Name', 'foodbakery-email-templates'),
	    'menu_name' => __('Email Template Group', 'foodbakery-email-templates'),
	);

	$args = array(
	    'hierarchical' => true,
	    'labels' => $labels,
	    'show_admin_column' => true,
	    'rewrite' => array('slug' => 'email-template-group'),
	);

	register_taxonomy('email_template_group', 'jh-templates', $args);
    }

    /*
     * @ Metabox
     */

    public function templates_meta_box() {
	add_action('edit_form_after_title', array($this, 'render_email_template_type_meta_box'));
	add_meta_box('jh_email_variables', esc_html__('Template Variables', 'foodbakery-email-templates'), array($this, 'template_variables'), 'jh-templates', 'side', 'core');
	add_meta_box('jh_email_template_config', esc_html__('Email Template Options', 'foodbakery-email-templates'), array($this, 'email_template_type_options'), 'jh-templates', 'side', 'core');
    }

    public function email_template_type_meta_box() {
	global $post, $foodbakery_html_fields, $foodbakery_plugin_options;
	$jh_from = isset($foodbakery_plugin_options['foodbakery_smtp_sender_email']) ? $foodbakery_plugin_options['foodbakery_smtp_sender_email'] : '';
	if ($post->post_type == 'jh-templates') {

	    $email_template_type = get_post_meta($post->ID, 'jh_email_template_type', true);


	    $jh_subject = get_post_meta($post->ID, 'jh_subject', true);
	    $jh_recipients = get_post_meta($post->ID, 'jh_recipients', true);
	    $is_recipients_enabled = get_post_meta($post->ID, 'is_recipients_enabled', true);
	    $ecipients_enabled = '';
	    if ($is_recipients_enabled == false) {
		$ecipients_enabled = 'disabled';
	    }
	    ?>

	    <div class="jh-email-helper-variables">
	        <div class="jh-form-elements">
	    	<div style="display:none;">
	    	    <div class="jh-label">
	    		<label><?php _e('Email Template Type', 'foodbakery-email-templates'); ?></label>
	    	    </div>
	    	    <div class="jh-field">
	    		<select name="jh_email_template_type" class="slct_jh_email_template_type">
	    <?php foreach (self::$email_template_options['types'] as $key => $type): ?>

				    <?php if ($type != 'general') : ?>
		    		    <option value="<?php echo $type; ?>" <?php
		    if ($type == $email_template_type) {
			echo 'selected';
		    }
		    ?>> <?php echo ucfirst($type); ?></option>
					    <?php endif; ?>
					<?php endforeach; ?>
	    		</select>
	    	    </div>
	    	</div>
	    	<h3><?php echo esc_attr($post->post_title); ?></h3>

	    	<div class="email-template-fields">
	    	    <div class="jh-field subject">
	    		<input type="text" name="jh_subject" value="<?php echo esc_attr($jh_subject); ?>" placeholder="<?php _e('Subject', 'foodbakery-email-templates'); ?>">
	    	    </div>
	    	    <div class="jh-field">
	    		<input title="<?php _e('You can configure sender email from plugin settings under SMPT settings', 'foodbakery-email-templates'); ?>"type="text" name="jh_from" value="<?php echo esc_attr($jh_from); ?>" placeholder="<?php _e('From', 'foodbakery-email-templates'); ?>" disabled>
	    	    </div>

	    	    <div class="jh-field last">
	    		<input type="text" name="jh_recipients" value="<?php echo esc_attr($jh_recipients); ?>" placeholder="<?php _e('Recipients', 'foodbakery-email-templates'); ?>" <?php echo $ecipients_enabled; ?>>
	    	    </div>
	    	</div>

	        </div>
	    </div>

	    <script tyep="text/javascript">
	        var default_templates = <?php echo json_encode(self::$email_template_options["templates"]); ?>;
	       
	        (function ($) {
	    	$(function () {
	    	    var template_type = $(".slct_jh_email_template_type").val();
	    	    var selected_type_class = '.' + template_type.toLowerCase().replace(/\s/g, "-") + '-variables-list';
	    	    $(".variables-list").hide();
	    	    // Show only General and selected type variables.
	    	    $(".general-variables-list," + selected_type_class).show();

	    	    $(".slct_jh_email_template_type").change(function () {
	    		change_template();
	    	    });

	    	    $("#btn-restore-default-template").click(function () {
	    		change_template();
	    	    });

	    	    function change_template() {

	    		var template_type = $(".slct_jh_email_template_type").val();


	    		var selected_type_class = '.' + template_type.toLowerCase().replace(/\s/g, "-") + '-variables-list';
	    		
	    		$(".variables-list").hide();
	    		// Show only General and selected type variables.
	    		$(".general-variables-list," + selected_type_class).show();
	    		if ($("#wp-content-wrap").hasClass("tmce-active")) {
	    		    console.log(default_templates[template_type]);
	    		    tinyMCE.activeEditor.setContent(default_templates[template_type]);
	    		} else {
	    		    $('#content').val(default_templates[template_type]);
	    		}
	    	    }
	    	});
	        })(jQuery);
	    </script>
	    <?php
	}
    }

    public function render_email_template_type_meta_box() {
	$this->email_template_type_meta_box();
	// Get the globals.
	global $post, $wp_meta_boxes;

	// Output the "top" meta boxes.
	do_meta_boxes(get_current_screen(), 'top', $post);

	// Remove the initial "top" meta boxes.
	unset($wp_meta_boxes['jh-templates']['top']);
    }

    /*
     * @ Dynamic Variables
     */

    public function template_variables() {
	global $post;

	ob_start();
	?>
	<div class="jh-email-helper-variables">
		
	    <p><?php _e('Click variables to add them in Template', 'foodbakery-email-templates'); ?></p>

	    <?php foreach (self::$email_template_options['variables'] as $group_name => $tags): ?>
	        <div class="<?php echo str_replace(' ', '-', strtolower($group_name)) . '-variables-list'; ?> variables-list">
	    	<h4><?php echo ucfirst($group_name); ?></h4>
	    	<ul class="jh-var-list">
			<?php foreach ($tags as $key => $tag_details): ?>
			    <li><a class="add-email-var" data-variable="<?php echo $tag_details['tag']; ?>" title="<?php echo $tag_details['display_text']; ?>"><?php echo '[' . $tag_details['tag'] . ']'; ?></a></li>
			<?php endforeach; ?>
	    	</ul>
	        </div>
	    <?php endforeach; ?>
	</div>
	<?php
	$jh_html = ob_get_clean();

	echo force_balance_tags($jh_html);
    }

    public function email_template_type_options() {
	global $post;
	$jh_email_notification = get_post_meta($post->ID, 'jh_email_notification', true);
	$jh_email_type = get_post_meta($post->ID, 'jh_email_type', true);
	$checked = 'checked';
	$plain_text_checked = $html_checked = '';
	$notification_value = 1;
	if ($jh_email_notification == 1) {
	    $checked = 'checked';
	    $notification_value = 1;
	} else if ($jh_email_notification == 0 && $jh_email_notification != '') {
	    $checked = 'unchecked';
	    $notification_value = 0;
	}
	if ($jh_email_type == 'plain_text') {
	    $plain_text_checked = 'checked';
	} else if ($jh_email_type == 'html') {
	    $html_checked = 'checked';
	} else {
	    $html_checked = 'checked';
	}
	?>
	<div class="jh-email-helper-variables email-template_options">
	    <div class="opt-conts">
		<div class="jh-form-elements">
		    <div class="jh-label">
			<input type="button" value="<?php _e('Restore Default Template', 'foodbakery-email-templates'); ?>" name="btn-restore-default-template" id="btn-restore-default-template" style="background-color: #63aa63;">
		    </div>
		    <div class="jh-label">
			<label><b><?php _e('Enable/Disable Email Notification:', 'foodbakery-email-templates'); ?></b></label>&nbsp;&nbsp;&nbsp;
			<input type="checkbox" id="jh_email_notification" name="jh_email_notification" value="<?php echo $notification_value; ?>" <?php echo $checked; ?>>
		    </div>
		    <div class="jh-label">
			<label><b><?php _e('Email Type:', 'foodbakery-email-templates'); ?></b></label>&nbsp;&nbsp;&nbsp;
			<input type="radio" id="plain_text" name="jh_email_type" value="plain_text" <?php echo $plain_text_checked; ?>> <label for="plain_text"><?php _e('Plain Text', 'foodbakery-email-templates'); ?></label>  &nbsp;&nbsp;
			<input type="radio" id="html" name="jh_email_type" value="html" <?php echo $html_checked; ?>> <label for="html"><?php _e('HTML', 'foodbakery-email-templates'); ?></label>
		    </div>
		    <div class="clear"></div>

		</div>
	    </div>
	</div>
	<?php
    }

}

$foodbakery_email_templates_instance = new Foodbakery_Email_Templates_Post();
