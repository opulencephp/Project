<!DOCTYPE html>
<html>
    <head>
        {{!pageTitle($title)!}}
        {{!css($css)!}}
    </head>
    <body>
        <h1><a href="{{namedRouteURL('home')}}">{{projectName}}</a></h1>
        <nav>
            <a href="{{namedRouteURL('home')}}">Home</a>
        </nav>
        {{!content!}}
    </body>
</html>