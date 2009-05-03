<?php
class topaction extends commonaction {
    
    function __construct(&$paramobject) {
        $viewname = $paramobject->_param['view'];
        
        $viewobject = new $viewname();
        $viewobject->form($paramobject);
        $viewobject->footer();
        $viewobject->write();
    }
    
}
?>