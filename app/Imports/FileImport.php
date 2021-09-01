<?php

namespace App\Imports;

use App\Models\File;
use App\Models\FileContent;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;


class FileImport implements ToModel, WithStartRow
{
    public $file_id;
    function __construct($file_id) {
        $this->file_id = $file_id;
    }
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new FileContent([
            'name'     => $row[0],
            'roll_num'    => $row[1],
            'tester' => $row[2],
            'file_id' => $this->file_id
        ]);
    }
    public function startRow(): int
    {
        return 2;
    }


}
