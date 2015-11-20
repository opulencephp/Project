<% extends("errors/Error") %>

<% part("errorTitle") %>
    Something broke
<% endpart %>
<% part("errorDescription") %>
    <% if($__inDevelopmentEnvironment) %>
        <ul class="errors">
            <li><pre>{{ $__exception->getMessage() }}</pre></li>

            <% while($__exception = $__exception->getPrevious()) %>
                <li><pre>{{ $__exception->getMessage() }}</pre></li>
            <% endwhile %>
        </ul>
    <% else %>
        Sorry about that. We will look into what happened.
    <% endif %>
<% endpart %>