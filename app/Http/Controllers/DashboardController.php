<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Requests;


class DashboardController extends Controller
{
    public function index()
    {
      $requests = Requests::latest()->paginate(15);
      $response = Http::withHeaders([
        'X-Api-Key' => env('OCTOPRINT_API_KEY')
      ])->timeout(3)->retry(3)->get(env('OCTOPRINT_URL') . '/api/printer')->json();
      return view('dashboard', ['printerStatus' => $response, 'requests' => $requests]);
    }
}
