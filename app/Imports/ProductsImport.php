<?php

namespace App\Imports;

use App\Models\Products;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProductsImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Products([
            'name' => $row['name'],
            'price' => $row['price'],
            'product_code' => $row['product_code'],
            'description' => $row['description'],
            'image' => $row['image'],
            'width' => $row['width'],
            'height' => $row['height'],
            'depth' => $row['depth'],
            'weight' => $row['weight'],
            'quality_checking' => $row['quality_checking'],
            'quantity' => $row['quantity'],
            'color' => $row['color'],
            'discount' => $row['discount'],
        ]);
    }
}
