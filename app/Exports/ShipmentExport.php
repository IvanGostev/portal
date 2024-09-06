<?php

namespace App\Exports;

use App\Models\Shipment;
use Maatwebsite\Excel\Concerns\FromCollection;

class ShipmentExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $shipments;

    public function __construct($shipments)
    {
        $this->shipments = $shipments;
    }

    public function collection()
    {
        return $this->shipments;
    }
}
