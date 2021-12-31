<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Components\GoogleClient;
use Google_Service_Calendar;
use Illuminate\Support\Carbon;

class CalendarController extends Controller
{
    
    protected $client;

    public function __construct(GoogleClient $client)
    {
        $this->client = $client->getClient();
    }

    public function index()
    {
        
        $calendarService = new Google_Service_Calendar($this->client);


        $date = Carbon::parse('2021-12-31 11:59:56');

    $event = new \Google_Service_Calendar_Event([
        'summary' => "Titulo",
        'description' => "Descripcion",
        'start' => [
            'dateTime' => $date
        ],
        'end' => [
            'dateTime' => $date->addHour()
        ]
    ]);
    dd($calendarService->events->insert('primary', $event));

        
    }


    public function createEvent(Request $request)
{
    $calendarService = new Google_Service_Calendar($this->client);

    $event = new \Google_Service_Calendar_Event([
        'summary' => $request->title,
        'description' => $request->description,
        'start' => [
            'dateTime' => $this->convertTime($request->start)
        ],
        'end' => [
            'dateTime' => $this->convertTime($request->end)
        ]
    ]);
    dd($calendarService->events->insert('primary', $event));
}
}
