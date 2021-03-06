var $ = jQuery;

$(document).on('click', '.menu-category-link', function () {
    var this_id = $(this).data('id');
    var gotom = setInterval(function () {
        restaurant_go_to_navtab(this_id);
        clearInterval(gotom);
    }, 400);
    $('ul.nav-tabs').find('a[href="#home"]').trigger('click');
    $('.menu-list li').removeClass('active');
    $(this).parent().addClass('active');
});

$(document).ready(function () {
    $('[data-toggle="tooltip"]').tooltip();
});

function restaurant_go_to_navtab(id) {
    var scrolling_div = $('#menu-category-' + id);
    $('html, body').animate({
        scrollTop: scrolling_div.offset().top - 70
    }, 500);
}

function cs_number_format(num) {
    "use strict";
    return parseFloat(Math.round(num * 100) / 100).toFixed(2);
}

$(document).on('keyup', '.dev-menu-search-field', function () {
    var keyword_val;
    var restaurant_id = $(this).data('id');
    var this_val = $(this).val();

    var main_con = $('#menu-item-list-' + restaurant_id);

    keyword_val = this_val;

    $.ajax({
        url: foodbakery_singles_gl.ajax_url,
        method: "POST",
        data: '_restaurant_id=' + restaurant_id + '&_menu_keyword=' + keyword_val + '&action=restaurant_detail_menu_search',
        dataType: "json"
    }).done(function (response) {
        main_con.html(response.html);
    }).fail(function () {

    });

});

//$(document).on('change', '#dev-menu-orders-list input[name="order_fee_type"]', function () {
$(document).on('change', 'input[name="order_fee_type"]', function () {

    var selected_type_fee = $('input[name="order_fee_type"]:checked').data('fee');
    var selected_type_label = $('input[name="order_fee_type"]:checked').data('label');
    var fee_con = $('#dev-menu-orders-list').find('.restaurant-fee-con');

    fee_con.find('.dev-menu-charges').html(cs_number_format(selected_type_fee));
    fee_con.find('.dev-menu-charges').attr('data-confee', selected_type_fee);
    fee_con.find('.dev-menu-charges').attr('data-fee', selected_type_fee);
    fee_con.find('.fee-title').html(selected_type_label);

    //var subtotal = $('#dev-menu-orders-list').find('.dev-menu-subtotal').text();
    //var charges = $('#dev-menu-orders-list').find('.dev-menu-charges').attr('data-fee');
    //var vtax = $('#dev-menu-orders-list').find('.dev-menu-vtax').html();
    //var total = parseFloat(subtotal) + parseFloat(charges) + parseFloat(vtax);
    //$('#dev-menu-orders-list').find('.dev-menu-grtotal').text(total);

    var _this_type = $('input[name="order_fee_type"]:checked').data('type');
    var _rid = $(this).parents('.dev-select-fee-option').data('rid');
    var ajax_url = foodbakery_singles_gl.ajax_url;
    $.ajax({
        url: ajax_url,
        method: "POST",
        data: 'this_type=' + _this_type + '&_rid=' + _rid + '&action=foodbakery_restaurant_set_fee_type',
        dataType: "json"
    }).done(function (response) {
    }).fail(function () {
    });
    $('#dev-menu-orders-list').trigger('contentchanged');
});

function reset_menu_box(modal_bs) {
    var extras_cons = modal_bs.find('.extras-detail-main');

    if (extras_cons.length !== 0) {
        $.each(extras_cons, function (index, element) {
            if (index == 0) {
                $(this).find('.extras-detail-options').show();
            } else {
                $(this).find('.extras-detail-options').hide();
            }
            $(this).find('.extras-detail-selected').html('');
            $(this).find('input[type="radio"]').prop('checked', false);
        });
    }
    modal_bs.find('button.add-extra-menu-btn').hide();
    modal_bs.find('.reset-menu-fields').hide();
}

