<?php
    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */
    require_once __DIR__."/../src/CoR/Client.php";
    require_once __DIR__."/../src/CoR/Handler.php";
    require_once __DIR__."/../src/CoR/ChainRequest.php";
    require_once __DIR__."/../src/CoR/Page.php";
    require_once __DIR__."/../src/CoR/WhatQuestionHandler.php";
    require_once __DIR__."/../src/CoR/WhyQuestionHandler.php";
    require_once __DIR__."/../src/CoR/MostBasicStepHandler.php";
    require_once __DIR__."/../src/CoR/MostBasicStepHandler.php";


    // No DB yet
    // $server = 'mysql:host=localhost;dbname=lifecoach_test';
    // $username = 'root';
    // $password = 'root';
    // $DB = new PDO($server, $username, $password);
    class ClientTest extends PHPUnit_Framework_TestCase
    {
        // protected function tearDown()
        // {
        //     Habit::deleteAll();
        // }


        function test_processRequestsWhat()
        {
            //Arrange
            $query = "what";
            $new_request = new ChainRequest($query);
            $new_client = new Client($new_request);

            //Act
            $result = $new_client->processRequests();

            //Assert
            $what_text = "What is your new project?";
            $this->assertEquals($what_text, $result->getData()['question']);
        }

        function test_processRequestsWhy()
        {
            //Arrange
            $query = "why";
            $new_request = new ChainRequest($query);
            $new_client = new Client($new_request);

            //Act
            $result = $new_client->processRequests();

            //Assert
            $why_text = "Why do you want to work on this project?";
            $this->assertEquals($why_text, $result->getData()['question']);
        }

        function test_processRequestsMBS()
        {
            //Arrange
            $query = "mostbasicstep";
            $new_request = new ChainRequest($query);
            $new_client = new Client($new_request);

            //Act
            $result = $new_client->processRequests();

            //Assert
            $mbs_text = "What is the most basic step to complete?";
            $this->assertEquals($mbs_text, $result->getData()['question']);
        }


    }
 ?>
