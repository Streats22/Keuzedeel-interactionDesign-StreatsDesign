

<!-- The Top Menu template -->

	<script type="text/template" id="topmenuTemplate">



<% if(fdoe.is_accordian == 1){ %>


  <a data-toggle="arocollapse" href="#menucat_<%= cat_ID %>" aria-expanded="false" aria-controls="menucat_<%= cat_ID %>" data-parent="#the_menu"> <%= cat_name %>

    </a>

<% }else{ %>

<a href="#menucat_<%= cat_ID %>" >
    <%= cat_name %>
    </a>
<% } %>




    </script>
