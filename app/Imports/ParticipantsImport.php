<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class ParticipantsImport implements ToModel , WithStartRow
{
    private $setStartRow = 1;

    public function setStartRow($setStartRow){
        $this->setStartRow = $setStartRow;
    }

    public function startRow() : int{
        return $this->setStartRow;
    }

    /**
     * @param array $row
     *
     * @return Model|null
     */
    public function model(array $row)
    {


        return new User([
            'fname'     => $row[0],
            'ar_fname'     => $row[1],
            'lname'    => $row[ 2 ],
            'ar_lname'    => $row[3],
            'birthdate'    => $row[4],
            'age'    => $row[5],
            'commune'    => $row[6],
            'field'    => $row[7],
            'email'    => $row[8],
            'password' => Hash::make($row[9]),
            'role'    => '4',

        ]);
    }


}
