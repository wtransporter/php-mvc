## PHP MVC Framework

This is simple PHP framework ONLY for education and testing purpose.

- Simple router (accept $uri as first param, and $callback as second).
$callback can be function, string or array with two keys: Valid controller class and controller method.
<pre>
$router->get('/', function() {
    return 'Index';
});
</pre>
<pre>
$router->get('/', 'index');
</pre>
<pre>
$router->get('/', [PageController::class, 'index']);
</pre>