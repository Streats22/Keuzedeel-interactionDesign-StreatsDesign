<!-- The productmodal template -->

	<script type="text/template" id="productmodalTemplate2">

   <div class="aromodal product-aromodal product-modal-style-1 fdoe-aromodal fade-aro" style="display:none;" id="myModal_<%= id %>" data-id="<%= id %>"

 tabindex="-1" role="dialog" aria-labelledby="productModalLabel_<%= id %>"

 aria-hidden="true">
        <div class="aromodal-dialog" role="document">
            <div class="aromodal-content">


                  <button type="button" class="modal-close" data-dismiss="aromodal" aria-label="<%= fdoe.close_text %>">
       <i class="far fa-times-circle fa-3x"></i>
        </button>
                <div class="aromodal-body">
                  <% if(fdoe.image_in_modal == 1){ %>
			 <span class="fdoe-modal-2-image">

			</span>
			<% } %>
			<span class="fdoe-modal-2-title"> <%= title %></span>
			<span class="fdoe-modal-2-price"><%= price_html %></span>
			 <% if(fdoe.desc_in_modal == 1){ %>
			<span class="fdoe-modal-2-description"><%= short_description %></span>
			<% } if(is_simple){ %>
				<%= single_shortcode %>
				<% } if(is_variable) {%>
                    <span class="fdoe-modal-2-add">  </span>
		      <% } %>


					<div class="container-fluid">

				</div>
						</div>

            </div>
        </div>
    </div>







	</script>
