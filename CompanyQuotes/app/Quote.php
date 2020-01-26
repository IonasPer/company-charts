<?php

namespace App;

use App\Imports\CSVImport;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;

class Quote extends Model
{
    //
    protected $fillable = ['date','open', 'high', 'low','close','volume'];

    protected $table = 'quotes';

    public static function getQuotes(\Illuminate\Http\Request $request){
        $rules = Form::getFormRules();
        $validator = Validator::make($request->all(),$rules)->validate();
        $start_date =  Form::changeFormat($request->get('start_date'));
        $end_date =  Form::changeFormat($request->get('end_date'));
        $url = 'https://www.quandl.com/api/v3/datasets/WIKI/'.$request->get('company_symbol').'.csv?order=asc&start_date='.$start_date.'&end_date='.$end_date;
        $destination = storage_path('app'.DIRECTORY_SEPARATOR.'api_data' . DIRECTORY_SEPARATOR .'AAPL'.'.csv');
        $json = File::put($destination,file_get_contents($url));
        $quote_chunks =  Excel::toCollection(new CSVImport(), $destination)[0]->chunk(100);
        try {
            foreach ($quote_chunks as $quote_chunk) {
                foreach ($quote_chunk as $quote) {

                        $result = Quote::where('name',$quote['date']);
                        Quote::updateOrCreate([
                            'date'=>$quote['date']],[
                            'open'=>$quote['open'],
                            'high' => $quote['high'],
                            'low' =>$quote['low'],
                            'close' =>$quote['close'],
                            'volume' =>$quote['volume']
                        ]);



                }
            }
            return $quote_chunks;
        }catch(\Exception $e){
            dd($e);
        }


        return 'success';
    }
}
