
	<!-- The productmodal template -->

	<script type="text/template" id="productmodalTemplate">

   <div class="aromodal product-aromodal fdoe-aromodal fade-aro" style="display:none;" id="myModal_<%= id %>" data-id="<%= id %>"

 tabindex="-1" role="dialog" aria-labelledby="productModalLabel_<%= id %>"

 aria-hidden="true">
        <div class="aromodal-dialog" role="document">
            <div class="aromodal-content">
                <div class="aromodal-header">
                    <h5 class="aromodal-title" id="productModalLabel_<%= id %>"

></h5> <button type="button" class="close" data-dismiss="aromodal" aria-label="<%= fdoe.close_text %>"">
          <span aria-hidden="true">&times;</span>
        </button> </div>
                <div class="aromodal-body">
					<div class="container-fluid">
						<div class="arorow">
								<div id="fdoe_insert_product_shortcode_<%= id %>" class="arocol-xs-12 fdoe_insert_product_shortcode">

								<% if(fdoe.product_modal_template_ == 'theme'){%>
									<%= single_shortcode %>
								<% } %>

</div>
								</div>
				</div>
						</div>
                <div class="aromodal-footer"> <button type="button" class="button" data-dismiss="aromodal">
           <%= fdoe.close_text %>
</button>
				</div>
            </div>
        </div>
    </div>






	</script>
