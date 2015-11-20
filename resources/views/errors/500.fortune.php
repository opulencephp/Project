<% extends("errors/Error") %>

<% part("errorTitle") %>
    Something broke
<% endpart %>
<% part("errorDescription") %>
    <% if($__inDevelopmentEnvironment) %>
        {{ $__exception->getMessage() }}
    <% else %>
        Sorry about that. We will look into what happened.
    <% endif %>
<% endpart %>