<?php

namespace App\Http\Controllers;

use App\Currency;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CurrencyController extends Controller
{
    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function parse(Request $request){
        //change format date
        $getDate = $request->get('date');
        $newDate = date("d-m-Y", strtotime($getDate));
        //load data from url (XML format)
        $url = Currency::$BASE_URL.$newDate;
        $xml = simplexml_load_file($url);
        //check duplicate date
        $insert_date = date("Y-m-d", strtotime($xml['Date']));
        $check = Currency::where('date', '=', $insert_date)->get()->count();

        if(!empty($xml) && date("d-m-Y", strtotime($xml['Date'])) == $newDate && $check==0){
            $count = $xml->count();
            for ($i=0; $i<$count; $i++){
                Currency::insert([
                    'valuteID'=>$xml->Valute[$i]['ID'],
                    'numCode'=>$xml->Valute[$i]->NumCode,
                    'charCode'=>$xml->Valute[$i]->CharCode,
                    'name'=>$xml->Valute[$i]->Name,
                    'value'=>$xml->Valute[$i]->Value,
                    'date'=>$insert_date,
                ]);

            }
            return redirect()->back()->with('success', "Currency data inserted to DB successfully!");
        }
        return redirect()->back()->with('danger', "Yes problem with this date!");
    }
    public function currency(){
        $currency = DB::table('currency')->distinct('name')->get(['name', 'valuteID']);
        return view('currency', compact('currency'));
    }
    public function getCurrency(Request $request){
        $valuteId = $request->get('valute_id');
        $from = date("Y-m-d", strtotime($request->get('from')));
        $to = date("Y-m-d", strtotime($request->get('to')));
        $currencies = Currency::where([
            ['valuteID','=', $valuteId],
            ['date','>=',$from],
            ['date','<=',$to]
        ])->get(['value', 'date']);
        return view('currency_list', compact('currencies'));
    }
    public function currencies(){
        return view('currencies');
    }
    public function getCurrencies(Request $request){
        $paginate = 10;
        $from = date("Y-m-d", strtotime($request->get('from')));
        $to = date("Y-m-d", strtotime($request->get('to')));
        $currencies = Currency::where([
            ['date','>',$from],
            ['date','<',$to]
        ])->paginate($paginate);

        return view('currencies_list', compact('currencies', 'from', 'to'));
    }
}
