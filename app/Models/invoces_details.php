<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class invoces_details extends Model
{
    protected $fillable=[

            'id_Invoice' ,
            'invoice_number',
            'product',
            'Section',
            'Status' ,
            'Value_Status' ,
            'note' ,
            'user',
    
    ];
}
