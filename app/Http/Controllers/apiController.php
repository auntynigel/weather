<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\RequestException;
use Carbon\Carbon;

class apiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $time = Carbon::now()->format('h:i A');
      $date = Carbon::now()->format('l jS \of F Y');
      // XML version
      $url = "http://api.openweathermap.org/data/2.5/weather?q=Skelmersdale,uk&mode=xml&units=metric&appid=d1a4b9720a57638b4cd9b8daea43c4f6";
      $content = file_get_contents($url);

      return view('weather')->with('content', $content);
    }

    public function getRequest()
    {
      $time = Carbon::now()->format('h:i A');
      $date = Carbon::now()->format('l jS \of F Y');
      // Request to openweathermap and return JSON data
      $client = new Client();
      // Get API and return the body only
      $request = $client->request('GET', 'http://api.openweathermap.org/data/2.5/weather?q=Skelmersdale,uk&units=metric&appid=d1a4b9720a57638b4cd9b8daea43c4f6')->getBody();
      $content = \GuzzleHttp\json_decode((string) $request);
      return view('weather')->with('content', $content)->with('time', $time)->with('date', $date);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
