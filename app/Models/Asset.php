<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'code', 'description', 'acquisition_date',
        'useful_life', 'department_id', 'category_id', 'user_id',
        'depreciation_method', 'depreciation_rate', 'value'
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    // accessor - these are fields that can be dynamically access ffrom your class
    public function getRemainingYearsAttribute(){
        // get the acquisition date e.g 2023
        // get the current year e.g 2024
        // substract acqusition year form current year : 2024 - 2023  = 1
        // substract the used time from the planned useful life 
        // if the useful life is 5 year, 5-1 = 4
    }

    public function bookValue()
    {
        if ($this->depreciation_method === "straight line") {
            $value =  $this->calcBookValByStraight();
            return $value;
        }
       
        $value =  $this->calcBookValByDecline();
        return $value;
        

        
    }

    public function calcBookValByStraight()
    {
        $res = (($this->value) - 0) / $this->useful_life;
        $year = date('Y');
        $p_year = Carbon::parse($this->acquisition_date);

        $used_years = $year - $p_year->year;

        $val = $this->value - ($used_years * $res);

        if ($val < 0) {
            return 0;
        }

        return $val;
    }

    public function calcBookValByDecline()
    {
        $year = date('Y');
        $p_year = Carbon::parse($this->acquisition_date);

        $accumulated = 0;

        $diff_years = $year - $p_year->year;

        for ($year_num = 0; $year_num < $diff_years; $year_num++) {
            $accumulated += ($this->value - $accumulated) * ($this->depreciation_rate / 100);
        }

        $val = $this->value - $accumulated;

        if ($val < 0) {
            return 0;
        }


        return $val;
    }


}
