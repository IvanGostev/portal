<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Procedure extends Model
{
    use HasFactory;
    protected $guarded = false;
    public function subcategory() {
        return Subcategory::where('id', $this->subcategory_id)->first();
    }
}
