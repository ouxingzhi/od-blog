#od-blog 安装sql定义

#创建博客库
create database if not exists od_blog character set utf8;


#用户系统

drop table if exists od_user;

create table if not exists od_user(
    `id` int(11) unsigned not null auto_increment primary key comment "用户id",
    `name` varchar(47) not null default "" comment "用户名",
    `nickname` varchar(100) not null default "" comment "昵称",
    `email` varchar(100) not null default "" comment "email",
    `password` varchar(47) not null default "" comment "密码"
) character set utf8 comment "用户表";

#文章系统

#文章表

drop table if exists od_article;

create table if not exists od_article(
    `id` int(11) unsigned not null auto_increment primary key comment "文章id",
    `title` varchar(100) not null default "" comment "标题",
    `entitle` varchar(150) not null default "" comment "英文标题",
    `image` varchar(200) not null default "" comment "图片",
    `kind` int(11) unsigned  not null default 0 comment "分类",
    `summary` varchar(400) not null default "" comment "描述",
    `uid` int(11) unsigned  not null default 0 comment "创建用户id",
    `cdate` timestamp not null default 0 comment "创建时间",
    `edate` timestamp not null default 0 comment "修改时间",
    `sort`  int(11) unsigned not null default 0 comment "排序值",
    `body` text null comment "正文"
) character set utf8 comment "文章表";

#分类定义表

drop table if exists od_article_kind_define;

create table if not exists od_article_kind_define(
    `id` int(11) unsigned not null auto_increment primary key comment "分类id",
    `name` varchar(47) not null default "" comment "分类标题",
    `sort` int(11) unsigned not null default 0 comment "排序值",
    `cdate` timestamp not null default 0 comment "创建时间"
) character set utf8 comment "文章种类定义表";

#文章tag定义表

drop table if exists od_article_tag_define;

create table if not exists od_article_tag_define(
    `id` int(11) unsigned not null auto_increment primary key comment "tag id",
    `name` varchar(47) not null default "" comment "tag值",
    `sort` int(11) unsigned not null default 0 comment "排序值",
    `cdate` timestamp not null default 0 comment "创建时间"
) character set utf8 comment "文档 tag定义表";

#文章tag对应表

drop table if exists od_article_tag;

create table if not exists od_article_tag(
    `id` int(11) unsigned not null auto_increment primary key comment "id",
    `aid` int(11) unsigned not null default 0 comment "文章id",
    `tid` int(11) unsigned not null default 0 comment "tag id",
    `cdate` timestamp not null default 0 comment "创建时间"
) character set utf8 comment "文章tag对应表";

#配置系统

drop table if exists od_config;

create table if not exists od_config(
    `id` int(11) unsigned not null auto_increment primary key comment "配置 id",
    `key` varchar(47) unique not null default "" comment "配置 key",
    `value` text null comment "配置内容",
    `title` varchar(47) not null default "" comment "标题",
    `desc` varchar(500) not null default "" comment "描述",
    `king` int(11) unsigned not null default 0 comment "配置分类",
    `sort` int(11) unsigned not null default 999 comment "排序"
) character set utf8 comment "配置表";

#配置种类

drop table if exists od_config_king;

create table if not exists od_config_kind(
    `id` int(11) unsigned not null auto_increment primary key comment "配置种类id",
    `title` varchar(47) not null default "" comment "配置种类标题",
    `desc` varchar(500) not null default "" comment "配置种类描述",
    `sort` int(11) unsigned not null default 999 comment "排序"
) character set utf8 comment "配置种类";


