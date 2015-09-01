<?php
    // A Query object that just holds the text of a query
    // changed the name because Request is a reserved word in Symfony
    class ChainRequest
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
