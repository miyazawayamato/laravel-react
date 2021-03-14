<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalendarController extends Controller
{
    //
    
    public function test()
    {
        //死亡者数(合計)
        // $url = "https://api.opendata.go.jp/mhlw/death-cases?apikey=tHJPhnlzZ13TAqOXAFG5iyGxQKE2QREG";
        //重症者数
        //$url = "https://api.opendata.go.jp/mhlw/severe-cases?apikey=tHJPhnlzZ13TAqOXAFG5iyGxQKE2QREG";
        //陽性者数(日ごと)
        $url = "https://api.opendata.go.jp/mhlw/positive-cases?apikey=tHJPhnlzZ13TAqOXAFG5iyGxQKE2QREG";
        //検査人数(日ごと)
        //$url = "https://api.opendata.go.jp/mhlw/test-case?apikey=tHJPhnlzZ13TAqOXAFG5iyGxQKE2QREG";
        
        $json = file_get_contents($url);
        $json = mb_convert_encoding($json, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
        $arr = json_decode($json,true);
        // dd($arr);
        //最後キーの値取得
        // $key = array_key_last($arr);
        // dd($arr[$key]);
        
        //陽性者数合計
        // $sum = 0;
        // foreach ($arr as $num) {
        //     $sum += (int)$num["PCR 検査陽性者数(単日)"];
        // }
        // dd($sum);
        
        //合計
        //初期値が死亡者数(最後の配列)の日付と人数
        //重症者数も最後の配列
        //陽性者数ループ計算、最後の日付、これのみ違う
        
        //日ごとに表示させたい
        //陽性者数
        //重症者数
        //検査人数["PCR 検査実施件数(単日)"];
        return view('test');
    }
}

