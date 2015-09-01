<?php
    // A Page object holds the details of which twig template to display
    // and what data to send to that template
    
    class Page
    {
        private $template_url;
        private $data_for_twig;


        public function __construct($template_url, $data_for_twig)
        {
            $this->template_url = $template_url;
            $this->data_for_twig = $data_for_twig;
        }

        public function getDataForTwig()
        {
            return $this->data_for_twig;
        }

        public function getTemplateUrl()
        {
            return $this->template_url;
        }

        public function setDataForTwig($new_data)
        {
            $this->data_for_twig = $new_data;
        }

        public function setTemplateUrl($new_url)
        {
            $this->template_url = $new_url;
        }
    }
 ?>
