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
            // Trying with abstracted simple QA
            // $what_q = "What is your new project's name?";
            // $what = new SimpleQAHandler($what_q, 'name');
            //
            // $why_q = "Why do you want to work on it?";
            // $why = new SimpleQAHandler($why_q, 'motivation');
            //
            // $mbs_q = "What is the most basic step?";
            // $mbs = new SimpleQAHandler($mbs_q, 'step1');


            $what = new WhatQuestionHandler();
            $why = new WhyQuestionHandler();
            $mbs = new MostBasicStepHandler();

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
