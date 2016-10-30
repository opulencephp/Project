<% extends("Master") %>

<% part("content") %>
<div id="main-wrapper">
    <section id="message">
        <h1><% show("errorTitle") %></h1>
        <% part("errorMessage") %>
        Something went wrong.  We will look into what happened.
        <% show %>
    </section>
</div>
<% endpart %>