<?php


namespace App\Services;

use App\Contracts\LoggerInterface;

class FileLogger implements LoggerInterface{
    private $message;
    public function log($message)
    {
       $this->message=$message;
       return "we got your message ".$message;
    }


}