<?php namespace PhotoShots\Http\Controllers;
use PhotoShots\Album;
use Carbon\Carbon;
use DB;

class StatisticsController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Welcome Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders the "marketing page" for the application and
	| is configured to only allow guests. Like most of the other sample
	| controllers, you are free to modify or remove it as you desire.
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('guest');
	}

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */

	public function getIndex()
	{
		$range = Carbon::now()->subDays(30);

		 $stats = DB::table('albums')
		  ->where('created_at', '>=', $range)
		  ->groupBy('date')
		  ->orderBy('date', 'ASC')
		  ->get([
		    DB::raw('Date(created_at) as date'),
		    DB::raw('COUNT(*) as value')
		  ]);

		  return $stats;
	}
}
