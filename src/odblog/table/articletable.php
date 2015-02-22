<?php

namespace OdBlog\Table;

use Fw\Table\Mysql;

class ArticleTable extends Mysql{
    
    const ID = 'id';
    const TITLE = 'title';
    const KIND = 'kind';
    const SUMMARY = 'summary';
    const UID = 'uid';
    const CDATE = 'cdate';
    const EDATE = 'edate';
    const SORT = 'sort';
    const BODY = 'body';
    
	/**
	 * get table schema
	 * @return {array}
	 */
	public function getSchema(){
		return array(
			static::__TABLE=>'od_article',
			static::__PK=>static::ID,
			static::__FIELD=> array(
				    static::ID=>'int',
                    static::TITLE=>'string',
                    static::KIND=>'int',
                    static::SUMMARY=>'string',
                    static::UID=>'int',
                    static::CDATE=>'datetime',
                    static::EDATE=>'datetime',
                    static::SORT=>'int',
                    static::BODY=>'string'
			)
		);
	}
}