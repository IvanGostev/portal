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
            'start' => gmdate('Y-m-d', (($row[5] - 25569) * 86400)),
            'finish' => gmdate('Y-m-d', (($row[6] - 25569) * 86400)),
            'url' => $row[7]
        ]);
    }
}
