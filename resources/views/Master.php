<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=1024" />
        {{!pageTitle($title)!}}
        {{!css("http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,700italic,300,400,700")!}}
        {{!css($css)!}}
    </head>
    <body>
        <header class="main">
            {% include("MainNav.php") %}
        </header>
        <main class="main">
            {% show("content") %}
        </main>
        <footer class="main">
            {% include("MainNav.php") %}
            My First RDev Project
        </footer>
    </body>
</html>