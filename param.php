<?php
class Param {
    
    var $_param;
    var $_userparam;
    var $_sqlparam;
    var $_rowsum;
    
    function __construct() {
        
        require_once(dirname(__FILE__).'/config.php');
        
        foreach ( $regexpparam as $key => $value ) {
            if (preg_match($value,$_REQUEST[$key])) {
                $this->_param[$key] = $_REQUEST[$key];
            } else {
                $this->_param[$key] = $defaultparam[$key];
            }
            if ($key == 'action' || $key == 'model' || $key == 'view') {
                if (file_exists($key.'/'.$this->_param[$key].$key.'.php') &&
                $this->_param[$key] != 'common') {
                    $this->_param[$key] .= $key;
                } else {
                    $this->_param[$key] = $defaultparam[$key].$key;
                }
            }
        }
        
//ユーザー定義部分の入力チェック
        foreach ( $userparam as $key => $value ) {
            if (array_key_exists($_REQUEST[$key], $value)) {
                $this->_param[$key] = $_REQUEST[$key];
            } else {
                $keys = array_keys($value);
                $this->_param[$key] = $keys[0];
            }
        }
        
        $maxfocus = count($sqlparam[$this->_param['period']]);
        if ($maxfocus < $this->_param['focus']) {
            $this->_param['focus'] = 1;
        }
        
        $this->_userparam = $userparam;
        $this->_sqlparam = $sqlparam;
        
    }
    
}
?>