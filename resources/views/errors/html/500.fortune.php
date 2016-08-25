<% extends("errors/html/Error") %>

<% part("errorTitle") %>
Something broke
<% endpart %>
<% part("errorMessage") %>
<% if($__inDevelopmentEnvironment) %>
<ol class="errors">
    <li>
        <pre>{{ $__exception->getMessage() }}</pre>
    </li>

    <% while($__exception = $__exception->getPrevious()) %>
    <li>
        <pre>{{ $__exception->getMessage() }}</pre>
    </li>
    <% endwhile %>
</ol>
<% else %>
Sorry about that. We will look into what happened.
<% endif %>
<% endpart %>