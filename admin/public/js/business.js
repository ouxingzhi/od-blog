void function(){
    var baseurl = typeof __baseurl === 'undefined' ? '/' : __baseurl;
    //删除博客
    function deleteArticle(ids,callback,error){
        var url = baseurl + 'blog/del';
        $.ajax(url,{
            data:{ids:ids},
            type:'post',
            dataType:'json',
            success:function(data){
                callback && callback(data);
            },
            error:function(e){
                error && error(e);
            }
        });
    }
    window.deleteArticle = deleteArticle;
    
    //删除留言
    function deleteComment(ids,callback,error){
        var url = baseurl + 'comment/del';
        $.ajax(url,{
            data:{ids:ids},
            type:'post',
            dataType:'json',
            success:function(data){
                callback && callback(data);
            },
            error:function(e){
                error && error(e);
            }
        });
    }
    window.deleteComment = deleteComment;
    
    //删除分类
    function deleteKind(ids,callback,error){
        var url = baseurl + 'kind/del';
        $.ajax(url,{
            data:{ids:ids},
            type:'post',
            dataType:'json',
            success:function(data){
                callback && callback(data);
            },
            error:function(e){
                error && error(e);
            }
        });
    }
    window.deleteKind = deleteKind;
    
    //删除用户
    function deleteUser(ids,callback,error){
        var url = baseurl + 'user/del';
        $.ajax(url,{
            data:{ids:ids},
            type:'post',
            dataType:'json',
            success:function(data){
                callback && callback(data);
            },
            error:function(e){
                error && error(e);
            }
        });
    }
    window.deleteUser = deleteUser;
}();