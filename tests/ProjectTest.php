<?php

/**
* @backupGlobals disabled
* @backupStaticAttributes disabled
*/

    require_once "src/Project.php";
    // require_once "src/Step";


    $server = 'mysql:host=localhost;dbname=lifecoach_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);


    class ProjectTest extends PHPUnit_Framework_TestCase
    {

        protected function tearDown()
        {
            Project::deleteAll();
            // Steps::deleteAll();
        }

        function test_getName()
        {
            //Arrange
            $name = "Build a shed";
            $motivation = "have storage";
            $due_date = "2015-09-09";
            $priority = 1;
            $test_project = new Project($name,$motivation,$due_date,$priority);

            //Act
            $result = $test_project->getName();

            //Assert
            $this->assertEquals($name, $result);

        }

        function test_save()
        {
            //Arrange
            $name = "Build a shed";
            $motivation = "have storage";
            $due_date = "2015-09-09";
            $priority = 1;
            $test_project = new Project($name,$motivation,$due_date,$priority);

            //Act
            $test_project->save();

            //Assert
            $result = Project::getAll();
            $this->assertEquals([$test_project], $result);

        }









    }




?>
