<!DOCTYPE html>
<html>
    <head>
        {{!pageTitle($title)!}}
        {{!css($css)!}}
    </head>
    <body>
        <header>
            <h1><a href="{{route('home')}}" title="Home">{{projectName}}</a></h1>
            <nav>
                <ul>
                    <li><a href="{{route('home')}}" title="Home">Home</a></li>
                    <li><a href="{{route('edit')}}" title="How to edit this project">How to Edit This Project</a></li>
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