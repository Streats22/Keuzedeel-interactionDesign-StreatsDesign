<!-- The product template -->
<script type="text/template" id="productTemplate">
	<div class="flex-container-row">
		<%

	if ( fdoe.fdoe_show_images == "big")  {	%>
			<div data-label="" class="fdoe_thumb fdoe_thumb_big">
				<% if(fdoe.is_prem != 1 || fdoe.lazy_load != 1){ %>
				<%= image.src %>
				<% } %>
			</div>
			<% } else if( fdoe.fdoe_show_images == "rec"){

	%>
				<div data-label="" class="fdoe_thumb fdoe_thumb_normal" >
					<% if( fdoe.is_prem != 1 || fdoe.lazy_load != 1){ %>
				<%= image.src %>
				<% } %>
				</div>
				<% }

			else if( fdoe.fdoe_show_images == "small"){

	%>
					<div data-label="" class="fdoe_thumb fdoe_thumb_small">
					<% if(fdoe.is_prem != 1 || fdoe.lazy_load != 1){ %>
				<%= image.src %>
				<% } %>
					</div>
					<% }

%>
						<div data-label="" class="fdoe_desc fdoe_summary">
							<div class="fdoe_title">
								<h5><b> <%= title %></b><br><span class="fdoe_description"> <%= short_description %> </span></h5>
							</div>
						</div>
						<% if (fdoe.layout == 'fdoe_onecol') {%> <span class='fdoe_price_and_add_onecol'>

							<div class="fdoe_item_price fdoe_desc fdoe_add_price_item">


<% if( (is_variable && fdoe.popup_variable == "add") ) {%>

						<div class="fdoe-vari-radio"  >
		<form  class="fdoe-vari-form">
  <fieldset class="fdoe-fieldset" style="display:flex;flex-direction:column;">
		<%
		_.each(children,function(el,i){ %>

		<span class="fdoe-radio">
		<label class="fdoe-radio-label">
		<input  type="radio"  name="vari-radio" data-p_id="<%= id %>" data-variation_id="<%= el.id %>"  value="" >
		<span><%= el.name %></span> </label>
							<%= el.price %>
								</span>
								<% }) %> <input type="hidden" name="p_id" value=""> <input type="hidden" name="variation_id" value=""> <input type="hidden" name="quantity" value="1"> </fieldset>
									</form>
	</div>
	<% }else if (in_stock || ((is_variable && fdoe.popup_variable == "yes") || (is_simple && fdoe.popup_simple == "yes"))){ %>
		<%= price_html %>
			<% } %>
				</div>
				<div class="fdoe_desc fdoe_add_item fdoe_add_price_item <%=simple %><%=variable %>">
					<% if( (is_variable && fdoe.popup_variable == "yes") || (is_simple && fdoe.popup_simple == "yes" )) {%>
						<%= cart_button %> <span class="arolabel arolabel-success fdoe-alert fdoe_confirm_check"><%= fdoe.added_to_cart_string %></span>
							<% }else if(in_stock ){ %>
								<%= cart_button_add %> <span class="arolabel arolabel-success fdoe-alert fdoe_confirm_check"><%= fdoe.added_to_cart_string %></span>
									<% } else if(!in_stock){ %>

											<span class=" arolabel arolabel-default "><%= fdoe.not_avalible_message %></span>

											 <% } %>
				</div>
				</span>
				<% }else{ %>
					<div class="fdoe_item_price fdoe_desc fdoe_add_price_item">
						<% if( (is_variable && fdoe.popup_variable == "add") ) {%>
							<div class="fdoe-vari-radio">
								<form class="fdoe-vari-form">
									<fieldset class="fdoe-fieldset" style="display:flex;flex-direction:column;">
										<%
		_.each(children,function(el,i){ %> <span class="fdoe-radio">
		<label class="fdoe-radio-label">
		<input  type="radio"  name="vari-radio" data-p_id="<%= id %>" data-variation_id="<%= el.id %>"  value="" >
		<span><%= el.name %></span> </label>
											<%= el.price %>
												</span>
												<% }) %> <input type="hidden" name="p_id" value=""> <input type="hidden" name="variation_id" value=""> <input type="hidden" name="quantity" value="1"> </fieldset>
								</form>
							</div>
						<% }else if (in_stock || ((is_variable && fdoe.popup_variable == "yes") || (is_simple && fdoe.popup_simple == "yes"))){ %>
								<%= price_html %>
									<% } %>
					</div>
					<div class="fdoe_desc fdoe_add_item fdoe_add_price_item <%=simple %> <%=variable %>">
						<% if( (is_variable && fdoe.popup_variable == "yes") || (is_simple && fdoe.popup_simple == "yes" )) {%>
							<%= cart_button %> <span class="arolabel arolabel-success fdoe-alert fdoe_confirm_check"><%= fdoe.added_to_cart_string %></span>
								<% }else if(in_stock ){ %>
									<%= cart_button_add %> <span class="arolabel arolabel-success fdoe-alert fdoe_confirm_check"><%= fdoe.added_to_cart_string %></span>
										<% }else if(!in_stock){ %>

											<span class="arolabel arolabel-default"><%= fdoe.not_avalible_message %></span>
											 <% } %>
					</div>
					<% } %>
						</div>
</script>
