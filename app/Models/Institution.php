<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Institution extends Model
{
    use HasFactory;

    // protected $fillable = [
    //     'name','description','location','email','address'
    // ];

    protected $guarded = [];


    public function getAssets(){
         // get all the departments belonging to this institution
         $department_ids = Department::where('institution_id', $this->id)->pluck('id');

         // get all the assets belonging to those departments
         $data = Asset::whereIn('department_id', $department_ids)->get();

         return $data;

    }
}
