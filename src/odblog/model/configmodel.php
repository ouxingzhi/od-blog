<?php
    
namespace OdBlog\Model;

use Fw\Core\Model;
use OdBlog\Table\ConfigTable;

class ConfigModel extends Model{
    private $table;
    public function __construct(){
        parent::__construct();
        $this->table = new ConfigTable();
    }
    public function getTableObject(){
        return $this->table;   
    }
}