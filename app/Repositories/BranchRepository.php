<?php

namespace App\Repositories;

use App\Models\Branch;
use App\Models\Bank;
use App\Repositories\Interfaces\BranchRepositoryInterface;


class BranchRepository implements BranchRepositoryInterface
{
    protected $branch;

    public function __construct(Branch $branch){
        
        $this->branch = $branch;
    }

//======================================================================
    // public function allBanks(){
        
    //     return Bank::all();
    // }
 //======================================================================


 public function allBranch(){
        
        return $this->branch->all()->load('bank');
    }

    public function store(array $data)
    {
        return $this->branch->create($data);

    }

  
    public function edit($id){

        return $this->branch->find($id);
    }

    public function update(array $data, $id)
    {
        return $this->branch::where('id',$id)->update([
            'branchName'=> $data['branchName'],
            'branchAddress' => $data['branchAddress'],
            'phone' => $data['phone'],
            'bank_id' => $data['bank_id']

        ]);
    }


    public function delete($id)
   {
       return $this->branch->destroy($id);
   }
   
}

?>
