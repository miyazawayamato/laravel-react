<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Abraham\TwitterOAuth\TwitterOAuth;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        
        $schedule->call(function () {
            
            $url = "https://api.opendata.go.jp/mhlw/death-cases?apikey=tHJPhnlzZ13TAqOXAFG5iyGxQKE2QREG";
            $json = file_get_contents($url);
            $json = mb_convert_encoding($json, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
            $arr = json_decode($json,true);
            $key = array_key_last($arr);
            
            $config = config('twitter');
            
            $twitter = new TwitterOAuth(
                $config['api_key'], 
                $config['secret_key'], 
                $config['access_token'], 
                $config['access_token_secret']
            );
                
            $twitter->post("statuses/update", [
                "status" =>
                date("m/d").'最新コロナウイル死者数情報'. PHP_EOL
                .$arr[$key]["日付"].'時点で'.PHP_EOL
                .$arr[$key]["死亡者数"].'人です'
            ]);
        })->twiceDaily(0, 12);
        
        $schedule->call(function () {
            
            $url = "https://api.opendata.go.jp/mhlw/positive-cases?apikey=tHJPhnlzZ13TAqOXAFG5iyGxQKE2QREG";
            $json = file_get_contents($url);
            $json = mb_convert_encoding($json, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
            $arr = json_decode($json,true);
            $key = array_key_last($arr);
            
            $config = config('twitter');
            
            $twitter = new TwitterOAuth(
                $config['api_key'], 
                $config['secret_key'], 
                $config['access_token'], 
                $config['access_token_secret']
            );
                
            $twitter->post("statuses/update", [
                "status" =>
                date("m/d").'最新コロナウイル陽性者数情報'. PHP_EOL
                .$arr[$key]["日付"].'日で'.PHP_EOL
                .$arr[$key]["PCR 検査陽性者数(単日)"].'人です'
            ]);
        })->everyMinute();
        // })->twiceDaily(6, 18);
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
