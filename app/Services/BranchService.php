<?php

namespace App\Services;

use App\Repositories\Intefaces\BankRespositoryInterface;
use App\Repositories\Interfaces\BranchRepositoryInterface;
use App\Services\ServiceInterfaces\BranchServiceInterface;


class BranchService implements BranchServiceInterface
{
      protected $branchRepository;
      
      public function __construct(BranchRepositoryInterface $branchRepository, BankRespositoryInterface $bankRepository){

        $this->branchRepository = $branchRepository;

        $this->bankRepository = $bankRepository;
      }


      public function getallBranches(){

        $allbranch = $this->branchRepository->allBranch();
        $allbank = $this->bankRepository->allBanks();
        
        return [$allbranch, $allbank]; 

        
      }


      public function createBranch(array $data){

        return $this->branchRepository->create($data);

      }

      public function editBranch($id)
      {
        return $this->branchRepository->edit($id);
      }

      public function updateBranch(array $data,$id)
      {
        return $this->branchRepository->update($data,$id);
      }

      public function deleteBranch($id)
      {
        return $this->branchRepository->delete($id);
      }
}


?>