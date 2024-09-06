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
            'subcategory_id' => Subcategory::where('title', $row[0])->first()->id,
            'contract_number' => $row[1],
            'order_number' => $row[2],
            'spp_element' => $row[3],
            'code_num' => $row[4],
            'title_num' => $row[5],
            'count' => $row[6],
            'unit' => $row[7],
            'address' => $row[8],
            'delivery_date' =>  gmdate('Y-m-d', (($row[9] - 25569) * 86400))
        ]);
    }
}
