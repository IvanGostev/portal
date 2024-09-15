<?php

namespace App\Imports;

use App\Models\Shipment;
use App\Models\Subcategory;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;

class ShipmentImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    protected $user;
    public function __construct($user)
    {
        $this->user = $user;
    }

    public function model(array $row)
    {
        return new Shipment([
            'user_id' => $this->user->id,
            'number' => $row[0],
            'description' => $row[1],
            'subcategory_id' => Subcategory::where('title', $row[2])->first()->id,
            'contract_number' => $row[3],
            'order_number' => $row[4],
            'spp_element' => $row[5],
            'code_num' => $row[6],
            'title_num' => $row[7],
            'count' => $row[8],
            'unit' => $row[9],
            'address' => $row[10],
            'delivery_date' =>  gmdate('Y-m-d', (($row[11] - 25569) * 86400))
        ]);
    }
}
