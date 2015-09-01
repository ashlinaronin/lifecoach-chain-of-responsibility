<?php
/* Concrete Handler for a Question
Will print out a question for now

*/
    class WhyQuestionHandler extends Handler
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
            if ($request->getText() == "why") {
                // echo "Why do you want to work on this project?";
                $data = "Why do you want to work on this project?";
                return $data;

            } else if ($this->successor != null) {
                echo "WhyQuestionHandler handing off request</br>";
                $this->successor->handleRequest($request);
            }
        }
    }
 ?>
