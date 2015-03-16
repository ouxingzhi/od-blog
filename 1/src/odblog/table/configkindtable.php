<?php

namespace OdBlog\Table;

use Fw\Table\Mysql;

class ConfigKindTable extends Mysql{
    
    const ID = 'id';
    const TITLE = 'title';
    const DESC = 'desc';
    const SORT = 'sort';
    
	/**
	 * get table schema
	 * @return {array}
	 */
	public function getSchema(){
		return array(
			static::__TABLE=>'od_config_kind',
			static::__PK=>static::ID,
			static::__FIELD=> array(
				static::ID=>'int',
				static::TITLE=>'string',
				static::DESC=>'string',
                static::SORT=>'int|999'
			)
		);
	}
}