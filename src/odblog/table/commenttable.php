<?php

namespace OdBlog\Table;

use Fw\Table\Mysql;

class CommentTable extends Mysql{
    
    const ID = 'id';
    const BLOG_ID = 'blog_id';
    const PARENT_ID = 'parent_id';
    const ROOT_ID = 'root_id';
    const NAME = 'name';
    const EMAIL = 'email';
    const BODY = 'body';
    const CDATE = 'cdate';
    
	/**
	 * get table schema
	 * @return {array}
	 */
	public function getSchema(){
		return array(
			static::__TABLE=>'od_comment',
			static::__PK=>static::ID,
			static::__FIELD=> array(
				static::ID=>'int',
				static::BLOG_ID=>'int',
				static::PARENT_ID=>'int',
				static::ROOT_ID=>'int',
                static::NAME=>'string',
                static::EMAIL=>'string',
                static::BODY=>'string',
                static::CDATE=>'int'
			)
		);
	}
}