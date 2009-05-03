<?php

//ここで指定した正規表現にマッチしなければ、デフォルト値に置換する
$regexpparam = array('action' => '/^[0-9a-zA-Z_]+$/',
                     'model' => '/^[0-9a-zA-Z_]+$/',
                     'view' => '/^[0-9a-zA-Z_]+$/',
                     'focus' => '/^[0-9]+$/',
                     'page' => '/^[0-9]+$/');

//デフォルト値
$defaultparam = array('action' => 'top',
                      'model' => 'hateb',
                      'view' => 'top',
                      'focus' => '1',
                      'page' => '1');


//ユーザー定義（入力チェック／入力フォーム生成／見出し表示用）
$userparam = array('year' => array('2008' => '2008', '2007' => '2007', '2006' => '2006', '2005' => '2005'),
                   'site' => array('anond' => 'はてな匿名ダイアリー', 'dqnplus' => '痛いニュース', 'komachi' => '大手小町',
                                   'dankogai' => '404 Blog Not Found', 'ikedanobuo' => '池田信夫 blog', 'finalvent' => 'finalventの日記',
                                   'phpspot' => 'phpspot開発日誌', 'ideaxidea' => 'IDEA*IDEA', 'gigazine' => 'GIGAZINE',
                                   'youtube' => 'YouTube', 'asahi' => 'asahi.com', 'book' => '本'),
                   'period' => array('month' => '月間', 'quarter' => '四半期', 'half' => '半期', 'year' => '年間')
                  );

//ユーザー定義（SQL作成用）
$sqlparam = array('month' => array(array('01','01','1月'), array('02','02','2月'), array('03','03','3月'), array('04','04','4月'), array('05','05','5月'), array('06','06','6月'),
                            array('07','07','7月'), array('08','08','8月'), array('09','09','9月'), array('10','10','10月'), array('11','11','11月'), array('12','12','12月')),
                  'quarter' => array(array('01','03','1〜3月'), array('04','06','4〜6月'), array('07','09','7〜9月'), array('10','12','10〜12月')),
                  'half' => array(array('01','06','1〜6月'), array('07','12','7〜12月')),
                  'year' => array(array('01','12','1〜12月'))
                 );

?>