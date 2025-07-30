<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobOrdes extends Model
{
    use HasFactory;
    protected $primaryKey = 'JOCode';
    protected $fillable = [
        'JOCode',
        'TransactionDate',
        'Ccode',
        'DeviceCode',
        'ProblemDescription',
        'Action',
        'Status',
        'RepairedBy',
    ]; 	
}
