<?php

namespace App\Imports;

use App\Models\Item\Tag;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportTag implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Tag([
            'id' => $row[0],
            'name' => $row[1],
            'image' => $row[2],
            'email' => $row[3],
            'phone' => $row[4],
            'nrc' => $row[5],
            'title' => $row[6],
            'department' => $row[7],
            'status' => $row[8],
            'position' => $row[9],
            'created_at' => $row[10],
            'updated_at' => $row[11],
        ]);
    }
}
