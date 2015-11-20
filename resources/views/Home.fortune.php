<% extends("Master") %>

<% part("content") %>
    <section id="congratulations">
        <h2>Congratulations!</h2>
        You just successfully created your first Opulence application. That wasn't too hard, was it?
    </section>
    <section id="routes">
        <h3>Routes</h3>
        Create new routes in <b>config/http/routes.php</b>. To handle each route, add methods to <b>src/Project/Http/Controllers/Page.php</b>.
    </section>
    <section id="views">
        <h3>Views</h3>

        <p>
            To change the contents of each page, change the views in the <b>resources/views</b> directory. To change the
            CSS, edit <b>public/assets/css/style.css</b>.
        </p>

        <p>
            If you want to create <i>ViewBuilders</i>, add them to <b>src/Project/Http/Views/Builders</b>. Then, register
            each <i>ViewBuilder</i> to the appropriate template in <b>src/Project/Bootstrappers/Http/Views/BuildersBootstrapper.php</b>.
        </p>
    </section>
    <section id="changing-namespaces">
        <h3>Renaming Your Application</h3>
        You can change the root namespace <i>Project</i> to whatever you'd like using the console command "<i>php apex
            app:rename Project INSERT_NEW_NAMESPACE_HERE</i>".
    </section>
    <section id="console-commands">
        <h3>Console Commands</h3>
        You can run console commands running "<i>php apex</i>" from your project's root directory. To create a custom
        command, create a class that extends <i>Opulence\Console\Commands\Command</i>, and put it in the <b>src/Project/Console/Commands</b>
        directory. Then, add the fully-qualified name of your command class to <b>config/console/commands.php</b>.
    </section>
    <section id="official-docs">
        <h3>Learn More</h3>
        Read the <a href="https://www.opulencephp.com/docs" target="_blank" title="Read the official documentation">official
            documentation</a>.
    </section>
<% endpart %>