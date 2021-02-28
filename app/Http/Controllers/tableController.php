<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class tableController extends Controller
{
	public function create()
	{
	   	$path = storage_path() . "/app/public/evaluation-20190711.json";

		$userdata = json_decode(file_get_contents($path), true);

		$data = $userdata['data'];


		return view('table',compact('data'));

		
	}
}
