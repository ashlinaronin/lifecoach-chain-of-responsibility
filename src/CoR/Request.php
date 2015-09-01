<?php
    // A Request object that just holds the text of a request
    class Request
    {
        private $text;

        public function __construct($request_text)
        {
            $this->text = $request_text;
        }

        public function getText()
        {
            return $this->text;
        }
    }
 ?>
