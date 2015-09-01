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

        public function getSuccessor()
        {
            var_dump($this->successor);
        }

        public function handleRequest($request)
        {
            if ($request->getText() == "what") {
                // echo "What is your new project?";
                $data = "What is your new project?";
                return $data;

            } else if ($this->successor != null) {
                echo "WhatQuestionHandler handing off request</br>";
                $this->successor->handleRequest($request);
            }
        }
    }
 ?>
