<?php
    
namespace OdBlog\Model;

use Fw\Core\Model;
use OdBlog\Table\ArticleTable;

class ArticleModel extends Model{
    private $table;
    public function __construct(){
        parent::__construct();
        $this->table = new ArticleTable();
    }
    public function getTableObject(){
        return $this->table;   
    }
}