{% extends("Master.php") %}

{% part("content") %}
<h2>Congratulations on creating your first RDev application!</h2>
Feel free to play around with this project.  <a href="{{namedRouteURL('edit')}}">Want some guidance?</a>
{% endpart %}