<?php
    abstract class Handler
    {
        // private $data;
        abstract public function handleRequest($request);
        abstract public function setSuccessor($nextService);
    }
 ?>
