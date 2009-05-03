<?php
class listview extends commonview {
    
    var $_html;
    
//ヘッダ
    function __construct() {
        $this->_html .= <<< EOF
<html>
<head>
<title>RetroHateb</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="stylesheet" type="text/css" href="stuff/list.css">
<link rel="stylesheet" type="text/css" href="stuff/tabmenu.css">
</head>
<body>
<div class="cont">
<div class="logo"><a href="http://www.retro-hateb.com/"><img src="stuff/rhlogo2.gif" alt="RetroHateb" border="0"></a></div>

EOF;
    }
    
//タブと見出し
    function tab (&$paramobject) {
        $year = $paramobject->_param['year'];
        $site = $paramobject->_param['site'];
        $period = $paramobject->_param['period'];
        $focus = $paramobject->_param['focus'];
        
        $userparam = $paramobject->_userparam;
        $sqlparam = $paramobject->_sqlparam;
        
        $this->_html .= '<div class="nav"><ul class="nl clearFix">';
        $maxfocus = count($sqlparam[$period]);
        for ($i = 1; $i <= $maxfocus; $i++) {
        $j = $i - 1;
        $this->_html .= '<li'.$this->selchk($i,$focus,' class="active"').'><a href="index.php?action=list&view=list&year='.$year.
                        '&site='.$site.'&period='.$period.'&focus='.$i.'">'.$sqlparam[$period][$j][2].'</a></li>';
        }
        $this->_html .= '</ul></div>'."\n";
        
        $this->_html .= '<h2>'.$userparam['year'][$year].'年の'.$userparam['site'][$site].'（'.$userparam['period'][$period].'表示）</h2>'."\n";
    }

//ページャ(Pear::Pagerを使用)
    function pager (&$paramobject) {
        $year = $paramobject->_param['year'];
        $site = $paramobject->_param['site'];
        $period = $paramobject->_param['period'];
        $focus = $paramobject->_param['focus'];
        $rowsum = $paramobject->_rowsum;
        
        require_once(dirname(__FILE__).'/../userlib/Pager/Pager.php');
        $options = array(
            "totalItems" => $rowsum, "delta" => 10, "perPage" => 30,
            "mode" => "Jumping",
            "altFirst" => "最初", "altPrev" => "前へ", "altNext" => "次へ", "altLast" => "最後", "altPage" => "ページ",
            "prevImg" => "(前へ)", "nextImg" => "(次へ)",
            "separator" => " ",
            "urlVar" => "page",
            "append" => 0, "fileName" => "index.php?action=list&view=list&year=".$year."&site=".$site."&period=".$period."&focus=".$focus."&page=%d"
        );
        $pager = Pager::factory($options); 
        $this->_html .=  '<div class="pager">'.$pager->links."</div>";
    }
    
//検索結果
    function searchresult(&$modelobject) {
        foreach ( $modelobject->_records as $rs ) {
            if (preg_match('/^http:\/\/b.hatena.ne.jp\/asin\//', $rs[uri])) {
                $entryuri = '';
            } else {
                $entryuri = 'http://b.hatena.ne.jp/entry/';
            }
            $this->_html .= '<p class="result"><a href="'.$rs[uri].'" target="_blank">'.$rs[title].'</a><br>'."\n".
                            '<span class="users"><strong><a href="'.$entryuri.$rs[uri].'" target="_blank">'.$rs[users].
                            ' users</a></strong></span>&nbsp;&nbsp;<span class="timestamp">'.$rs[timestamp].'</span></p>'."\n";
        }
    }
    
}
?>