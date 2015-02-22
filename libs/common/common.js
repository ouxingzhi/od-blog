void function(){
    function toast(content,okfn,cancelfn){
        var d = dialog({
            title: '提示',
            content: content,
            okValue: '确定',
            ok: function () {
                okfn && okfn();
                this.close().remove();
            },
            cancelValue: '取消',
            cancel: function () {
                cancelfn && cancelfn();
                this.close().remove();
            }
        });
        d.showModal();
    }
    window.toast = toast;
}()