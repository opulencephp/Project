<!DOCTYPE html>
<html>
    <head>
        {{!pageTitle($title)!}}
        {{!css($css)!}}
    </head>
    <body>
        <header>
            <h1><a href="{{namedRouteURL('home')}}">{{projectName}}</a></h1>
            <nav>
                <ul>
                    <li><a href="{{namedRouteURL('home')}}">Home</a></li>
                    <li><a href="{{namedRouteURL('edit')}}">How to Edit This Project</a></li>
                </ul>
            </nav>
        </header>
        <main>
            {% show("content") %}
        </main>
        <footer>
            My First RDev Project
        </footer>
    </body>
</html>