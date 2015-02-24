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
    
    function countDown(seconds,secfn,endfn){
        if(!seconds){
            endfn && endfn();
            return;
        }
        var timer,end=false;
        function loop(){
            secfn && secfn(seconds);
            seconds--;
            if(seconds < 0){
                endfn && endfn();
                return;
            }
            timer = setTimeout(function(){
                loop();
            },1000);
        }
        loop();
    }
    window.countDown = countDown;
}()