<?php

namespace App\Http\Controllers;
use GoogleClient;

class CalendarController extends Controller
{
    
    //
    
    protected $client;
    //
    
    public function __construct(GoogleClient $client) {
        $this->client = $client->getClient();

        dd($this->client);
    }
}
