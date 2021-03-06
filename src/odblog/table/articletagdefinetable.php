<?php

namespace OdBlog\Table;

use Fw\Table\Mysql;

class ArticleTagDefineTable extends Mysql{
    
    const ID = 'id';
    const NAME = 'name';
    const SORT = 'sort';
    const CDATE = 'cdate';
    
	/**
	 * get table schema
	 * @return {array}
	 */
	public function getSchema(){
		return array(
			static::__TABLE=>'od_article_tag_define',
			static::__PK=>static::ID,
			static::__FIELD=> array(
				static::ID=>'int',
				static::NAME=>'string',
				static::SORT=>'int',
				static::CDATE=>'int'
			)
		);
	}
}