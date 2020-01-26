<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Validator;

class Company extends Model
{
    //
    protected $fillable = ['company_name','financial_status','market_category','round_lot_size','security_name','symbol'];
    protected $table = 'companies';
    public static function getCompaniesByName(string $str){
        $validator = Validator::make(['company_symbol'=>$str], [
            'company_symbol' => 'required|alpha_dash|max:100',
        ])->validate();

        $results = Company::where('symbol','like',$str.'%')->get()->pluck('symbol')->all();
        return $results;
    }
}
