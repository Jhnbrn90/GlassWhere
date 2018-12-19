<?php

namespace App\Exports;

use App\Invoice;
use App\Glassware;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class GlasswareExport implements FromView
{
    public function view(): View
    {
        return view('exports.glassware', [
            'glasswares' => Glassware::with(['user', 'lab'])->get()
        ]);
    }
}