$(document).on('click', '.reset-menu-fields', function () {

    var modal_bs = $(this).parents('.menu-extras-modal');

    // reseting box
    reset_menu_box(modal_bs);
});

$(document).on('click', '.dev-adding-menu-btn', function () {
    var menu_id = $(this).data('id');
    var menu_cat_id = $(this).data('cid');
    var modal_bs = $('#extras-' + menu_cat_id + '-' + menu_id);

    var cart_btn = modal_bs.find('button.add-extra-menu-btn');
    cart_btn.html(foodbakery_singles_gl.add_to_menu);

    cart_btn.removeClass('editing-menu');
    cart_btn.removeAttr('data-rand');

    // reseting box
    reset_menu_box(modal_bs);
});

$(document).on('click', '.dev-update-menu-btn', function () {
    var menu_id = $(this).data('id');
    var menu_cat_id = $(this).data('cid');
    var menu_rand = $(this).data('rand');
    var modal_bs = $('#extras-' + menu_cat_id + '-' + menu_id);

    var cart_btn = modal_bs.find('button.add-extra-menu-btn');
    cart_btn.html(foodbakery_singles_gl.update);

    cart_btn.removeClass('editing-menu');
    cart_btn.addClass('editing-menu');
    cart_btn.attr('data-rand', menu_rand);

    // reseting box
    reset_menu_box(modal_bs);
});

$(document).on('click', '.restaurant-add-menu-btn', function () {
    "use strict";
    var selecting_type,
            _this = $(this),
            _this_id = _this.data('id'),
            _this_rid = _this.data('rid'),
            _this_menu_cat_id = _this.data('cid'),
            ajax_url = foodbakery_singles_gl.ajax_url,
            plugin_url = foodbakery_singles_gl.plugin_dir_url,
            this_loader = $('#add-menu-loader-' + _this_id);
    if (!_this.hasClass('is-disabled')) {

        var thisObj = _this;
        foodbakery_show_loader('.restaurant-add-menu-btn-' + _this_id + '', '', 'button_loader', thisObj);
        _this.addClass('is-disabled');

        //this_loader.html('<div class="loader-holder"><img src="' + plugin_url + 'assets/frontend/images/ajax-loader.gif" alt=""></div>');
        selecting_type = $.ajax({
            url: ajax_url,
            method: "POST",
            data: 'menu_cat_id=' + _this_menu_cat_id + '&menu_id=' + _this_id + '&_rid=' + _this_rid + '&extra_atts=&action=foodbakery_restaurant_add_menu_item',
            dataType: "json"
        }).done(function (response) {
            //this_loader.html('');
            //foodbakery_show_response(response);
            foodbakery_show_response(response, '', thisObj);
            if (typeof response.li_html !== 'undefined' && response.li_html != '') {
                $('#dev-menu-orders-list > ul').append(response.li_html);
                $('#dev-menu-orders-list').show();
                $('#dev-no-menu-orders-list').hide();
                $('.user-order-holder').find('.discount-info').hide();
                $('.user-order-holder').find('.pre-order-msg').hide();
            }
            _this.removeClass('is-disabled');
            $('#dev-menu-orders-list').trigger('contentchanged');
        }).fail(function () {
            //this_loader.html('');
            foodbakery_show_response('', '', thisObj);
            _this.removeClass('is-disabled');
        });
    }
});

