<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;

    protected $fillable = ['branchName', 'branchAddress', 'phone','bank_id'];

    public function bank()
    {
        return $this->belongsTo('App\Models\Bank', 'bank_id');
    }
}
