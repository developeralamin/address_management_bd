<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thanaaa extends Model
{
    use HasFactory;

protected $fillable =['division_id','district_id','name'];
   

    public function division()
    {
    	return $this->belongsTo(Division::class);
    }

     public function district()
    {
    	return $this->belongsTo(ZillaNew::class,'district_id','id');
    }
}
