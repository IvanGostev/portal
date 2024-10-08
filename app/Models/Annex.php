<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Annex extends Model
{
    use HasFactory;
    protected $guarded = false;

    public function type() {
        return AnnexType::where('id', $this->annex_type_id)->first();
    }
}
