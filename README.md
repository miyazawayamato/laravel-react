## コロナウイルス感染者情報サイト・TwitterBot

### アプリ概要
[政府が提供しているAPI](http://portal.opendata.go.jp)の情報を反映させてあります。  
現在の合計値や日別のそれぞれの状況がわかります。  
またツイッターに自動ツイートする機能のあります。  
heroku無料プランでDynoがスリープしている状態がほとんどなので、初回アクセス時はサイトが読み込まれるのが遅いです。
[Twitterアカウント](https://twitter.com/test66130109)  
[サイトへ移動](https://glacial-sierra-22254.herokuapp.com/)

### アプリ機能
apiで取得(laravelで)  
laravel×ReactでSPA  
ajaxで取得し表示(React)  
Twitter Developer  
自動ツイート(タスクスケジュール) 

### 使用技術
言語：php(laravel) javascript(react)  
デザイン：scss  
開発環境：docker xampp  
デプロイ：heroku postgresql  