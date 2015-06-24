{% extends("Master.php") %}

{% part("content") %}
<h2>Editing This Project</h2>
<section id="console-commands">
    <h3>Console Commands</h3>
    You can run console commands running "<i>php rdev</i>" from your project's root directory.  To create a custom command, create a class that extends <i>RDev\Console\Commands\Command</i>, and put it in the <b>app/project/console/commands</b> directory.  Then, add the fully-qualified name of your command class to <b>app/configs/console/commands.php</b>.
</section>
<section id="changing-namespaces">
    <h3>Renaming Your Application</h3>
    You can change the root namespace <i>Project</i> to whatever you'd like using the console command "<i>app:rename Project INSERT_NEW_NAMESPACE_HERE</i>".
</section>
<section id="routes">
    <h3>Routes</h3>
    Create new routes in <b>configs/http/routes.php</b>.  To handle each route, add methods to <b>app/project/http/controllers/Page.php</b>.
</section>
<section id="templates">
    <h3>Templates</h3>
    <p>
        To change the contents of each page, change the templates in the <b>resources/views</b> directory.  To change the CSS, edit <b>public/assets/css/style.css</b>.
    </p>
    <p>
        If you want to create <i>Builders</i> for your templates, add them to <b>app/project/http/views/builders</b>.  Then, register each <i>Builder</i> to the appropriate template in <b>app/project/bootstrappers/http/views/Builders.php</b>.
    </p>
</section>
<section id="official-docs">
    <h3>Learn More</h3>
    Read the <a href="http://www.rdevphp.com/docs" target="_blank" title="Read the official documentation">official documentation</a>.
</section>
{% endpart %}