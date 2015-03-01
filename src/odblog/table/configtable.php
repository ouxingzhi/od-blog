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
                static::SORT=>'int'
			)
		);
	}
}