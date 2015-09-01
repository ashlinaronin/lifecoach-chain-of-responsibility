<?php
    // A Page object holds the details of which twig template to display
    // and what data to send to that template

    class Page
    {
        private $template_url;
        private $data;


        public function __construct($template_url, $data)
        {
            $this->template_url = $template_url;
            $this->data = $data;
        }

        public function getData()
        {
            return $this->data;
        }

        public function getTemplateUrl()
        {
            return $this->template_url;
        }

        public function setData($new_data)
        {
            $this->data = $new_data;
        }

        public function setTemplateUrl($new_url)
        {
            $this->template_url = $new_url;
        }
    }
 ?>
