<?php

namespace App\Imports;

use App\Quote;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CSVImport  implements ToModel,WithHeadingRow
{
    /**
     * @param array $row
     * @return Quote|\Illuminate\Database\Eloquent\Model|\Illuminate\Database\Eloquent\Model[]|null
     */
    public function model(array $row)
    {
        //
        return new Quote(
            [
                //
                'date'=>$row['date'],
                'open'=>$row['open'],
                'high' => $row['high'],
                'low' =>$row['low'],
                'close' =>$row['close'],
                'volume' =>$row['volume']
            ]
        );
    }
}