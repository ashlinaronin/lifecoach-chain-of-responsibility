<?php
/**
* @backupGlobals disabled
* @backupStaticAttributes disabled
*/
    require_once "src/Habit.php";
    $server = 'mysql:host=localhost;dbname=lifecoach_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);
    class HabitTest extends PHPUnit_Framework_TestCase
    {

        function testGetName()
        {
            $name = "Meditate";
            $motivation = "Clarity";
            $interval_days = 3;


            $test_habit = new Habit($name, $motivation, $interval_days);
            $result = $test_habit->getName();

            $this->assertEquals($name, $result);

        }

        function testSetName()
        {
            $name = "Meditate";
            $motivation = "Clarity";
            $interval_days = 3;

            $test_habit = new Habit($name, $motivation, $interval_days);
            $result = $test_habit->getName();

            $this->assertEquals("Meditate", $result);
        }
    }
?>
