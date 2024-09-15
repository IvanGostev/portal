<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipment extends Model
{
    use HasFactory;
    protected $guarded = false;

    public function subcategory() {
        return Subcategory::where('id', $this->subcategory_id)->first();
    }
    public function user() {
        return User::where('id', $this->user_id)->first();
    }
    public function evaluation() {
        return Evaluation::where('shipment_id', $this->id)->first();
    }
}
