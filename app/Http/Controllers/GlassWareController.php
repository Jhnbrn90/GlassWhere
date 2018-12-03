<?php

namespace App\Http\Controllers;

use App\Glassware;
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

        $categories = [
          'Roundbottoms' => Glassware::where('type', 'roundbottom')->get(),
          'Erlenmeyers'  => Glassware::where('type', 'erlenmeyer')->get(),
          'Separation funnels'  => Glassware::where('type', 'separation funnel')->get(),
          'Measuring cylinders'  => Glassware::where('type', 'measuring cylinder')->get(),
          'Beakers'  => Glassware::where('type', 'beaker')->get(),
        ];
        
        return view('glassware.index', compact('categories'));
    }

    public function show(Glassware $glassware)
    {
        return view('glassware.show', compact('glassware'));
    }
}
