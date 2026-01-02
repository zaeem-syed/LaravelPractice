<?php

namespace App\Http\Controllers;

use App\Contracts\LoggerInterface;
use Illuminate\Http\Request;

class Testcontroller extends Controller
{
    //
    private $logger;
     public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger; // <<< yahan assign karna zaroori hai
    }


    public function index()
    {
        $data=$this->logger->log("user list view");
        
        return response()->json([
            "message" => $data           
        ]);
}
}
