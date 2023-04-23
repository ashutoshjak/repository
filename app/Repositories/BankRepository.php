<?php

namespace App\Repositories;   //folder 

use App\Models\Bank;

use App\Repositories\Intefaces\BankRespositoryInterface;



class BankRepository implements BankRespositoryInterface
{

    protected $bank;

    public function __construct(Bank $bank)
    {
        $this->bank = $bank;
    }


    public function allBanks()
    {
        return $this->bank->all();
    }



    // public function create(array $data){

    //     return $this->bank->create($data);
    // }

    public function store(array $data)
    {

        $dataentry = $this->bank->create([
            'bankName' => $data['bankName'],
            'grade' => $data['grade'],

        ]);

        return $dataentry;
    }


    public function edit($id)
    {

        return $this->bank->find($id);
    }


    public function update(array $data, $id)
    {
        return $this->bank::where('id', $id)->update([
            'bankName' => $data['bankName'],
            'grade' => $data['grade'],
        ]);
    }


    // public function updateMultiple(array $data)
    // {


    //     foreach ($data as $record) {
    //         $id = $record['id'];
    //         $bankName = $record['bankName'];
    //         $grade = $record['grade'];

    //         $updateData = [
    //             'bankName' => $bankName,
    //             'grade' => $grade,
    //         ];

    //         $this->update($updateData, $id);
    //     }
    // }

    // public function updateMultiple(array $data, $id)
    // {

    //     $this->update($data, $id);
       
    // }




    public function delete($id)
    {


        return $this->bank->destroy($id);
    }
}
