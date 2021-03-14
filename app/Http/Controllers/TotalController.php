<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TotalController extends Controller
{
    //
    
    public function total($id)
    {
        
        switch($id) {
            
            case 1:
                //死者数
                $url = "https://api.opendata.go.jp/mhlw/death-cases?apikey=tHJPhnlzZ13TAqOXAFG5iyGxQKE2QREG";
                $json = file_get_contents($url);
                $json = mb_convert_encoding($json, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
                $arr = json_decode($json,true);
                $key = array_key_last($arr);
                $data = ['日付' => $arr[$key]["日付"], '人数' => $arr[$key]["死亡者数"]];
                break;
            case 2:
                
                //陽性者数
                $url = "https://api.opendata.go.jp/mhlw/positive-cases?apikey=tHJPhnlzZ13TAqOXAFG5iyGxQKE2QREG";
                $json = file_get_contents($url);
                $json = mb_convert_encoding($json, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
                $arr = json_decode($json,true);
                $sum = 0;
                foreach ($arr as $num) {
                    $sum += (int)$num["PCR 検査陽性者数(単日)"];
                }
                $key = array_key_last($arr);
                $data = ['日付' => $arr[$key]["日付"], '人数' => $sum];
                break;
                
            case 3:
                //重症者数
                $url = "https://api.opendata.go.jp/mhlw/severe-cases?apikey=tHJPhnlzZ13TAqOXAFG5iyGxQKE2QREG";
                $json = file_get_contents($url);
                $json = mb_convert_encoding($json, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
                $arr = json_decode($json,true);
                $key = array_key_last($arr);
                $data = ['日付' => $arr[$key]["日付"], '人数' => $arr[$key]["重症者数"]];
                break;
        }
        
        
        return response()->json(['data' => $data]);
    }
    
    
    
    
    public function deaths()
    {
        $url = "https://api.opendata.go.jp/mhlw/death-cases?apikey=tHJPhnlzZ13TAqOXAFG5iyGxQKE2QREG";
        $json = file_get_contents($url);
        $json = mb_convert_encoding($json, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
        $arr = json_decode($json,true);
        $sum = 0;
        foreach ($arr as $num) {
            $sum += (int)$num["死亡者数"];
        }
        $key = array_key_last($arr);
        $data = ['日付' => $arr[$key]["日付"], '人数' => $sum];
        
        return response()->json(['data' => $data]);
    }
    
    public function severe()
    {
        //重症者数
        $url = "https://api.opendata.go.jp/mhlw/severe-cases?apikey=tHJPhnlzZ13TAqOXAFG5iyGxQKE2QREG";
        $json = file_get_contents($url);
        $json = mb_convert_encoding($json, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
        $arr = json_decode($json,true);
        $key = array_key_last($arr);
        $latest = $arr[$key];
        
        return response()->json(['latest' => $latest]);
    }
    
    public function positive()
    {
        $url = "https://api.opendata.go.jp/mhlw/positive-cases?apikey=tHJPhnlzZ13TAqOXAFG5iyGxQKE2QREG";
        $json = file_get_contents($url);
        $json = mb_convert_encoding($json, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
        $arr = json_decode($json,true);
        $sum = 0;
        foreach ($arr as $num) {
            $sum += (int)$num["PCR 検査陽性者数(単日)"];
            
        }
        $key = array_key_last($arr);
        $latest = $arr[$key];
        
        return response()->json(['latest' => $latest]);
    }
}
