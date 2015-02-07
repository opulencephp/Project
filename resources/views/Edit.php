{% extends("Master.php") %}

{% part("content") %}
<h2>Editing This Project</h2>
<h3>Template Contents</h3>
<p>
    To change the contents of each page, change the templates in the <b>views</b> directory.
</p>
<p>
    If you want to create <i>Builders</i> for your templates, add them to <b>app/project/http/views/builders</b>.  Then, register each <i>Builder</i> to the appropriate template in <b>app/project/bootstrappers/http/views/Builders.php</b>.
</p>
<h3>Routes</h3>
<p>
    Create new routes in <b>configs/http/routing.php</b>.  To handle each route, add methods to <b>app/project/http/routing/Page.php</b>.
</p>
<h3>Console Commands</h3>
<p>
    You can run console commands running "<i>php rdev</i>" from your project's root directory.  To create a custom command, create a class that extends <i>RDev\Console\Commands\Command</i>, and put it in the <b>app/project/console/commands</b> directory.  Then, add the fully-qualified name of your command class to <b>app/configs/console/commands.php</b>.
</p>
<h3>Changing Namespaces</h3>
<p>
    You can change the root namespace <i>Project</i> to whatever you'd like using the console command "<i>app:rename Project INSERT_NEW_NAMESPACE_HERE</i>".
</p>
{% endpart %}