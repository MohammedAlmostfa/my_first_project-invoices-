<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class invoice_attachment extends Model
{ protected $fillable=[

'file_name', 
          'invoice_number', 
           'Created_by',
           'invoice_id',
           'invoice_id',

    
];
    use HasFactory;
}
