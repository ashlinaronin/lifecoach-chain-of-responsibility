<?php
    // This Client manages the chain of handlers involved in the coach workflow
    // for creating a new Project.

    class NewProjectClient
    {
        private $current_request;

        function getCurrentRequest()
        {
            return $this->current_request;
        }

        public function __construct($current_request)
        {
            // Actually do the constructing
            $this->current_request = $current_request;
        }

        public function processRequests()
        {
            // Instantiate Concrete Handlers and set successors for each except the last one

            $what = new WhatProjectQuestionHandler();
            $motivation = new MotivationQuestionHandler();

            // handle dumps
            $prereq = new PrerequisiteHandler();

            // Basic step handler may run a few times as steps are created
            $basicstep = new BasicStepHandler();

            $due = new DueQuestionHandler();
            $feedback = new ProjectFeedbackHandler();

            // Set up chain of successors
            $what->setSuccessor($why);
            $why->setSuccessor($mbs);

            // Call first concrete Handler
            // It will recursively call other Handlers as necessary
            $request_return = $what->handleRequest($this->getCurrentRequest());

            // Get data out of the Handler
            return $request_return;
        }
    }
 ?>