$(document).on('click', '.dev-remove-menu-item', function () {
    var selecting_type,
            _this = $(this),
            _this_index = _this.parents('li').index(),
            _this_rid = _this.parents('ul').data('rid'),
            ajax_url = foodbakery_singles_gl.ajax_url,
            plugin_url = foodbakery_singles_gl.plugin_dir_url,
            this_loader = $(this);

    if (!_this.hasClass('is-disabled')) {
        _this.addClass('is-disabled');
        this_loader.html('<img src="' + plugin_url + 'assets/frontend/images/ajax-loader.gif" alt="">');
        selecting_type = $.ajax({
            url: ajax_url,
            method: "POST",
            data: '_id=' + _this_index + '&_rid=' + _this_rid + '&action=foodbakery_restaurant_remove_menu_item',
            dataType: "json"
        }).done(function (response) {
            this_loader.html('<i class=" icon-cross3"></i>');
            _this.removeClass('is-disabled');

            if (_this.parents('ul').find('> li').length === 1) {
                $('#dev-menu-orders-list').hide();
                $('#dev-no-menu-orders-list').show();
                $('.user-order-holder').find('.discount-info').show();
                $('.user-order-holder').find('.pre-order-msg').show();
            }

            _this.parents('li').remove();
            $('#dev-menu-orders-list').trigger('contentchanged');

        }).fail(function () {
            this_loader.html('<i class=" icon-cross3"></i>');
            _this.removeClass('is-disabled');
        });
    }
});

$(document).on('click', '.add-extra-menu-btn', function () {
    thisObj = jQuery(this);
    foodbakery_show_loader('.add-extra-menu-btn', '', 'button_loader', thisObj);
    var _this = $(this),
            _this_menu_cat_id = _this.data('menucat-id'),
            _this_menu_id = _this.data('menu-id'),
            _this_rid = _this.data('rid'),
            main_con = $('#extras-' + _this_menu_cat_id + '-' + _this_menu_id),
            add_cart_btn = main_con.find('button.add-extra-menu-btn'),
            ajax_url = foodbakery_singles_gl.ajax_url,
            plugin_url = foodbakery_singles_gl.plugin_dir_url,
            this_loader = _this.next('span');

    var is_updating = 'false';
    var rand_numb = 0;
    var menu_index = 0;
    if (_this.hasClass('editing-menu')) {
        is_updating = 'true';
        rand_numb = _this.attr('data-rand');
        menu_index = $('#menu-added-' + rand_numb).index();
    }

    var extras_con = main_con.find('.extras-detail-main');
    var total_extras = extras_con.length;

    if (total_extras > 0) {
        var extra_check_f = true;
        var extra_name_arr = [];
        $.each(extras_con, function (index, element) {
            var this_extr = $(this).find('input[name="extra-' + index + '-' + _this_menu_id + '"]');
            var this_extra_n = index + '-' + _this_menu_id;
            extra_name_arr.push(this_extra_n);
            if (!this_extr.is(":checked")) {
                extra_check_f = false;
            }
        });

        if (false === extra_check_f) {
            alert(foodbakery_singles_gl.select_menu_items);
        } else {
            var extra_index = '';
            var extra_labels_arr = [];
            $.each(extra_name_arr, function (index, element) {
                var this_extr_name = main_con.find('input[name="extra-' + element + '"]:checked');
                extra_index = this_extr_name.data('ind');
                extra_labels_arr.push(extra_index);
            });
            if (!_this.hasClass('is-disabled')) {
                _this.addClass('is-disabled');
                this_loader.html('<img src="' + plugin_url + 'assets/frontend/images/ajax-loader.gif" alt="">');
                extra_labels_arr = extra_labels_arr.toString();
                $.ajax({
                    url: ajax_url,
                    method: "POST",
                    data: 'menu_cat_id=' + _this_menu_cat_id + '&menu_id=' + _this_menu_id + '&_rid=' + _this_rid + '&extra_atts=' + extra_labels_arr + '&act_updating=' + is_updating + '&menu_index=' + menu_index + '&action=foodbakery_restaurant_add_menu_item',
                    dataType: "json"
                }).done(function (response) {
                    this_loader.html('');
                    foodbakery_show_response(response, '', thisObj);
                    if (typeof response.li_html !== 'undefined' && response.li_html != '') {
                        if ('true' == is_updating) {
                            $('#menu-added-' + rand_numb).after(response.li_html);
                            $('#menu-added-' + rand_numb).remove();
                        } else {
                            $('#dev-menu-orders-list > ul').append(response.li_html);
                            $('#dev-menu-orders-list').show();
                            $('#dev-no-menu-orders-list').hide();
                        }
                    }
                    _this.removeClass('is-disabled');
                    $.each(extra_name_arr, function (index, element) {
                        var this_extr_name = main_con.find('input[name="extra-' + element + '"]:checked');
                        this_extr_name.prop('checked', false);
                    });
                    add_cart_btn.hide();
                    main_con.modal('toggle');
                    $('#dev-menu-orders-list').trigger('contentchanged');

                }).fail(function () {
                    this_loader.html('');
                    _this.removeClass('is-disabled');
                });
            }
        }
    }

});

