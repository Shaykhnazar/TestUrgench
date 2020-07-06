<?php

namespace App\Http\Controllers;

use App\Currency;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CurrencyController extends Controller
{
    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function parse(Request $request){
        $getDate = $request->get('date');
        $newDate = date("d-m-Y", strtotime($getDate));
        $url = Currency::$BASE_URL.$newDate;
        $xml = simplexml_load_file($url);
        $insert_date = date("Y-m-d", strtotime($xml['Date']));
        if(!empty($xml) && date("d-m-Y", strtotime($xml['Date'])) == $newDate){
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
}
