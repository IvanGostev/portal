<?php

namespace App\Models;

use App\Exports\SubcategoryExport;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSubcategory extends Model
{
    use HasFactory;
    protected $guarded = false;
    public function subcategory() {
        return Subcategory::where('id', $this->subcategory_id)->first();
    }
}
