<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    use HasFactory;
    
    protected $primaryKey = 'Ccode';
    protected $fillable = [
        'Customer',
        'Number',
        'Address',
        'Ccode',
        'user_id',
        'CoCode',
        
    ];
}