$(document).on('click', '.extras-detail-att input[type="radio"]', function () {
    var _this = $(this),
            _this_menu_id = _this.data('menu-id'),
            main_con = _this.parents('.menu-selection-container'),
            add_cart_btn = main_con.find('button.add-extra-menu-btn'),
            reset_fields_btn = main_con.find('a.reset-menu-fields');

    var extras_con = main_con.find('.extras-detail-main');
    var total_extras = extras_con.length;

    //
    _this.parents('.extras-detail-options').hide();
    var inject_selected = '<i class="icon-check2"></i> <span>' + (_this.parents('label').find('.extra-title').html() + ' - ' + _this.parents('label').find('.extra-price').html()) + '</span>';
    _this.parents('.extras-detail-main').find('.extras-detail-selected').html(inject_selected);
    _this.parents('.extras-detail-main').next('.extras-detail-main').find('.extras-detail-options').show();
    //

    if (total_extras > 0) {
        var extra_check_f = true;
        $.each(extras_con, function (index, element) {
            var this_extr = $(this).find('input[name="extra-' + index + '-' + _this_menu_id + '"]');
            if (!this_extr.is(":checked")) {
                extra_check_f = false;
            }
        });
    }
    if (true === extra_check_f) {
        add_cart_btn.show();
        reset_fields_btn.show();
    } else {
        add_cart_btn.hide();
        reset_fields_btn.hide();
    }
});

$(document).on('contentchanged', '#dev-menu-orders-list', function () {
    var subtotal = 0;
    var subtotal_noc = 0;
    var subtotal_con = $('#dev-menu-orders-list').find('.dev-menu-subtotal');
    var main_con = $('#dev-menu-orders-list');

    var main_menus = main_con.find('> ul > li');

    $.each(main_menus, function (index, element) {
        var this_pr = $(this).attr('data-conpr');

        subtotal += parseFloat(this_pr);

        var this_pr_noc = $(this).attr('data-pr');
        subtotal_noc += parseFloat(this_pr_noc);

    });

    subtotal_con.html(cs_number_format(subtotal));
    $('#order_subtotal_price').val(cs_number_format(subtotal_noc));

    var menu_fee_pr = $('#dev-menu-orders-list').find('.dev-menu-charges').attr('data-confee');
    var menu_fee_pr_noc = $('#dev-menu-orders-list').find('.dev-menu-charges').attr('data-fee');
    if (parseFloat(menu_fee_pr) > 0) {
        subtotal += parseFloat(menu_fee_pr);
    }

    if (parseFloat(menu_fee_pr_noc) > 0) {
        subtotal_noc += parseFloat(menu_fee_pr_noc);
    }


    var vat_switch = $('#dev-menu-orders-list').find('.dev-menu-price-con').attr('data-vatsw');
    var vat_perc = $('#dev-menu-orders-list').find('.dev-menu-price-con').attr('data-vat');

    var vat_price = 0;
    if (vat_switch == 'on' && subtotal > 0) {
        vat_price = (subtotal / 100) * (parseFloat(vat_perc));
        $('#dev-menu-orders-list').find('.dev-menu-vtax').html(cs_number_format(vat_price));
        $('#order_vat_cal_price').val(cs_number_format(vat_price));
    }

    subtotal += vat_price;

    if (vat_switch == 'on' && subtotal_noc > 0) {
        var vat_price_noc = (subtotal_noc / 100) * (parseFloat(vat_perc));
        $('#order_vat_cal_price').val(cs_number_format(vat_price_noc));
    }
    subtotal_noc += vat_price_noc;

    $('#dev-menu-orders-list').find('.dev-menu-grtotal').html(cs_number_format(subtotal));

});

