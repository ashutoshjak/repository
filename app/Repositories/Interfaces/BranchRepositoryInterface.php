<?php

namespace App\Repositories\Interfaces;

interface BranchRepositoryInterface{

    public function allBranch();

    public function create(array $data);

    public function update(array $data, $id);

    public function delete($id);

}


?>