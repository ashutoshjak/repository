<?php

namespace App\Services;

use App\Repositories\Intefaces\BankRespositoryInterface;
use App\Repositories\Interfaces\BranchRepositoryInterface;
use App\Services\ServiceInterfaces\BranchServiceInterface;


class BranchService implements BranchServiceInterface
{
      protected $branchRepository;
      
      public function __construct(BranchRepositoryInterface $branchRepository){

        $this->branchRepository = $branchRepository;

        // $this->bankRepository = $bankRepository;
      }


      public function getallBranches(){

        // $allbranch = $this->branchRepository->allBranch();
        // $allbank = $this->bankRepository->allBanks();
        
        // return [$allbranch, $allbank]; 

        return $this->branchRepository->allBranch();

        
      }


      public function createBranch(array $data){

        $branchNames = $data['branchName'];
        // dd($branchNames);
        
        $branchAddresses = $data['branchAddress'];
        $phones = $data['phone'];
        $bankids = $data['bank_id'];
        $rowCount = count($branchNames);
        for ($i = 0; $i < $rowCount; $i++) {
        
         $data = [
          'branchName' => $branchNames[$i],
          'branchAddress' => $branchAddresses[$i],
          'phone' => $phones[$i],
          'bank_id' => $bankids[$i],
         ];

          $this->branchRepository->create($data);
      }

      

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