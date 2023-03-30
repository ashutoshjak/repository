<?php

namespace App\Services;

use App\Repositories\Interfaces\BankRespositoryInterface;
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

        return $this->bankRepository->create($data);

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