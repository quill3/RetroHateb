<?php
class hatebmodel extends commonmodel {
    
    var $_dbh;
    var $_records;
    
    function __construct() {
//DB接続
        try {
            $this->_dbh = new PDO('sqlite:../retrohateb.db','','');
        } catch (PDOException $exception) {
            var_dump($exception->getMessage());
            exit();
        }
    }
    
    function read(&$paramobject) {
        $year = $paramobject->_param['year'];
        $site = $paramobject->_param['site'];
        $period = $paramobject->_param['period'];
        $focus = $paramobject->_param['focus'];
        $page = $paramobject->_param['page'];
        
//SQL作成
        $sqlparam = $paramobject->_sqlparam;
        $i = $focus - 1;
        $frommonth = $sqlparam[$period][$i][0];
        $tomonth = $sqlparam[$period][$i][1];
        
        $sql = 'select count(*) from hateb where site = "'.$site.'" and date >= '.$year.$frommonth.
               ' and date <= '.$year.$tomonth.' order by users desc';
        
//全件数取得
        $stmt = $this->_dbh->query($sql);
        $paramobject->_rowsum = $stmt->fetch(PDO::FETCH_COLUMN);
        
        $sql = 'select * from hateb where site = "'.$site.'" and date >= '.$year.$frommonth.
               ' and date <= '.$year.$tomonth.' order by users desc';
// データ取得地点を求める
        $startrow = ($page - 1) * 30;
        $sql .= " limit 30 offset ".$startrow;
        
//DB入力
        try {
            $this->_records = $this->_dbh->prepare($sql);
            $this->_records->execute();
        } catch (PDOException $exception) {
            var_dump($exception->getMessage());
            exit();
        }
    }
    
}
?>