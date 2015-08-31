<?php

    class Habit
    {
      private $name;
      private $motivation;
      private $interval_days;
      private $id;

      function __construct($name, $motivation, $interval_days, $id = null)
      {
        $this->name = $name;
        $this->motivation = $motivation;
        $this->interval_days = $interval_days;
        $this->id = $id;
      }

      function getName()
      {
        return $this->name;
      }

      function setName($new_name)
      {
        $this->name = $new_name;
      }

    }

?>
