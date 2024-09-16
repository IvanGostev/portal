<?php

namespace App\Imports;

use App\Models\Category;
use App\Models\Evaluation;
use App\Models\Procedure;
use App\Models\Subcategory;
use App\Models\User;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;

class EvaluationImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Evaluation([
            'user_id' => User::where('inn', $row[0])->first()->id,
            'first_parameter' => $row[1],
            'second_parameter' => $row[2],
            'third_parameter' => $row[3],
            'fourth_parameter' => $row[4],
            'fifth_parameter' => $row[5],
            'sixth_parameter' => $row[6],
            'seventh_parameter' => $row[7],
            'eighth_parameter' => $row[8],
            'ninth_parameter' => $row[9],
            'tenth_parameter' => $row[10],
            'eleventh_parameter' => $row[11],
            'twelfth_parameter' => $row[12],
        ]);
    }
}
