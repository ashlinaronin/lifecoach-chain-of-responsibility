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
                $question = "What is your new project?";

                // Make a new Page object to return the Twig template url
                // and data to pass to it
                $template_url = "question.html.twig";
                $data_for_twig = array(
                    'question' => $question,
                    'next_url' => '/thisisthenexturlfromwhathandler',
                    'input_parameter' => 'this is the input parameter for form'
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
