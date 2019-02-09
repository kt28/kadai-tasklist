<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;

class ItemsExport implements FromCollection
{
    public function collection()
    {
        return \App\Item::all();
    }
}