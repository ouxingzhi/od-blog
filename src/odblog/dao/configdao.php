<?php

namespace OdBlog\Dao;

use OdBlog\Table\ConfigTable;

class ConfigDao{
    private static $maps;
    public static function getConfigAll(){
        
        if(!empty(static::$maps)) return $this->maps;
        
        $table = new ConfigTable();
        $list = $table->find();
        static::$maps = array();
        foreach($list as $i=>$item){
            static::$maps[$item[ConfigTable::KEY]] = $item[ConfigTable::VALUE];   
        }
        return static::$maps;
    }
}