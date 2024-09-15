<?php

namespace App\Imports;

use App\Models\Category;
use App\Models\City;
use Maatwebsite\Excel\Concerns\ToModel;

class CityImport implements ToModel
{

    public function model(array $row)
    {
        return new City([
            'title' => $row[0],
        ]);
    }
}
