<?php

    // DEPENDENCIES
    require_once __DIR__."/../vendor/autoload.php";

    // CoR stuff
    require_once __DIR__."/../src/CoR/Client.php";
    require_once __DIR__."/../src/CoR/Handler.php";
    require_once __DIR__."/../src/CoR/ChainRequest.php";
    require_once __DIR__."/../src/CoR/Page.php";
    require_once __DIR__."/../src/CoR/WhatQuestionHandler.php";
    require_once __DIR__."/../src/CoR/WhyQuestionHandler.php";
    require_once __DIR__."/../src/CoR/MostBasicStepHandler.php";


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

    $app->post("/question_handler", function() use ($app) {
        // Make the new Client with the data from the form,
        // which will pass on the request to the appropriate handler
        // using the chain of responsibility.
        $new_request = new ChainRequest($_POST['query']);
        $new_client = new Client($new_request);

        // The Handlers will each return a Page object
        $page = $new_client->processRequests();

        // Render data returned from the CoR as a Page object
        return $app['twig']->render($page->getTemplateUrl(), $page->getData());
    });

    // Coach route for new project
    $app->get("/coach/new_habit/{page_id}", function($page_id) use ($app) {

        return "Placeholder route for page {$page_id} in new project coach flow.";
    });

    // Coach route for existing project
    $app->get("/coach/habit/{page_id}", function($page_id) use ($app) {

        return "Placeholder route for page {$page_id} in existing project coach flow.";
    });

    return $app;
?>
