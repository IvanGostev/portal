<?php

namespace App\Imports;

use App\Models\Category;
use App\Models\Procedure;
use App\Models\Subcategory;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;

class ProcedureImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Procedure([
            'title' => $row[0],
            'subcategory_id' => Subcategory::where('title', $row[1])->first()->id,
            'status' => $row[2],
            'procurement_method' => $row[3],
            'type' => $row[4],
            'start' => Carbon::parse($row[5])->format('Y-m-d'),
            'finish' => Carbon::parse($row[6])->format('Y-m-d'),
            'url' => $row[7]
        ]);
    }
}
