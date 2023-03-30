<?php

namespace App\Repositories\Intefaces;

interface BankRespositoryInterface{
     
   //interfaces method
    
    public function allBanks();

    public function create(array $data);

    public function update(array $data,$id);

    public function delete($id);

    public function edit($id);

}

?>