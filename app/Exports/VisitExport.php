<?php

namespace App\Exports;

use App\Models\Visit;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class VisitExport implements FromView
{
    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

        public function view(): View
    {
        return view('pages.admin.aktivitas.excel', [
            'aktivitas' => $this->data
        ]);
    }
}
