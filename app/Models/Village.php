<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Village extends Model
{
    use HasFactory;


    public function division()
    {
    	return $this->belongsTo(Division::class);
    }

   public function district()
    {
    	return $this->belongsTo(ZillaNew::class,'district_id','id');
    }

   public function upazilla()
    {
    	return $this->belongsTo(Thanaaa::class,'upazilla_id','id');
    }

   public function union()
    {
    	return $this->belongsTo(Union::class,'union_id','id');
    }

    public function word()
    {
    	return $this->belongsTo(WordNo::class,'word_id','id');
    }
    

}
