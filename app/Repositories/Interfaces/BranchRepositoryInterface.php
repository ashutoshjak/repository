<?php

namespace App\Repositories\Interfaces;

interface BranchRepositoryInterface{

    public function allBranch();

    public function store(array $data);

    public function edit($id);

    public function update(array $data, $id);

    public function delete($id);

   

}


?>