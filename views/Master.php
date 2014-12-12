<!DOCTYPE html>
<html>
    <head>
        {{!pageTitle($title)!}}
        {{!css($css)!}}
    </head>
    <body>
        <div id="siteWrapper">
            <h1><a href="{{namedRouteURL('home')}}">{{projectName}}</a></h1>
            <nav>
                <ul>
                    <li><a href="{{namedRouteURL('home')}}">Home</a></li>
                    <li><a href="{{namedRouteURL('edit')}}">How to Edit This Project</a></li>
                </ul>
            </nav>
            {% show("content") %}
        </div>
    </body>
</html>