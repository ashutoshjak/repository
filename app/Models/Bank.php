<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Repositories\Interfaces\BankRepositoryInterface;

class Bank extends Model
{
    use HasFactory;

    protected $fillable= ['bankName', 'grade'];
    public function branch(){
        return $this->hasMany('App\Models\Branch', 'bank_id');
    }

    // //repository code 

    // protected $table = 'banks';

    // public function __construct(BankRepositoryInterface $bankRepository ){
        
    //     $this->bankRepository = $bankRepository;
    
    // }

}
