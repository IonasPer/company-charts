<?php

namespace App\Http\Controllers;

use App\Company;
use App\Form;
use App\Quote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class FormController extends Controller
{
    //
    public function index(){
        return view('home',['fields'=> Form::fieldInputs()]);
    }

    public function getCompanies(Request $request){
        $data = Company::getCompaniesByName($request->get('company_symbol'));

        return json_encode($data,JSON_FORCE_OBJECT);
    }

    public function getQuotes(Request $request){
        $data = Quote::getQuotes($request);

        /*echo $res->getStatusCode(); // 200
        echo $res->getBody(); // { "type": "User", ....*/
        return json_encode($data,JSON_FORCE_OBJECT);
    }
    public function getData(Request $request){
        $data = Quote::getQuotes($request);

        return json_encode($data,JSON_FORCE_OBJECT);
    }

}
