<?php
    class WhatProjectQuestionHandler extends Handler
    {
        private $successor;

        public function setSuccessor($next_handler)
        {
            $this->successor = $next_handler;
        }

        public function handleRequest($request)
        {
            if ($request->getText() == "what") {
                $question = "Can you think of a good name for your new project?";

                // Make a new Page object to return the Twig template url
                // and data to pass to it
                $template_url = "question.html.twig";
                $data_for_twig = array(
                    'question' => $question,
                    'next_url' => '/coach/new_project',
                    'input_parameter' => 'project_name'
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
