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
                echo "Inside handleRequest in MBSHandler<br>";

                // echo "What is the most basic step to complete?";
                $data = "What is the most basic step to complete?";
                return $data;

            } else if ($this->successor != null) {
                echo "MostBasicStepHandler handing off request</br>";
                return $this->successor->handleRequest($request);
            }
        }
    }
 ?>
