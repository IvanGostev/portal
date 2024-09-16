<?php

namespace App\Imports;

use App\Models\Shipment;
use App\Models\Subcategory;
use App\Models\User;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;

class ShipmentImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */


    public function model(array $row)
    {
        return new Shipment([
            'user_id' => User::where('inn', $row[0])->first()->id,
            'number' => $row[1],
            'description' => $row[2],
            'subcategory_id' => Subcategory::where('title', $row[3])->first()->id,
            'contract_number' => $row[4],
            'order_number' => $row[5],
            'spp_element' => $row[6],
            'code_num' => $row[7],
            'title_num' => $row[8],
            'count' => $row[9],
            'unit' => $row[10],
            'address' => $row[11],
            'delivery_date' =>  gmdate('Y-m-d', (($row[12] - 25569) * 86400))
        ]);
    }
}
