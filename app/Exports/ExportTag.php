<?php

namespace App\Exports;

use App\Models\Item\Tag;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportTag implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Tag::all();
    }

    public function headings(): array
    {
        return ['ID', 'Name', 'Image', 'Email', 'Phone', 'NRC', 'Title', 'Department', 'Status', 'Position', 'Created_at', 'Updated_at'];
    }
}
