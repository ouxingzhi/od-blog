<?php
    
namespace OdBlog\Model;

use Fw\Core\Model;
use OdBlog\Table\UserTable;

class UserModel extends Model{
    private $table;
    public function __construct(){
        parent::__construct();
        $this->table = new UserTable();
    }
    public function getTableObject(){
        return $this->table;   
    }
}