<?php

namespace OdBlog\Model;

use OdBlog\Table\ArticleKindDefineTable;
use Fw\Core\Model;

class ArticleKindDefineModel extends Model{
    private $table;
    public function __construct(){
        parent::__construct();
        $this->table = new ArticleKindDefineTable();
    }
    public function getTableObject(){
        return $this->table;   
    }
}