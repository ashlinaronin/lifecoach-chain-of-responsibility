<?php

    // DEPENDENCIES
    require_once __DIR__."/../vendor/autoload.php";

    // require all of Chain of Responsibility stuff
    foreach (glob(__DIR__."/../src/CoR/*.php") as $filename) {
        require_once $filename;
    }


    // no server for now
    // $server = 'mysql:host=localhost:3306;dbname=shoes';
    // $username = 'root';
    // $password = 'root';
    // $DB = new PDO($server, $username, $password);

    $app = new Silex\Application();
    $app->register(new Silex\Provider\TwigServiceProvider(), array(
        'twig.path' => __DIR__."/../views"
    ));

    // Allow PATCH, DELETE HTTP methods
    use Symfony\Component\HttpFoundation\Request;
    Request::enableHttpMethodParameterOverride();


    $app->get("/", function() use ($app) {
        return $app['twig']->render('index.html.twig');
    });

    $app->post("/coach/new_project", function() use ($app) {
        // Make the new Client with the data from the form,
        // which will pass on the request to the appropriate handler
        // using the chain of responsibility.
        var_dump($_POST['coach_chain']);
        $new_request = new ChainRequest($_POST['coach_chain']);
        $new_client = new NewProjectClient($new_request);

        // Handler will return a Page object
        $page = $new_client->processRequests();

        // Render data returned from the CoR as a Page object
        return $app['twig']->render($page->getTemplateUrl(), $page->getData());
    });

    // // Coach route for new project
    // $app->get("/coach/new_habit/{page_id}", function($page_id) use ($app) {
    //
    //     return "Placeholder route for page {$page_id} in new project coach flow.";
    // });
    //
    // // Coach route for existing project
    // $app->get("/coach/habit/{page_id}", function($page_id) use ($app) {
    //
    //     return "Placeholder route for page {$page_id} in existing project coach flow.";
    // });

    return $app;
?>