$(document).on('click', '.menu-order-confirm', function () {
    var _this = $(this),
            ajax_url = foodbakery_singles_gl.ajax_url,
            plugin_url = foodbakery_singles_gl.plugin_dir_url,
            this_loader = _this.next('.menu-loader');
    thisObj = jQuery(this);
    thisObj.css('position', 'relative');
    foodbakery_show_loader('.menu-order-confirm', '', 'button_loader', thisObj);
    var rid = _this.data('rid');
    var pay_method = '';
    var order_subtotal_price = '';
    var order_vat_percent = '';
    var order_vat_cal_price = '';
    var delivery_date = '';

    if ($('.dev-order-pay-options').find('input[name="order_payment_method"]').length !== 0) {
        pay_method = $('.dev-order-pay-options').find('input[name="order_payment_method"]:checked').data('type');
    }

    if ($('#order_subtotal_price').length !== 0) {
        order_subtotal_price = $('#order_subtotal_price').val();
    }
    if ($('#order_vat_percent').length !== 0) {
        order_vat_percent = $('#order_vat_percent').val();
    }
    if ($('#order_vat_cal_price').length !== 0) {
        order_vat_cal_price = $('#order_vat_cal_price').val();
    }
    
    if ($('input[name="delivery_date"]').length !== 0) {
        delivery_date = $('input[name="delivery_date"]').val();
    }
    
    if (!_this.hasClass('is-disabled')) {
        _this.addClass('is-disabled');
        //this_loader.html('<img src="' + plugin_url + 'assets/frontend/images/ajax-loader.gif" alt="">');
        $.ajax({
            url: ajax_url,
            method: "POST",
            data: '_pay_method=' + pay_method + '&_rid=' + rid + '&order_subtotal_price=' + order_subtotal_price + '&order_vat_percent=' + order_vat_percent + '&order_vat_cal_price=' + order_vat_cal_price + '&delivery_date=' + delivery_date + '&action=foodbakery_restaurant_order_confirm',
            dataType: "json"
        }).done(function (response) {
            if (response.type == 'redirect') {
                this_loader.html(response.message);
            } else {
                this_loader.html('');
            }
            if (response.type == 'success' && response.pay_method == 'cash') {
                $('#dev-menu-orders-list').find('> ul > li').remove();
                $('#dev-menu-orders-list').hide();
                $('#dev-no-menu-orders-list').show();
            }
            foodbakery_show_response(response, '', thisObj);
            _this.removeClass('is-disabled');

        }).fail(function () {
            this_loader.html('');
            _this.removeClass('is-disabled');
        });
    }
});

var is_device = function () {
 "use strict";
 return {
  init: function () {
   var isMobile = {
    Android: function () {
     return navigator.userAgent.match(/Android/i);
    },
    BlackBerry: function () {
     return navigator.userAgent.match(/BlackBerry/i);
    },
    iOS: function () {
     return navigator.userAgent.match(/iPhone|iPad|iPod/i);
    },
    Opera: function () {
     return navigator.userAgent.match(/Opera Mini/i);
    },
    Windows: function () {
     return navigator.userAgent.match(/IEMobile/i);
    },
    any: function () {
     return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
    }
   };
   if (isMobile.any()) {

   } else {
    // scroll to top disable for mobile Start
    /*if ($(window).width() > 767) {
     jQuery(document).on('shown.bs.tab', '.stickynav-tabs a[data-toggle="tab"]', function (e) {
      jQuery("html, body").animate({
       scrollTop: 0
      }, 'slow');
     });
    }*/
    // scroll to top disable for mobile End
   }
  }
 };

}();

$(document).ready(function () {
 "use strict";
 is_device.init(); // init core 
});