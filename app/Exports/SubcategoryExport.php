<?php

namespace App\Exports;

use App\Models\Category;
use App\Models\Subcategory;
use Maatwebsite\Excel\Concerns\FromCollection;

class SubcategoryExport implements FromCollection
{

    private $categoryID;

    public function __construct($categoryID)
    {
        $this->categoryID = $categoryID;
    }

    public function collection()
    {
        return Subcategory::where('category_id', $this->categoryID)->get();
    }
}
