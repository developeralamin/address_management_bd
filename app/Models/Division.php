<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    use HasFactory;

    protected $fillable = ['name'];


  public static function arrayForSelectDivision()
    {
    	$arr = [];

    	$division  = Division::all();

    	foreach($division as $division){
    		$arr[$division->id] = $division->name ;
    	}
    	return $arr;
    }

    public function zilla()
    {
    	return $this->hasmany(ZillaNew::class);
    }

     public function thana()
    {
        return $this->hasmany(Thanaaa::class);
    }

     public function union()
    {
        return $this->hasmany(Union::class);
    }

}
