<?php

namespace App\Services;

use App\Repositories\Intefaces\BankRespositoryInterface;
use App\Services\ServiceInterfaces\BankServiceInterface;


class BankService implements BankServiceInterface
{
      protected $bankRepository;
      
      public function __construct(BankRespositoryInterface $bankRepository){

        $this->bankRepository = $bankRepository;
      }


      public function getallBanks(){

        return $this->bankRepository->allBanks();
      }


      public function storeBank(array $data){
        
        
        $bankNames = $data['bankName'];
        // dd($bankNames);
        $grades = $data['grade'];
        $rowCount = count($bankNames);
        for ($i =0; $i < $rowCount; $i++) {
          $data = [
              'bankName' => $bankNames[$i],
              'grade' => $grades[$i],
          ];
          
        $this->bankRepository->store($data);

      }
    }


      public function editBank($id)
      {
        return $this->bankRepository->edit($id);
      }

      public function updateBank(array $data,$id)
      {
        return $this->bankRepository->update($data,$id);
      }

      public function deleteBank($id)
      {
        return $this->bankRepository->delete($id);
      }
}


?>