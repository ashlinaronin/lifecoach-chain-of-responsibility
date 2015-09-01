<?php
/* Concrete Handler for a Question
Will print out a question for now

*/
    class SimpleQAHandler extends Handler
    {
        private $question_text;
        private $parameter_name;
        private $successor;

        public function __construct($question_text, $parameter_name, $successor = null)
        {
            $this->question_text = $question_text;
            $this->parameter_name = $parameter_name;
            $this->successor = $successor;
        }

        // Getters and Setters
        public function getQuestionText()
        {
            return $this->question_text;
        }

        public function getParameterName()
        {
            return $this->parameter_name;
        }

        public function setQuestionText($new_text)
        {
            $this->question_text = $new_text;
        }

        public function setParameterName($new_name)
        {
            $this->parameter_name = $new_name;
        }



        // Chain methods
        public function setSuccessor($next_handler)
        {
            $this->successor = $next_handler;
        }

        public function handleRequest($request)
        {
            if ($request->getText() == "mostbasicstep") {
                // Make a new Page object to return the Twig template url
                // and data to pass to it
                echo 'this question text is ' . $this->getQuestionText();
                $template_url = "question.html.twig";
                $data_for_twig = array(
                    'question' => $this->getQuestionText(),
                    'next_url' => '/coach/new_project',
                    'input_parameter' => $this->getParameterName()
                );
                $new_page = new Page($template_url, $data_for_twig);

                return $new_page;

            } else if ($this->successor != null) {
                // We need to recursively return value from the next handler
                // in order to get data back to Silex.
                return $this->successor->handleRequest($request);
            }
        }
    }
 ?>
