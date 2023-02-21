<?php
/**
 * Description of LstDesserts
 *
 * @author didier
 */
require('./ConnectBase.php');

class ListMets {
    public $name;
    public $link;

    public function __construct() {
	$this->plats = $this->name;
	
    }
    
    //put your code here
}

class db_select extends db_connect 
{ 
    var $count; 
    var $row;      
    function function_db_select($count=0, $row="") 
    { 
        $this->count = $count; 
        $this->row = $row;     
    }      
    function db_set_select($sql, $num) 
    { 
        $qry = mysql_query($sql); 
        $this->count = mysql_num_rows($qry); 
        $i=0; 
        while($out = mysql_fetch_array($qry))
    { 
            for($j=0; $j<$num; $j++  )
        { 
                $this->row[$i][$j] = $out[$j]; 
            } 
        $i++ ; 
        } 
    }      
    function db_get_select() { 
        return $this->row; 
    }      
    function db_get_count() { 
        return $this->count; 
    } 
} 