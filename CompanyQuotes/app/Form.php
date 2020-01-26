<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Form extends Model
{
    //
    protected $fillable = ['company_symbol','start_date', 'end_date', 'email'];
    public $visible = ['company_symbol','start_date', 'end_date', 'email'];

    protected $table = 'forms';

    public static function fieldInputs(){
        return [
            'company_symbol' => ['label' => 'Company Symbol','type'=>'text'],
            'start_date' => ['label' => 'Start Date','type'=>'text'],
            'end_date' => ['label' => 'End Date','type'=>'text'],
            'email' => ['label' => 'E-mail','type'=>'email'],
        ];
    }
    public static function getFormRules(){
        return ['company_symbol' => 'required|alpha_dash|max:100',
            'start_date' => 'required|date|before:today',
            'end_date' => 'required|date|after:start_date|before_or_equal:today',
            'email' => 'required:email'
        ];
    }
    public static function changeFormat($date)
    {
        return Carbon::parse($date)->format('y-m-d');
    }
}
