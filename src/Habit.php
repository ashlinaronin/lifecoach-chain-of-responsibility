<?php

    class Habit
    {
      private $name;
      private $motivation;
      private $interval_days;
      private $completed;
      private $id;

      function __construct($name, $motivation, $interval_days, $completed, $id = null)
      {
        $this->name = $name;
        $this->motivation = $motivation;
        $this->interval_days = $interval_days;
        $this->completed = (int) $completed;
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

      function getMotivation()
      {
          return $this->motivation;
      }

      function setMotivation($new_motivation)
      {
          $this->motivation = $new_motivation;
      }

      function getIntervalDays()
      {
          return $this->interval_days;
      }

      function setIntervalDays($new_interval_days)
      {
          $this->interval_days = $new_interval_days;
      }

      function getCompleted()
      {
          return $this->completed;
      }

      function setCompleted($new_completed)
      {
          $this->completed = (int) $new_completed;
      }

      function getId()
      {
          return $this->id;
      }

      function save()
      {
          $GLOBALS['DB']->exec("INSERT INTO habits (name, motivation, interval_days, completed)
          VALUES ('{$this->getName()}', '{$this->getMotivation()}', {$this->getIntervalDays()}, {$this->getCompleted()});");
          $this->id = $GLOBALS['DB']->lastInsertId();
      }

      static function getAll()
      {
          $returned_habits = $GLOBALS['DB']->query("SELECT * FROM habits;");

          $habits = array();
          foreach($returned_habits as $habit) {
              $habit_name = $habit['name'];
              $habit_motivation = $habit['motivation'];
              $habit_interval_days = $habit['interval_days'];
              $habit_completed = $habit['completed'];
              $habit_id = $habit['id'];
              $new_habit = new Habit($habit_name, $habit_motivation, $habit_interval_days, $habit_completed, $habit_id);
              array_push($habits, $new_habit);
          }

         return $habits;
      }

      static function deleteAll()
      {
          $GLOBALS['DB']->exec("DELETE FROM habits;");
      }

      static function find($search_id)
      {
          $found_habit = null;
          $habits = Habit::getAll();
          foreach($habits as $habit) {
              $habit_id = $habit->getId();
              if ($habit_id == $search_id) {
                  $found_habit = $habit;
              }
          }

          return $found_habit;
      }

      function updateName($new_habit_name)
      {
          $GLOBALS['DB']->exec("UPDATE habits SET name = '{$new_habit_name}' WHERE id = {$this->getId()};");
          $this->setName($new_habit_name);
      }

      function updateMotivation($new_habit_motivation)
      {
          $GLOBALS['DB']->exec("UPDATE habits SET motivation = '{$new_habit_motivation}' WHERE id = {$this->getId()};");
          $this->setMotivation($new_habit_motivation);
      }

      function updateIntervalDays($new_habit_interval_days)
      {
          $GLOBALS['DB']->exec("UPDATE habits SET interval_days = {$new_habit_interval_days} WHERE id = {$this->getId()};");
          $this->setIntervalDays($new_habit_interval_days);
      }

      function delete()
      {
          $GLOBALS['DB']->exec("DELETE FROM habits WHERE id = {$this->getId()};");
      }


    }

?>
