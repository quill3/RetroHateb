<?php
class topview extends commonview {
    
    var $_html;
    
//ヘッダ
    function __construct() {
        $this->_html .= <<< EOF
<html>
<head>
<title>RetroHateb</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="stylesheet" type="text/css" href="stuff/top.css">
</head>
<body>
<div style="text-align:center;">
<div class="cont">
<div class="header"><a href="http://d.hatena.ne.jp/quill3/20090503/p1" target="_blank" >About this service</a></div>
<div class="logo"><img src="stuff/rhlogo11.png" alt="RetroHateb" border="0"><br>
<img src="stuff/rhlogo12.png" alt="RetroHateb" border="0"></div>

EOF;
    }

//フッタ
    function footer () {
        $this->_html .= '</div></div>'."\n";
        $this->_html .= <<< EOF
<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
try {
var pageTracker = _gat._getTracker("UA-568420-4");
pageTracker._trackPageview();
} catch(err) {}</script>
EOF;
        $this->_html .= "\n".'</body>'."\n".'</html>';
    }

}
?>