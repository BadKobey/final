<?php
namespace App\Imports;
use App\Models\Product;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
class ProductImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Product([
            'article'     => $row[0],
             'nomenclature'    => $row[1],
             'price'    => $row[2],
             'count'    => $row[3],
             'stock_id'    => $row[4],
        ]);
    }
}
