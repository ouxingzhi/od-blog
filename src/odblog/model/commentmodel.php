<?php
    
namespace OdBlog\Model;

use Fw\Core\Model;
use OdBlog\Table\CommentTable;

class CommentModel extends Model{
    private $table;
    public function __construct(){
        parent::__construct();
        $this->table = new CommentTable();
    }
    public function getTableObject(){
        return $this->table;   
    }
}