<% extends("Master.php") %>

<% part("content") %>
<section id="congratulations">
    <h2>Congratulations!</h2>
    You just successfully created your first Opulence application.  That wasn't too hard, was it?
</section>
<section id="more-help">
    <h2>Need More Help?</h2>
    <a href="{{route('edit')}}" title="Learn how to edit this project">Learn how to edit this project</a> or checkout the <a href="http://www.opulencephp.com/docs" target="_blank" title="Read the official documentation">official documentation</a>.
</section>
<% endpart %>