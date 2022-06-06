jQuery(function($) {

  $( document.body ).on( "click", ".add-cart", function() {
      var Selected = $(this);
      Selected.addClass('disable_click');
      var Form = $(this).parents('.rpress-food-options').find('form#fooditem-details');
      var itemId = $(this).attr('data-item-id');
      var itemPrice = $(this).attr('data-item-price');
      var action = 'rpress_add_to_cart';
      var itemQty = $(this).attr('data-item-qty');
      var FormData = Form.serializeArray();
      var SpecialInstruction = $(this).parents('.rpress-food-options').find('textarea.special-instructions').val();
      var GetDefaultText = Selected.text();
      Selected.text(RpressVars.wait_text);

      var data   = {
        action: action,
        fooditem_id: itemId,
        fooditem_price: itemPrice,
        fooditem_qty: itemQty,
        special_instruction: SpecialInstruction,
        post_data: Form.serializeArray()
      };

      if( itemId !== '' ) {
        $.ajax({
          type: "POST",
          data: data,
          dataType: "json",
          url: rpress_scripts.ajaxurl,
          xhrFields: {
            withCredentials: true
          },
          success: function(response) {
            if( response ) {
              Selected.removeClass('disable_click');
              Selected.text(RpressVars.added_into_cart);

              var DeliveryMethod = Cookies.get('deliveryMethod');
              var DeliveryTime = Cookies.get('deliveryTime');
              var DeliveryDate = Cookies.get('DeliveryDate');

              $('ul.rpress-cart').find('li.cart_item.empty').remove();
              $('ul.rpress-cart').find('li.cart_item.rpress_subtotal').remove();
              $('ul.rpress-cart').find('li.cart_item.cart-subtotal').remove();
              $('ul.rpress-cart').find('li.cart_item.rpress_cart_tax').remove();
              $('ul.rpress-cart').find('li.cart_item.rpress-cart-meta.rpress_subtotal').remove();

              $(response.cart_item).insertBefore('ul.rpress-cart li.cart_item.rpress_total');

              if( $('.rpress-cart').find('.rpress-cart-meta.rpress_subtotal').is(':first-child') ) {
                $(this).hide();
              }

              $('.rpress-cart-quantity').show().text(response.cart_quantity);
              $('.cart_item.rpress-cart-meta.rpress_total').find('.cart-total').text(response.total);
              $('.cart_item.rpress-cart-meta.rpress_subtotal').find('.subtotal').text(response.total);
              $('.cart_item.rpress-cart-meta.rpress_total').css('display', 'block');
              $('.cart_item.rpress-cart-meta.rpress_subtotal').css('display', 'block');
              $('.cart_item.rpress_checkout').addClass(rpress_scripts.button_color);
              $('.cart_item.rpress_checkout').css('display', 'block');


              if( DeliveryMethod !== ''  ) {
                var Html = '<span class="delMethod">'+ DeliveryMethod + ', ' + DeliveryDate + '</span>';

                if( DeliveryTime !== '' ) {
                  Html += '<span class="delTime">, '+ DeliveryTime + '</span>';
                }

                $('.delivery-items-options').find('.delivery-opts').html( Html );

                if( $('.delivery-wrap .delivery-change').length == 0 ) {
                  $( "<span class='delivery-change'>Change?</span>" ).insertAfter( ".delivery-opts" );
                }

              }

              $('.delivery-items-options').css('display', 'block');
              var SubTotalHtml = '<li class="cart_item rpress-cart-meta rpress_subtotal">'+RpressVars.total_text+'<span class="cart-subtotal">'+response.subtotal+'</span></li>';
              if( response.taxes ) {
                var TaxHtml = '<li class="cart_item rpress-cart-meta rpress_cart_tax">'+RpressVars.estimated_tax+'<span class="cart-tax">'+response.taxes+'</span></li>';
                $(TaxHtml).insertBefore('ul.rpress-cart li.cart_item.rpress_total');
                $(SubTotalHtml).insertBefore('ul.rpress-cart li.cart_item.rpress_cart_tax');
              }

              if( response.taxes === undefined ) {
                $('ul.rpress-cart').find('.cart_item.rpress-cart-meta.rpress_subtotal').remove();
                var cartLastChild = $('ul.rpress-cart').find('li.rpress-cart-item').last();
                $(SubTotalHtml).insertAfter(cartLastChild);
              }

              $(document.body).trigger('rpress_added_to_cart', [ response ]);
              $('ul.rpress-cart').find('.cart-total').html(response.total);
              $('ul.rpress-cart').find('.cart-subtotal').html(response.subtotal);

              if ( $( 'li.rpress-cart-item' ).length > 0 ){
                $( 'a.rpress-clear-cart' ).show();
              }else {
                $( 'a.rpress-clear-cart' ).hide();
              }

              $('#rpressModal').modal('hide');
            }
          }
        })
      }
  });

  jQuery( '.rpress-sidebar-cart' ).on( 'click', 'a.rpress-edit-from-cart', function() {
    $( this ).parents( '.rpress-cart-item' ).addClass( 'edited' );
    var CartItemId = $( this ).attr( 'data-remove-item' );
    var FoodItemId = $( this ).attr( 'data-item-id' );
    var FoodItemName = $( this ).attr( 'data-item-name' );
    var FoodItemPrice = $( this ).attr( 'data-item-price' );
    var FoodQuantity = $( this ).parents( '.rpress-cart-item' ).find( '.cart-item-quantity-wrap' ).children( '.rpress-cart-item-qty' ).text();
    var action = 'rpress_edit_food_item';
    $( '#rpressModal' ).removeClass( 'rpress-delivery-options' );

    var data   = {
      action: action,
      cartitem_id : CartItemId,
      fooditem_id : FoodItemId,
      fooditem_name : FoodItemName,
      fooditem_price : FoodItemPrice
    };

    if( CartItemId !== '' ) {
      $.fancybox.open({
        type     : 'html',
        afterShow : function(instance, current) {
          instance.showLoading( current );
        }
      });

      $.ajax({
        type: "POST",
        data: data,
        dataType: "json",
        url: rpress_scripts.ajaxurl,
        xhrFields: {
          withCredentials: true
      },
      success: function(response) {
        $.fancybox.close();
        $( '#rpressModal .modal-title' ).html( response.data.title_html );
        $( '#rpressModal .rpress-prices' ).html( response.data.fooditem_price );
        $( '#rpressModal .modal-body').html( response.data.html );
        $( "input[name='quantity']" ).val(FoodQuantity);
        $( '#rpressModal' ).find( '.submit-fooditem-button' ).attr( 'data-item-id', FoodItemId ); //setter
        $( '#rpressModal' ).find( '.submit-fooditem-button' ).attr( 'data-item-price', FoodItemPrice );
        $( '#rpressModal' ).find( '.submit-fooditem-button' ).attr( 'data-cart-key', CartItemId );
        $( '#rpressModal' ).find( '.submit-fooditem-button' ).removeClass( 'add-cart' );
        $( '#rpressModal' ).find( '.submit-fooditem-button' ).addClass( 'update-cart' );
        $( '#rpressModal' ).find( '.submit-fooditem-button' ).text( rpress_scripts.update_cart );

        $( '#rpressModal' ).modal();
      }
    });
    }
  });

  //Update Food Item
  $( document.body ).on( "click", ".update-cart", function() {
    if( $(this).hasClass('update-cart') ) {
      var Selected = $(this);
      var selectedList = $(this).parents('li.rpress-cart-item');
      var Form      = $(this).parents('#rpressModal').find('form#fooditem-update-details');
      var itemId    = $(this).attr('data-item-id');
      var itemPrice = $(this).attr('data-item-price');
      var cartKey   = $(this).attr('data-cart-key');
      var itemQty   = $(this).attr('data-item-qty');
      var action    = 'rpress_update_cart_items';
      var FormData  = Form.serializeArray();
      var SpecialInstruction = $(this).parents('#rpressModal').find('textarea.special-instructions').val();
      var GetDefaultText = Selected.text();
      Selected.text(RpressVars.wait_text);
      var Html = '';
      var CartItem = '';

      var data = {
        action            : action,
        fooditem_id       : itemId,
        fooditem_price    : itemPrice,
        fooditem_cartkey  : cartKey,
        fooditem_Qty      : itemQty,
        special_instruction: SpecialInstruction,
        post_data         : Form.serializeArray()
      };

      if( itemId !== '' ) {
        $.ajax({
          type     : "POST",
          data     : data,
          dataType : "json",
          url      : rpress_scripts.ajaxurl,
          xhrFields: {
            withCredentials: true
          },
          success: function(response) {
            if( response ) {
              Selected.text(RpressVars.added_into_cart);

              Html = response.cart_item;

              $('ul.rpress-cart').find('li.rpress_total .cart-total').text(response.total);
              $('ul.rpress-cart').find('li.cart_item.empty').remove();
              
              $('.rpress-cart >li.rpress-cart-item').each( function( index, item ) {
                $(this).find("[data-cart-item]").attr('data-cart-item', index);
                $(this).attr('data-cart-key', index);
                $(this).attr('data-remove-item', index);
              });
                  

            $( 'ul.rpress-cart' ).find( 'li.edited' ).replaceWith( function() {
              let obj = $(Html);
              obj.attr('data-cart-key', response.cart_key);
              
              
              obj.find("a.rpress-edit-from-cart").attr("data-cart-item", response.cart_key);
              obj.find("a.rpress-edit-from-cart").attr("data-remove-item", response.cart_key);

              obj.find("a.rpress_remove_from_cart").attr("data-cart-item", response.cart_key);
              obj.find("a.rpress_remove_from_cart").attr("data-remove-item", response.cart_key);


              return obj;
            } );

              $('ul.rpress-cart').find('.cart-total').html(response.total);
              $('ul.rpress-cart').find('.cart-subtotal').html(response.subtotal);
              $('ul.rpress-cart').find('.cart-tax').html(response.taxes);

              $(document.body).trigger('rpress_items_updated', [ response ]);

              $('#rpressModal').modal('hide');
            }
          }
        })
      }
    }
  });

  //ajax clear cart
  $( document.body ).on('click', 'a.rpress-clear-cart', function(e) {
    e.preventDefault();
    var Selected = $(this);
    var OldText = $(this).html();
    var action = 'rpress_clear_cart';
    var data = {
      action: action
    }
    $(this).text(RpressVars.wait_text);

    $.ajax({
      type: "POST",
      data: data,
      dataType: "json",
      url: rpress_scripts.ajaxurl,
      xhrFields: {
        withCredentials: true
      },
      success : function(response) {
        if( response.status == 'success' ) {
          $('ul.rpress-cart').find('li.cart_item.rpress_total').css('display','none');
          $('ul.rpress-cart').find('li.cart_item.rpress_checkout').css('display','none');
          $('ul.rpress-cart').find('li.rpress-cart-item').remove();
          $('ul.rpress-cart').find('li.cart_item.empty').remove();
          $('ul.rpress-cart').find('li.rpress_subtotal').remove();
          $('ul.rpress-cart').find('li.rpress_cart_tax').remove();
          $('ul.rpress-cart').find('li.rpress-delivery-fee').remove();
          $('ul.rpress-cart').append(response.response);
          $('.rpress-cart-number-of-items').css('display','none');
          $('.delivery-items-options').css('display', 'none');
          $('ul.rpress-cart').find('.rpress_delivery_fee').css('display', 'none');
          Selected.html(OldText);
          Selected.hide();
        }
      }
    });
  });


  //quantity Minus
  var liveQtyVal;

  $( document.body ).on('click', '.qtyminus', function(e) {
    // Stop acting like a button
    e.preventDefault();

    // Get the field name
    fieldName = 'quantity';

    // Get its current value
    var currentVal = parseInt($('input[name='+fieldName+']').val());

    // If it isn't undefined or its greater than 0
    if (!isNaN(currentVal) && currentVal > 1) {

    // Decrement one only if value is > 1
      $('input[name='+fieldName+']').val(currentVal - 1);
      $('.qtyplus').removeAttr('style');
      liveQtyVal = currentVal - 1;
    }
    else {
      // Otherwise put a 0 there
      $('input[name='+fieldName+']').val(1);
      $('.qtyminus').css('color','#aaa').css('cursor','not-allowed');
      liveQtyVal = 1;
    }
    $(this).parents('div.modal-footer').find('a.submit-fooditem-button').attr('data-item-qty', liveQtyVal);
    $(this).parents('div.modal-footer').find('a.submit-fooditem-button').attr('data-item-qty', liveQtyVal);

  });

  //Show Image on Modal
  $(".rpress-thumbnail-popup").fancybox({
    openEffect  : 'elastic',
    closeEffect : 'elastic',

    helpers : {
      title : {
        type : 'inside'
      }
    }
  });


  $( document.body ).on('click', '.qtyplus', function(e) {
    // Stop acting like a button
    e.preventDefault();

    // Get the field name
    fieldName = 'quantity';
    // Get its current value
    var currentVal = parseInt($('input[name='+fieldName+']').val());
    // If is not undefined
    if (!isNaN(currentVal)) {
      $('input[name='+fieldName+']').val(currentVal + 1);
      $('.qtyminus').removeAttr('style');
      liveQtyVal = currentVal + 1;
    } else {
      // Otherwise put a 0 there
      $('input[name='+fieldName+']').val(1);
      liveQtyVal = 1;
    }
    $(this).parents('div.modal-footer').find('a.submit-fooditem-button').attr('data-item-qty', liveQtyVal);
    $(this).parents('div.modal-footer').find('a.submit-fooditem-button').attr('data-item-qty', liveQtyVal);

  });

  //Close minimum order error modal
  $( document.body ).on('click', '#rpress-err-close-button', function() {
    $.fancybox.close();
  });

  $( document.body ).on('click', 'a.special-instructions-link', function(e) {
    e.preventDefault();
    $(this).parent('div').find('.special-instructions').toggleClass('hide');
  });

  //Disable Checkout and check for errors
  $('body').on('click', '.cart_item.rpress_checkout a', function(e) {
    e.preventDefault();
    var CheckoutUrl = rpress_scripts.checkout_page;

    var deliveryOption = Cookies.get('deliveryMethod');
    var deliveryTime = Cookies.get('deliveryTime');
    var ErrorHtml;

    var action = 'rpress_proceed_checkout';
    var prevText = $(this).text() ;
    var $this = $(this);
    var data = {
      action       : action,
      deliveryOpt  : deliveryOption,
      deliveryTime : deliveryTime,
    }

    $.ajax({
      type: "POST",
      data: data,
      dataType: "json",
      url: rpress_scripts.ajaxurl,
      beforeSend : function(){
       $this.text(RpressVars.wait_text);
      },
      xhrFields: {
        withCredentials: true
      },
      success : function(response) {
        
        $this.text( prevText );
        
        if( response.status == 'error' ) {
          if( response.error_msg ) {
            ErrorString = response.error_msg;
          }

          ErrorHtml = '<a id="RPressError" href="#RPressMinOrder"></a>';
          ErrorHtml += '<div class="RPressMinOrderWrap">';
          ErrorHtml += '<p id="RPressMinOrder">'+ ErrorString +'';
          ErrorHtml += '<a href="javascript:void(0)" title="Close" id="rpress-err-close-button">&times;</a>';
          ErrorHtml += '</p></div>';

          document.body.insertAdjacentHTML('beforeend' , ErrorHtml );
          $("#RPressError").fancybox().trigger('click');
        }
        else {
          $this.attr('disabled');
          window.location.href = CheckoutUrl;
        }
      }
    });
  });

  if ($(window).width() > 991) {
    var TotalHeight = 120;

    if ($(".sticky-sidebar").length != '') {
      $('.sticky-sidebar').rpressStickySidebar({
        additionalMarginTop: TotalHeight
      });
    }
  }
  else {
    var TotalHeight = 70;
  }

  //RestroPress category link click
  $( document.body ).on('click', '.rpress-category-link', function(e) {
    e.preventDefault();
    var this_id = $(this).data('id');
    var gotom = setInterval(function () {
        rpress_go_to_navtab(this_id);
        clearInterval(gotom);
    }, 100);
  });

  function rpress_go_to_navtab(id) {
    var scrolling_div = $('div.rpress_fooditems_list').find('div#menu-category-'+id);
    if( scrolling_div.length ) {
      Offset = scrolling_div.offset().top;

      var body = $('html, body');
      body.animate({
        scrollTop: Offset - TotalHeight
      }, 500);
      
    }
  }


  //jQuery live search
  $('.rpress_fooditems_list').find('.rpress-title-holder a').each(function(){
    $(this).attr('data-search-term', $(this).text().toLowerCase());
  });

  $('#rpress-food-search').on('keyup', function(){
    var searchTerm = $(this).val().toLowerCase();
    var DataId;
    var SelectedTermId;
    $('.rpress_fooditems_list').find('.rpress-element-title').each(function(index, elem) {
      $(this).removeClass('not-matched');
      $(this).removeClass('matched');
    });
    $('.rpress_fooditems_list').find('.rpress-title-holder a').each(function(){
      DataId = $(this).parents('.rpress_fooditem').attr('data-term-id');
      if ($(this).filter('[data-search-term *= ' + searchTerm + ']').length > 0 || searchTerm.length < 1) {
        $(this).parents('.rpress_fooditem').show();
        $('.rpress_fooditems_list').find('.rpress-element-title').each(function(index, elem) {
          if( $(this).attr('data-term-id') == DataId ) {
            $(this).addClass('matched');
          }
          else {
            $(this).addClass('not-matched');
          }
        });
      }
      else {
        $(this).parents('.rpress_fooditem').hide();
        $('.rpress_fooditems_list').find('.rpress-element-title').each(function(index, elem) {
          $(this).addClass('not-matched');
        });
      }
    });
  });

  $( document.body ).on('click', '.rpress-filter-toggle', function() {
    $('div.rpress-filter-wrapper').toggleClass('active');
  });

  /* Show hide cutlery icon on smaller devices */
  $( ".rpress-mobile-cart-icons" ).click(function(){
    $( ".rpress-sidebar-main-wrap" ).css( "left", "0%" );
  });

  $( ".close-cart-ic" ).click(function(){
    $( ".rpress-sidebar-main-wrap" ).css( "left", "100%" );
  });

});
