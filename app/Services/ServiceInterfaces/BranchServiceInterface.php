<?php

namespace App\Services\ServiceInterfaces;

interface BranchServiceInterface
{

    public function getAllBranches();

    public function createBranch(array $data);

    public function editBranch($id);

    public function updateBranch(array $data, $id);

    public function deleteBranch($id);

}


?>