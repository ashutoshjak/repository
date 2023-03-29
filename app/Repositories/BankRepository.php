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
}



?>