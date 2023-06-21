<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CampaignUpload extends Model
{
    use HasFactory;

         /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
   protected $fillable = [
    'campaignID',
    'campaignName',
    'campaignUploader',
    'campaignDateUploaded',
    'schedType',
    'schedule',
];
protected $casts = [
  'campaignDateUploaded' => 'datetime:Y-m-d H:i:s',
  'schedule' => 'datetime:Y-m-d',
];


public $timestamps = false;
protected $table = 'campaignUpload';
}
