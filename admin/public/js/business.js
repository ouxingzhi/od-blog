void function(){
    var baseurl = typeof __baseurl === 'undefined' ? '/' : __baseurl;
    //删除博客
    function deleteArticle(ids,callback,error){
        var url = baseurl + 'admin/blog/del';
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
}();