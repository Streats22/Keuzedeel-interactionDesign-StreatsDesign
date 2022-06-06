<?php
/**
 * @ Start function for Add Meta Box For Product  
 * @return
 *
 */
add_action('add_meta_boxes', 'foodbakery_meta_product_add');
if (!function_exists('foodbakery_meta_product_add')) {

    function foodbakery_meta_product_add() {
        global $foodbakery_var_frame_static_text;
        
        add_meta_box('foodbakery_meta_product', foodbakery_var_frame_text_srt('foodbakery_var_product_options'), 'foodbakery_meta_product', 'product', 'normal', 'high');
    }

}

/**
 * @ Start function for Meta Box For Product  
 * @return
 *
 */
if (!function_exists('foodbakery_meta_product')) {

    function foodbakery_meta_product($post) {
        global $foodbakery_var_frame_static_text;
       
        ?>
        <div class="page-wrap page-opts left" style="overflow:hidden; position:relative;">
            <div class="option-sec" style="margin-bottom:0;">
                <div class="opt-conts">
                    <div class="elementhidden">
                        <nav class="admin-navigtion">
                            <ul id="cs-options-tab">
                                <li><a name="#tab-general-settings" href="javascript:;"><i class="icon-cog3"></i><?php echo foodbakery_var_frame_text_srt('foodbakery_var_general_setting'); ?> </a></li>
                                <li><a name="#tab-slideshow" href="javascript:;"><i class="icon-forward2"></i> <?php echo foodbakery_var_frame_text_srt('foodbakery_var_subheader'); ?></a></li>
                            </ul> 
                        </nav>
                        <div id="tabbed-content">
                            <div id="tab-general-settings">
                                <?php
                                foodbakery_sidebar_layout_options();
                                ?>
                            </div>
                            <div id="tab-slideshow">
                                <?php foodbakery_subheader_element(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="clear"></div>
        <?php
    }
}