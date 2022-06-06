
	<!-- The category template -->

	<script type="text/template" id="categoryTemplate">


		<span class="fdoe_title_text"> <i class=" <%= fdoe.cat_icon %> fa-xs fdoe-menu-title-icon"></i>
<% if ( fdoe.is_accordian == 1){ %>
  <a   data-toggle="arocollapse" href="#menucat_<%= cat_ID %>" aria-expanded="false" aria-controls="menucat_<%= cat_ID %>" data-parent="#the_menu"> <%= cat_name %></a>
    <% }else{ %>

	 <%= cat_name %>
	  <% } %>

	<i class=" <%= fdoe.cat_icon %> fa-xs fdoe-menu-title-icon"></i></span>

	 <% if ( fdoe.is_prem && typeof fdoedel !== 'undefined' && fdoedel.show_cat_desc == 1 && description){ %>

        <div class="menu_titles_desc">

		   <span class="fdoe_cat_desc"><%= description %>  </span>


			</div>
   <% } %>

    <% if ( fdoe.is_prem && typeof fdoedel !== 'undefined' && fdoedel.cat_image == 'yes' && image){ %>

        <div class="menu_titles_image">

		   <img src="<%= image %>" alt="<%=  cat_name %>" />



			</div>
   <% } %>





	</script>
