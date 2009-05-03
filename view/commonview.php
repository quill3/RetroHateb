<?php
class commonview {
    
//フォーム    
    function form (&$paramobject) {
        $year = $paramobject->_param['year'];
        $site = $paramobject->_param['site'];
        $period = $paramobject->_param['period'];
        $userparam = $paramobject->_userparam;
        
        $this->_html .= '<div class="form"><form action="index.php" method="get">'."\n";
        
        $this->_html .= '<input type="hidden" name="action" value="list">'."\n";;
        $this->_html .= '<input type="hidden" name="view" value="list">'."\n";;
        
        $this->_html .= '<select name="year">';
        foreach ( $userparam['year'] as $key => $value ) {
            $this->_html .=  '<option value="'.$key.'"'.
            $this->selchk($key,$year,' selected="selected"').'>'.$value.'</option>';
        }
        $this->_html .= '</select>年の'."\n";
        
        $this->_html .= '<select name="site">';
        foreach ( $userparam['site'] as $key => $value ) {
            $this->_html .= '<option value="'.$key.'"'.
            $this->selchk($key,$site,' selected="selected"').'>'.$value.'</option>';
        }
        $this->_html .= '</select>を'."\n";
        
        $this->_html .= '<input type="submit" value="はてブ検索"><br><br>'."\n";

        $this->_html .= '表示単位：';
        foreach ( $userparam['period'] as $key => $value ) {
            $this->_html .= '<input type="radio" name="period" value="'.$key.'"'.
            $this->selchk($key,$period,' checked').'>'.$value;
        }
        
        $this->_html .= "\n".'</form></div>'."\n";
    }
    
//フッタ
    function footer () {
        $this->_html .= '<div class="footer">This service is created by <a href="http://d.hatena.ne.jp/quill3/" target="_blank" >quill3</a></div>'."\n";
        $this->_html .= '</div>'."\n";
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
    
    function write () {
        echo $this->_html;
    }
    
    function selchk ($chkitem,$chkeditem,$rtnitem) {
        if ($chkitem == $chkeditem) {
            return $rtnitem;;
        }
    }
    
}
?>