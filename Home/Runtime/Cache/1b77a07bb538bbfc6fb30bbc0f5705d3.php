<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="__PUBLIC__/css/ui.css">
    <link rel="stylesheet" href="__PUBLIC__/css/main.css">
    <link rel="stylesheet" href="__PUBLIC__/js/datetimepicker/jquery.datetimepicker.css">
    <script src="__PUBLIC__/js/jquery-2.1.4.min.js"></script>
    <script src="__PUBLIC__/js/datetimepicker/jquery.datetimepicker.full.min.js"></script>
    <title>爱钱进技术部银行战队日报 <?php echo ($todayDate); ?></title>
</head>
<body>
<div class="ui-tab" style="width: 800px;margin: 20px auto">
    <ul class="ui-tab-items">
        <li class="ui-tab-item">
            <a href="index.php?c=Index&a=blog">个人</a>
        </li>
        <li class="ui-tab-item">
            <a href="index.php?c=Index&a=blogs">组内</a>
        </li>
        <li class="ui-tab-item ui-tab-item-current">
            <a href="index.php?c=Index&a=blogss">团队</a>
        </li>
    </ul>
    <div class="icon datetime"><i class="iconfont" id="dateicon" title="查看过去日期记录" onclick="var si = document.getElementById('show_inline').style; si.display = (si.display=='none')?'block':'none';return false; ">&#xF01C;</i></div>
    <div id="show_inline" style="display:none">
		<input type="text" id="datetimepicker"/>
	</div>
</div>
<div id="mytable" style="width: 800px;margin: 0 auto;">
    <div xmlns="http://www.w3.org/1999/xhtml" style='font-size:12px'>
        <style>
            .tables {
                width: 800px;
            }

            .tables .table-con {
                background: #fff;
            }

            .table-con .title {
                text-align: center;
                line-height: 30px;
                background: #FFF2D9;
                border-top: 1px solid #ccc;
                border-left: 1px solid #ccc;
                border-right: 1px solid #ccc;
            }

            .ui-table {
                border-collapse: collapse;
                border: 1px solid #ccc;
                width: 100%;
                font-size: 12px;
                text-align: left;
            }

            .ui-table-layout-fixed {
                table-layout: fixed;
            }

            .ui-table tr:nth-child(even),
            .ui-table-split, /* 隔行换色效果 */
            .ui-table-hover /* 用作表格行hover效果 */
            {
                background-color: #FBFBFB;
            }

            .ui-table tr {
                color: #808080;
            }

            .ui-table thead tr {
                color: #666;
            }

            .ui-table thead {
                color: #666;
                background-color: #F6F6F6;
                filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#F8F8F8', endColorstr='#F2F2F2');
                background: -webkit-gradient(linear, left top, left bottom, from(#F8F8F8), to(#F2F2F2));
                background: -moz-linear-gradient(top, #F8F8F8, #F2F2F2);
                background: -o-linear-gradient(top, #F8F8F8, #F2F2F2);
                background: linear-gradient(top, #F8F8F8, #F2F2F2);
            }

            .ui-table th {
                padding: 7px 9px;
                border-bottom: 1px solid #d9d9d9;
                text-align: left;
            }

            .ui-table td {
                padding: 8px 9px 7px;
                border-bottom: 1px solid #d9d9d9;
            }

            .ui-table th {
                padding: 7px 9px;
            }

            .ui-table tfoot td {
                border-bottom: none;
            }

            /* 无边框table加上ui-table-noborder */
            .ui-table-noborder, .ui-table-noborder td, .ui-table-noborder tr, .ui-table-noborder th {
                border: none;
                outline: none;
            }

            .ui-table-noborder .ui-table-split, .ui-table-noborder .ui-table-hover {
                background-color: #f7f7f7;
            }

            /* 当table放在一个有边框的容器中时，比如ui-box，需要添加类名ui-table-inbox去掉本身的外框 */
            .ui-table-inbox {
                border: none;
                outline: none;
            }
        </style>
        <div class="tables" id="tables">
            <div class="table-con">
                <div class="title">爱钱进技术部银行战队日报 <span class="td-date"><?php echo ($todayDate); ?></span></div>
                <table class="ui-table">
                    <thead>
                    <tr>
                        <th width="120">战队组名称</th>
                        <th>今日工作</th>
                        <th>明日计划</th>
                    </tr>
                    </thead>
                    <tbody id="tbody"></tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div style="width: 800px;margin: 0 auto;">
    <canvas id="canvas"></canvas>
</div>

<script src="__PUBLIC__/js/handlebars-v4.0.2.js"></script>
<script id="blogs-template" type="text/x-handlebars-template">
    {{#each data}}
    <tr>
        <td>{{leader}}组</td>
        <td>
            {{{today}}}
        </td>
        <td>
            {{{tomorrow}}}
        </td>
    </tr>
    {{/each}}
</script>
<script>
    $.datetimepicker.setLocale('ch');
    $('#datetimepicker').datetimepicker({
	    timepicker:false,
	    inline:true,
        format:'Ymd',
        maxDate:'+1970/01/01',//today is maximum date calendar
        onChangeDateTime:function(dp,$input){
            var v = $input.val();
            location.href = '?c=Index&a=blogss&&date='+v;
        }
    });

    $('body').on('click',function(e){
        if($(e.target)[0].id != 'dateicon'){
            $('#show_inline').hide();
        }
    });

    var getParameterByName = function (name) {
        var match = RegExp('[?&]' + name + '=([^&]*)').exec(window.location.search);
        return match && decodeURIComponent(match[1].replace(/\+/g, ' '));
    };
    var date = getParameterByName('date');
    var url = '?c=Index&a=jianbaoList';
    if(date){
        url = '?c=Index&a=jianbaoList&date='+date;
    }
    $.ajax({
        url:url
    }).done(function (data) {
        if (data.status == 1) {
            $.each(data.data, function (k, v) {
                v.today = v.today.replace(/^.*$/gm, function (n) {
                    n = '<div>' + n + '</div>';
                    return n;
                });
                v.tomorrow = v.tomorrow.replace(/^.*$/gm, function (n) {
                    n = '<div>' + n + '</div>';
                    return n;
                });
                //v.today = v.today.replace(/\n/g,'<br>');
                //v.tomorrow = v.tomorrow.replace(/\n/g,'<br>');
            });
            var source = $("#blogs-template").html();
            var template = Handlebars.compile(source);
            var html = template(data);
            $('#tbody').html(html);
            var tdate = $('.td-date').text();
            var dm = tdate.match(/(\d{4})(\d{2})(\d{2})/);
            if(dm&&dm[1]&&dm[2]&&dm[3]){
                $('.td-date').html(dm[1]+'-'+dm[2]+'-'+dm[3]);
            }

            var canvas = document.getElementById("canvas");
            canvas.width = $('#tables').width();
            canvas.height = $('#tables').height();
            var ctx = canvas.getContext("2d");
            var data = "<svg xmlns='http://www.w3.org/2000/svg' width='1000' height='1000'>" +
                    "<foreignObject width='100%' height='100%'>" + $("#mytable").html() +
                    "</foreignObject>" +
                    "</svg>";
            var DOMURL = self.URL || self.webkitURL || self;
            var img = new Image();
            var svg = new Blob([data], {
                type: "image/svg+xml;charset=utf-8"
            });
            var url = DOMURL.createObjectURL(svg);
            img.onload = function () {
                ctx.drawImage(img, 0, 0);
                DOMURL.revokeObjectURL(url);
            };
            img.src = url;
            $('#tables').hide();
            $('body').css('visibility', 'visible');
        }
    });
</script>
</body>
</html>