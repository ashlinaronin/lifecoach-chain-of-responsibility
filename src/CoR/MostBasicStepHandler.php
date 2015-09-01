<?php
/* Concrete Handler for a Question
Will print out a question for now

*/
    class MostBasicStepHandler extends Handler
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
            if ($request->getText() == "mostbasicstep") {
                $data = "What is the most basic step to complete?";
                return $data;

            } else if ($this->successor != null) {
                // We need to recursively return value from the next handler
                // in order to get data back to Silex.
                return $this->successor->handleRequest($request);
            }
        }
    }
 ?>
