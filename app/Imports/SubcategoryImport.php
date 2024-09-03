<?php

namespace App\Imports;

use App\Models\Subcategory;
use Maatwebsite\Excel\Concerns\ToModel;

class SubcategoryImport implements ToModel
{
    private $categoryID;

    public function __construct($categoryID)
    {
        $this->categoryID = $categoryID;
    }


    public function model(array $row)
    {
        return new Subcategory([
            'category_id' => $this->categoryID,
            'title' => $row[0],
        ]);
    }
}
