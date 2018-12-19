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
            'Roundbottoms'              => Glassware::where('type', 'roundbottom')->lab($lab)->get(),
            'Erlenmeyers'               => Glassware::where('type', 'erlenmeyer')->lab($lab)->get(),
            'Separation funnels'        => Glassware::where('type', 'separation funnel')->lab($lab)->get(),
            'Measuring cylinders'       => Glassware::where('type', 'measuring cylinder')->lab($lab)->get(),
            'Beakers'                   => Glassware::where('type', 'beaker')->lab($lab)->get(),
            'Schlenks'                  => Glassware::where('type', 'schlenk')->lab($lab)->get(),
            'Three-neck roundbottoms'   => Glassware::where('type', 'three-neck')->lab($lab)->get(),
            'Columns'                   => Glassware::where('type', 'column')->lab($lab)->get(),
            'Schlenk adapters'          => Glassware::where('type', 'schlenk-adapter')->lab($lab)->get(),
            'Dropping funnels'          => Glassware::where('type', 'dropping funnel')->lab($lab)->get(),
            'Bottles'                   => Glassware::where('type', 'bottle')->lab($lab)->get(),
            'Stoppers'                  => Glassware::where('type', 'stopper')->lab($lab)->get(),
          ];  
        }

        $labs = Lab::all()->pluck('name');

        return view('glassware.index', compact('categories', 'labs'));
    }

    public function show($lab, $type)
    {
        $lab = Lab::where('name', $lab)->first();

        $glasswares = Glassware::with('user')->where('lab_id', $lab->id)->type($type)->get();

        return view('glassware.show', compact('glasswares', 'lab', 'type'));
    }

    public function reset()
    {
        $glasswares = Glassware::all();

        foreach ($glasswares as $glassware) {
          $glassware->amount = 0;
          $glassware->user_id = null;
          $glassware->save();
        }

        return redirect('/start');
    }
}
