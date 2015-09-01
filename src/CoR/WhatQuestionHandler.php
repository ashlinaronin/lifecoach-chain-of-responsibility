<?php
/* Concrete Handler for a Question
Will print out a question for now

*/
    class WhatQuestionHandler extends Handler
    {
        private $successor;

        public function setSuccessor($next_handler)
        {
            $this->successor = $next_handler;
        }

        public function handleRequest($request)
        {
            if ($request->getText() == "what") {
                $data = "What is your new project?";
                return $data;

            } else if ($this->successor != null) {
                // We need to recursively return value from the next handler
                // in order to get data back to Silex.
                return $this->successor->handleRequest($request);
            }
        }
    }
 ?>
