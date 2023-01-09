<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{

    protected $table = 'investimento';

    protected $fillable = [
        'investimento',
        'banco',
        'valor_investimento'
        
    ];
}
