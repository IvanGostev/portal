<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $guarded = false;

    public function countSubcategories()  {
        return Subcategory::where('category_id', $this->id)->count();
    }
    public function getSubcategories() {
        return Subcategory::where('category_id', $this->id)->get();
    }
}
