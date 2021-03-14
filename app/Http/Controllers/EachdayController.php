<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EachdayController extends Controller
{
    //
    public function eachDay($id, $year, $month, $day)
    {
        
        
        $date = $year.'/'.$month.'/'.$day;
        
        switch($id) {
            
            case 1:
                //陽性者数
                $url = "https://api.opendata.go.jp/mhlw/positive-cases?apikey=tHJPhnlzZ13TAqOXAFG5iyGxQKE2QREG";
                $json = file_get_contents($url);
                $json = mb_convert_encoding($json, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
                $arr = json_decode($json,true);
                
                $index = array_search($date, array_column($arr, "日付"));
                if ($index) {
                    $result = $arr[$index];
                } else {
                    $result = ['日付' => '該当データなし', "PCR 検査陽性者数(単日)" => '該当データなし']; 
                }
                $data = ['日付' => $result['日付'], '人数' => $result["PCR 検査陽性者数(単日)"]];
                break;
            case 2:
                
                //重症者
                $url = "https://api.opendata.go.jp/mhlw/severe-cases?apikey=tHJPhnlzZ13TAqOXAFG5iyGxQKE2QREG";
                $json = file_get_contents($url);
                $json = mb_convert_encoding($json, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
                $arr = json_decode($json,true);
                
                $index = array_search($date, array_column($arr, "日付"));
                if ($index) {
                    $result = $arr[$index];
                } else {
                    $result = ['日付' => '該当データなし', "重症者数" => '該当データなし']; 
                }
                $data = ['日付' => $result['日付'], '人数' => $result["重症者数"]];
                
                break;
                
            case 3:
                //検査人数
                
                $url = "https://api.opendata.go.jp/mhlw/test-case?apikey=tHJPhnlzZ13TAqOXAFG5iyGxQKE2QREG";
                $json = file_get_contents($url);
                $json = mb_convert_encoding($json, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
                $arr = json_decode($json,true);
                
                $index = array_search($date, array_column($arr, "日付"));
                if ($index) {
                    $result = $arr[$index];
                } else {
                    $result = ['日付' => '該当データなし', "PCR 検査実施件数(単日)" => '該当データなし']; 
                }
                $data = ['日付' => $result['日付'], '人数' => $result["PCR 検査実施件数(単日)"]];
                break;
        }
        
        
        return response()->json(['data' => $data]);
    }
}
