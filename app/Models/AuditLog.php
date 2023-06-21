<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuditLog extends Model
{
    use HasFactory;

      /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
   
protected $casts = [
  'created_at' => 'datetime:Y-m-d H:i:s',
  'updated_at' => 'datetime:Y-m-d H:i:s',
];



protected $table = 'audit_log';
}
