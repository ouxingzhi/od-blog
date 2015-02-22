<?php

namespace OdBlog\Table;

use Fw\Table\Mysql;

class ArticleTagTable extends Mysql{
    
    const ID = 'id';
    const AID = 'aid';
    const TID = 'tid';
    const CDATE = 'cdate';
    
	/**
	 * get table schema
	 * @return {array}
	 */
	public function getSchema(){
		return array(
			static::__TABLE=>'od_article_tag',
			static::__PK=>static::ID,
			static::__FIELD=> array(
				static::ID=>'int',
				static::AID=>'int',
				static::TID=>'int',
				static::CDATE=>'datetime'
			)
		);
	}
}