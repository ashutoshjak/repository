<?php

namespace App\Services\ServiceInterfaces;

interface BankServiceInterface
{

    public function getAllBanks();

    public function createBank(array $data);

    public function editBank($id);

    public function updateBank(array $data, $id);

    public function deleteBank($id);

}


?>