<?php
    class PrerequisiteHandler extends Handler
    {
        private $successor;

        public function setSuccessor($next_handler)
        {
            $this->successor = $next_handler;
        }

        public function handleRequest($request)
        {
            if ($request->getText() == "prerequisites") {
                $question = "Try to think about anything that you might need to have finished before even beginning this project.";

                // Make a new Page object to return the Twig template url
                // and data to pass to it
                $template_url = "prereqs.html.twig";
                $data_for_twig = array(
                    'question' => $question,
                    'next_url' => '/coach/new_project',
                    'input_parameter' => 'project_prereqs'
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
