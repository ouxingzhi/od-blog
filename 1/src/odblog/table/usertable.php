<?php

namespace OdBlog\Table;

use Fw\Table\Mysql;

class UserTable extends Mysql{
    
    const ID = 'id';
    const NAME = 'name';
    const NICKNAME = 'nickname';
    const EMAIL = 'email';
    const PASSWORD = 'password';
    
	/**
	 * get table schema
	 * @return {array}
	 */
	public function getSchema(){
		return array(
			static::__TABLE=>'od_user',
			static::__PK=>static::ID,
			static::__FIELD=> array(
				static::ID=>'int',
				static::NAME=>'string',
				static::NICKNAME=>'string',
				static::EMAIL=>'string',
                static::PASSWORD=>'string'
			)
		);
	}
}