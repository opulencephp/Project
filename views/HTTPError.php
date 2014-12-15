{% extends("Master.php") %}

{% part("content") %}
<h2>{{errorMessage}}</h2>
This is a custom error page.
{% endpart %}