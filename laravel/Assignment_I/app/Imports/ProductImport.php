<?php

namespace App\Imports;

use App\Models\Phone;
use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PhonesImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Product([
            'name'     => $row[0],
            'price'     => $row[1],
            'detail'    => $row[2],
            'reviews'     => $row[3],

        ]);
    }
}
