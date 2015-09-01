<?php

    // DEPENDENCIES
    require_once __DIR__."/../vendor/autoload.php"; // frameworks
    // require_once __DIR__."/../src/Client.php";
    // require_once __DIR__."/../src/Handler.php";
    // require_once __DIR__."/../src/CoR/TestCoR.php";
    require_once __DIR__."/../src/CoR/Client.php";
    require_once __DIR__."/../src/CoR/Handler.php";
    require_once __DIR__."/../src/CoR/Request.php";
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
        $new_client = new Client($_POST['query']);
        $returned_text = $new_client->processRequests();

        // Render data returned from the CoR
        return $app['twig']->render('question.html.twig', array(
            'question' => $returned_text
        ));
    });

    return $app;
?>