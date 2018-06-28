<?php
/**
 *
 * <b>dataLoading.blade.php</b></br>
 * <pre>loading 模块</pre>
 *
 * @author xqyjjq  walk_code@163.com
 * @date 2018/6/28 13:59
 *
 */
?>
<div id="loading" style="display:none;">
    <div class="myDataloadingCover"><i class="fa fa-refresh fa-spin"></i></div>
    <div class="myDataloading" >服务器正在拼命加载中 ...</div>
</div>
<script>
    (function (root, factory) {
        if (typeof define === 'function' && define.amd) {
            // AMD
            define(['jquery', 'underscore'], factory);
        } else if (typeof exports === 'object') {
            // Node, CommonJS之类的
            module.exports = factory(require('jquery'), require('underscore'));
        } else {
            // 浏览器全局变量(root 即 window)
            root.dataLoading = factory(root.jQuery, root._);
        }
    }(this, function ($, _) {
        function showLoading(){
            $("#loading").show();
        }; // 私有方法，因为它没被返回 (见下面)
        function hideLoading(){
            $("#loading").hide();
        }; // 公共方法，因为被返回了
        return {
            showLoading: showLoading,
            hideLoading: hideLoading
        }
    }));

    function showLoading(){
        $("#loading").show();
    }
    function hideLoading(){
        $("#loading").hide();
    }
</script>

