<?php
class listaction extends commonaction {
    
    function __construct(&$paramobject) {
        $modelname = $paramobject->_param['model'];
        $viewname = $paramobject->_param['view'];
        
        $modelobject = new $modelname();
        $modelobject->read($paramobject);
        
        $viewobject = new $viewname();
        $viewobject->form($paramobject);
        $viewobject->tab($paramobject);
        $viewobject->pager($paramobject);
        $viewobject->searchresult($modelobject);
        $viewobject->pager($paramobject);
        $viewobject->footer();
        $viewobject->write();
    }
    
}
?>