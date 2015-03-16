<?php
    
namespace OdBlog\Model;

use Fw\Core\Model;
use OdBlog\Table\ConfigKindTable;

class ConfigKindModel extends Model{
    private $table;
    public function __construct(){
        parent::__construct();
        $this->table = new ConfigKindTable();
    }
    public function getTableObject(){
        return $this->table;   
    }
}