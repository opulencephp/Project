{% extend("Master.php") %}

{% part("content") %}
<h2>Editing This Project</h2>
<h3>Template Contents</h3>
<p>
    To change the contents of each page, change the templates in the <b>views</b> directory.
</p>
<p>
    If you want to create <i>Builders</i> for your templates, add them to <b>app/project/views/builders</b>.  Then, register each <i>Builder</i> to the appropriate template in <b>app/project/views/bootstrappers/Builders.php</b>.
</p>
<h3>Routes</h3>
<p>
    Create new routes in <b>configs/routing.php</b>.  To handle each route, add methods to <b>app/project/controllers/Page.php</b>.
</p>
{% endpart %}