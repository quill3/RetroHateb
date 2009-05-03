<?php

function __autoload($className) {
    include_once(dirname(__FILE__).'/action/'.$className.'.php');
    include_once(dirname(__FILE__).'/model/'.$className.'.php');
    include_once(dirname(__FILE__).'/view/'.$className.'.php');
}
require_once(dirname(__FILE__).'/param.php');

$paramobject = new Param();
$actionname = $paramobject->_param['action'];
new $actionname($paramobject);

?>