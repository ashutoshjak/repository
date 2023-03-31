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


      public function createBank(array $data){
        
        
        $bankNames = $data['bankName'];
        $grades = $data['grade'];
        $rowCount = count($bankNames);
        for ($i = 0; $i < $rowCount; $i++) {
          $data = [
              'bankName' => $bankNames[$i],
              'grade' => $grades[$i],
          ];
          
        return $this->bankRepository->create($data);

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