<?php

namespace App\Http\Controllers;

use App\Models\Lloro;
use Illuminate\Support\Facades\DB;

class ChartJsController extends Controller
{
    public function index()
    {
        return view('lloro.grafico');
    }

    public function getData(){

        $year = ['2020','2021'];

        $lloricas_array = [];

        $lloricas = DB::table('lloros')
            ->select('from_username')
            ->groupBy('from_username')
            ->get();

        



        foreach ($lloricas as $key => $llorica) {
            $lloricas_array[$key]['count'] = Lloro::where('from_username', $llorica->from_username)->count();
            $lloricas_array[$key]['user'] = $llorica->from_username;

        }


        //$lloros = Lloro::all();

        $encoded = json_encode($lloricas_array);


    	return $encoded;

    }
}
