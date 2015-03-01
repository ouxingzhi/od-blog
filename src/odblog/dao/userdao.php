<?php

namespace OdBlog\Dao;

use OdBlog\Table\UserTable;
use OdBlog\Model\UserModel;

class UserDao{
    public static function checkPassword($username,$password){
        $userTable = new UserTable();
        $info = $userTable->findOne('*',array(
            UserTable::NAME=>$username,
            UserTable::__AND,
            UserTable::PASSWORD=>md5($password)
        ));
        return $info;
    }
    public static function getUserInfoById($id){
        $userModel = new UserTable();
        $info = $userModel->findOne('*',array(
            UserTable::ID=>$id
        ));
        return $info;
    }
    public static function getUserInfoByName($name){
        $userModel = new UserTable();
        $info = $userModel->findOne('*',array(
            UserTable::NAME=>$name
        ));
        return $info;
    }
    public static function addUser($name,$nickname,$email,$password){
        $errinfo = array();
            
        if(empty($name)){
            $errinfo[] = array(
                'code'=>1,
                'meesage'=>'用户名为空!'
            );
            return $errinfo; 
        }
        if(empty($email)){
            $errinfo[] = array(
                'code'=>2,
                'meesage'=>'email为空!'
            );
            return $errinfo; 
        }
        if(empty($password)){
            $errinfo[] = array(
                'code'=>3,
                'meesage'=>'密码为空!'
            );
            return $errinfo; 
        }
        $userTable = new UserTable();
        
        $info = $userTable->findOne('*',array(
            UserTable::NAME=>$name
        ));
        if(!empty($info)){
            $errinfo[] = array(
                'code'=>4,
                'meesage'=>'用户名已存在!'
            );
            return $errinfo; 
        }
        $info = $userTable->findOne('*',array(
            UserTable::EMAIL=>$email
        ));
        if(!empty($info)){
            $errinfo[] = array(
                'code'=>5,
                'meesage'=>'email地址已存在!'
            );
            return $errinfo; 
        }
        $userTable->insert(array(
            UserTable::NAME=>$name,
            UserTable::NICKNAME=>$nickname,
            UserTable::EMAIL=>$email,
            UserTable::PASSWORD=>$password
        ));
        
        return false;
    }
}