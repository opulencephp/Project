<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="initial-scale=1"/>
        {{! charset("utf-8") !}}
        {{! pageTitle($title) !}}
        {{! css("http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,700italic,300,400,700") !}}
        {{! css($css) !}}
        <link rel="icon" type="image/png" href="/favicon-32x32.png?v=1.0" sizes="32x32">
        <link rel="icon" type="image/png" href="/favicon-16x16.png?v=1.0" sizes="16x16">
    </head>
    <body>
        <main class="main">
            <% show("content") %>
        </main>
    </body>
</html>