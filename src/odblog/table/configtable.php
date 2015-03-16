<?php

namespace OdBlog\Table;

use Fw\Table\Mysql;

class ConfigTable extends Mysql{
    
    const ID = 'id';
    const KEY = 'key';
    const VALUE = 'value';
    const TITLE = 'title';
    const DESC = 'desc';
    const KIND = 'kind';
    const SORT = 'sort';
    const TYPE = 'type';
    const DEFINE = 'define';
    
    
	/**
	 * get table schema
	 * @return {array}
	 */
	public function getSchema(){
		return array(
			static::__TABLE=>'od_config',
			static::__PK=>static::ID,
			static::__FIELD=> array(
				static::ID=>'int',
				static::KEY=>'string',
				static::VALUE=>'string',
				static::TITLE=>'string',
                static::DESC=>'string',
                static::KIND=>'int',
                static::SORT=>'int',
                static::TYPE=>'int',
                static::DEFINE=>'string'
			)
		);
	}
    
    //单行
    const TYPE_ONELINE = 0;
    //多行
    const TYPE_MULTLINE = 1;
    //选择框
    const TYPE_SELECT = 2;
    public static function getTypeDefine(){
        return array(
            static::TYPE_ONELINE=>'单行',
            static::TYPE_MULTLINE=>'多行',
            static::TYPE_SELECT=>'选择框'
        );   
    }
}