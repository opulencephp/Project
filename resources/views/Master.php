<!DOCTYPE html>
<html>
    <head>
        {{!pageTitle($title)!}}
        {{!css($css)!}}
    </head>
    <body>
        <header class="main">
            {% include("MainNav.php") %}
        </header>
        <main class="{{!$mainClasses!}}">
            {% show("content") %}
        </main>
        <footer class="main">
            {% include("MainNav.php") %}
            My First RDev Project
        </footer>
    </body>
</html>