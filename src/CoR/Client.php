<?php
    class Client
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
            $what = new WhatQuestionHandler();
            $why = new WhyQuestionHandler();
            $mostBasicStep = new MostBasicStepHandler();
            $what->setSuccessor($why);
            $why->setSuccessor($mostBasicStep);

            // Generate and process load requests
            $new_request = new Request($this->getCurrentRequest());

            // Call first concrete Handler
            // It will recursively call other Handlers as necessary
            $request_return = $what->handleRequest($new_request);

            // Get data out of the Handler
            return $request_return;
        }
    }
 ?>
