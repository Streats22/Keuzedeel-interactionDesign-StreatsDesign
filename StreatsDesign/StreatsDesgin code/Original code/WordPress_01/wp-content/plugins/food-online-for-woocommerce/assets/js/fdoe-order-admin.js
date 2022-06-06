jQuery(document).ready(function($) {

	jQuery('.woocommerce_page_wc-settings').find('.fdoe_premium_option').parent('label').after('<span class="fdoe_premium_link" ><a  target="_blank" class="premium_link_ref" href="https://foodonlineplugin.com/">Premium</a></span>');
	jQuery('.woocommerce_page_wc-settings').find('select.fdoe_premium_option').after('<span class="fdoe_premium_link" ><a  target="_blank" class="premium_link_ref" href="https://foodonlineplugin.com/">Premium</a></span>');
	jQuery('.woocommerce_page_wc-settings').find('.fdoe_premium_option[type=text]').after('<span class="fdoe_premium_link" ><a  target="_blank" class="premium_link_ref" href="https://foodonlineplugin.com/">Premium</a></span>');
	jQuery('.woocommerce_page_wc-settings').find('.fdoe_premium_option.right_container-heading ').append('<span class="fdoe_premium_link" ><a  target="_blank" class="premium_link_ref" href="https://foodonlineplugin.com/">Premium</a></span>');


	  $('#fdoe_product_popup_content_spec option[value="rating_"], #fdoe_product_popup_content_spec option[value="desc_"]').prop('disabled', true);
	// Enables the color picker in settings page

	$('.fdoe-color-picker').wpColorPicker();

	if (!$('#fdoe_popup_simple:checkbox').prop('checked') && $('#fdoe_popup_variable').find('option:selected').attr("value") !== 'yes') {
		$('#fdoe_product_popup_content').parents('tr').hide();
			$('#fdoe_product_popup_content_spec').parents('tr').hide();
	}
	$('#fdoe_popup_simple:checkbox , #fdoe_popup_variable').change(function() {
		if (this.checked) {
			$('#fdoe_product_popup_content').parents('tr').fadeIn('slow');
			if ($('#fdoe_product_popup_content').find('option:selected').attr("value") == 'custom' || $(this).find('option:selected').attr("value") == 'style-1') {
				$('#fdoe_product_popup_content_spec').parents('tr').fadeIn('slow');
			}
		}else if($(this).find('option:selected').attr("value") == 'yes'){

			$('#fdoe_product_popup_content').parents('tr').fadeIn('slow');
			if ($('#fdoe_product_popup_content').find('option:selected').attr("value") == 'custom' || $(this).find('option:selected').attr("value") == 'style-1') {
				$('#fdoe_product_popup_content_spec').parents('tr').fadeIn('slow');
			}
		}




		else if ((!$('#fdoe_popup_simple:checkbox').prop('checked') && $('#fdoe_popup_variable').find('option:selected').attr("value") !== 'yes')) {
			$('#fdoe_product_popup_content_spec').parents('tr').hide();
			$('#fdoe_product_popup_content').parents('tr').hide();
		}
	});


	if ($('#fdoe_product_popup_content').find('option:selected').attr("value") == 'theme') {
		$('#fdoe_product_popup_content_spec').parents('tr').hide();
	}
	$('#fdoe_product_popup_content').change(function() {
		if ($(this).find('option:selected').attr("value") == 'theme') {
			$('#fdoe_product_popup_content_spec').parents('tr').hide();
		} else if ($(this).find('option:selected').attr("value") == 'custom' || $(this).find('option:selected').attr("value") == 'style-1') {
			$('#fdoe_product_popup_content_spec').parents('tr').fadeIn('slow');
		}
	});


	if ($('#fdoe_minicart_style').find('option:selected').attr("value") == 'theme') {
		$('#fdoe_minicart_reverse_order').parents('tr').hide();
	}
	$('#fdoe_minicart_style').change(function() {
		if ($(this).find('option:selected').attr("value") == 'theme') {
			$('#fdoe_minicart_reverse_order').parents('tr').hide();
		} else  {
			$('#fdoe_minicart_reverse_order').parents('tr').fadeIn('slow');
		}
	});



	$('.woocommerce').find('table').show();
	$('.woocommerce').find('h2').show();


});
