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

    public function calendar()
    {

        $calendarService = new Google_Service_Calendar($this->client);


        $date = Carbon::parse('2021-12-31 11:59:56');

        $event = new \Google_Service_Calendar_Event([
            'summary' => "tareas varias",
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


}
