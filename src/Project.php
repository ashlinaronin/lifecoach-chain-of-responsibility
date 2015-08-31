<?php

    class Project
    {
        private $name;
        private $motivation;
        private $due_date;
        private $priority;
        private $id;


        function __construct($name, $motivation, $due_date, $priority, $id = null)
        {
            $this->name = $name;
            $this->motivation = $motivation;
            $this->due_date = $due_date;
            $this->priority = $priority;
            $this->id = (int)$id;

        }

        function setName ($new_name)
        {
            $this->name = $new_name;
        }

        function getName ()
        {
            return $this->name;
        }

        function setMotivation ($new_motivation)
        {
            $this->motivation = $new_motivation;
        }

        function getMotivation ()
        {
            return $this->motivation;
        }

        function setDueDate ($new_due_date)
        {
            $this->due_date = $new_due_date;
        }

        function getDueDate ()
        {
            return $this->due_date;
        }

        function setPriority ($new_priority)
        {
            $this->priority = $new_priority;
        }

        function getPriority ()
        {
            return $this->priority;
        }









        // STATIC Methods


        static function deleteAll()
        {
            $GLOBALS['DB']->exec("DELETE FROM projects");

        }


    }

?>
