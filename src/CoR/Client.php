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
            $What = new WhatQuestionHandler();
            $Why = new WhyQuestionHandler();
            $MostBasicStep = new MostBasicStepHandler();
            $What->setSuccessor($Why);
            $Why->setSuccessor($MostBasicStep);

            // testing printing out what successor
            echo "what successor is ";
            $What->getSuccessor();
            echo "<br>";

            // testing printing out why successor
            echo "why successor is ";
            $Why->getSuccessor();
            echo "<br>";

            // testing printing out mbs successor
            echo "MBS successor is ";
            $MostBasicStep->getSuccessor();
            echo "<br>";

            // Generate and process load requests
            $new_request = new Request($this->getCurrentRequest());

            // call first concrete handler
            $question_text = $Why->handleRequest($new_request);

            // try getting data out of handler
            // echo $question_text;

            /* The problem lies in return values*/

            return $question_text;
        }
    }
 ?>
