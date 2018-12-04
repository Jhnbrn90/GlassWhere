<?php

namespace App\Http\Controllers;

use App\Glassware;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function show(Glassware $glassware)
    {
        return $glassware->toJson();
    }

    public function store(Request $request, Glassware $glassware)
    {
        if ($glassware->isUnassigned()) {
          $glassware->assignTo(auth()->user());
        }

        if ($request->action == 'increase') {
          $glassware->amount += 1;
          $glassware->save();
          return $glassware->toJson();
        }

        if ($request->action == 'decrease') {
          $glassware->amount -= 1;
          $glassware->save();
          return $glassware->toJson();
        }

        return 'No action provided.';
    }
}
