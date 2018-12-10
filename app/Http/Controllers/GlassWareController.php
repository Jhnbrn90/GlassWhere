<?php

namespace App\Http\Controllers;

use App\Glassware;
use App\Lab;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GlassWareController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (! Auth::check()) {
          return view('login');
        }



        foreach (Lab::all() as $lab) {
          $categories[$lab->name] = [
            'Roundbottoms' => Glassware::where('type', 'roundbottom')->lab($lab)->get(),
            'Erlenmeyers'  => Glassware::where('type', 'erlenmeyer')->lab($lab)->get(),
            'Separation funnels'  => Glassware::where('type', 'separation funnel')->lab($lab)->get(),
            'Measuring cylinders'  => Glassware::where('type', 'measuring cylinder')->lab($lab)->get(),
            'Beakers'  => Glassware::where('type', 'beaker')->lab($lab)->get(),
          ];  
        }

        $labs = Lab::all()->pluck('name');

        return view('glassware.index', compact('categories', 'labs'));
    }

    public function show(Glassware $glassware)
    {
        return view('glassware.show', compact('glassware'));
    }
}
