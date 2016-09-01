/**
 * Home
 * @auth taozywu
 * @date 2016/08/19
 */
var Home = new Object();

Home = {
    
    getTest:function(pid) {
        jQuery.ajax({
            type: "POST",
            dataType: "json",
            url: "/?c=Home&a=ajaxGetTest",
            data: {
                pid: pid,
                j: 1,
                tt: Math.random()
            },
            success: function(resp) {
                $("#cid").html(resp.data.html);
            }
        });
    },

    
}
