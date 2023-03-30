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


    
    
    public function create(array $data){

        return $this->bank->create($data);
    }

    public function edit($id){

        return $this->bank->find($id);
    }

    
    public function update(array $data, $id){
        return $this->bank::where('id',$id)->update([
            'bankName' => $data['bankName'],
            'grade' => $data['grade'],
        ]);
    }


    public function delete($id){
       
        
      return $this->bank->destroy($id);

    }
}



?>