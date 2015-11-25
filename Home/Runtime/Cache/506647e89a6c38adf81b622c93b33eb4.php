<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="__PUBLIC__/css/ui.css">
    <link rel="stylesheet" href="__PUBLIC__/css/main.css">
    <link rel="stylesheet" href="__PUBLIC__/js/datetimepicker/jquery.datetimepicker.css">
    <script src="__PUBLIC__/js/jquery-2.1.4.min.js"></script>
    <script src="__PUBLIC__/js/datetimepicker/jquery.datetimepicker.full.min.js"></script>
    <title></title>
</head>
<body data-today="<?php echo ($vo["todayDate"]); ?>">
<div class="ui-wrap">
    <div id="header" style="display: none;">
        <header class="navigation">
            <div class="base-nav">
                <ul class="nav-ul clearfix">
                    <li class="active">
                        <a class="router j_modnav-blog" href="/blog" data-url="/blog"><i
                                class="graph graph-blog"></i><span>日报</span></a>
                    </li>
                    <li>
                        <a class="router j_modnav-workreport" href="/workreport" data-url="/workreport"><i class="graph graph-report"></i><span>计划</span></a>
                    </li>
                    <li>
                        <a class="router j_modnav-task" href="/tasks" data-url="/tasks"><i class="graph graph-task"></i><span>上线</span></a>
                    </li>
                </ul>
            </div>
        </header>
    </div>
    <div class="ui-tab">
        <ul class="ui-tab-items">
            <li class="ui-tab-item">
                <a href="index.php?c=Index&a=blog">个人</a>
            </li>
            <li class="ui-tab-item ui-tab-item-current">
                <a href="index.php?c=Index&a=blogs">组内</a>
            </li>
            <li class="ui-tab-item">
                <a href="index.php?c=Index&a=blogss">团队</a>
            </li>
        </ul>
        <div class="icon datetime"><i id="dateicon" class="iconfont" title="查看过去日期记录" onclick="var si = document.getElementById('show_inline').style; si.display = (si.display=='none')?'block':'none';return false; ">&#xF01C;</i></div>
        <div id="show_inline" style="display:none">
            <input type="text" id="datetimepicker"/>
        </div>
    </div>
    <div id="mainContainer">
        <div class="module-view module-blog-view">
            <div class="main-hd" style="display: none;">
                <ul class="toolkit-list">
                    <li class="toolkit-item"></li>
                </ul>
            </div>
            <div class="jianbao" id="jianbao">
                <div class="clearfix title" style="margin-bottom: 4px;"><div class="pull-left"><span style="color:red;" id="jb-date"></span>简报</div><div class="pull-right" style="font-size: 12px;color: #ccc;">提示：添加或删除一行或多行内容，然后鼠标移出编辑框，内容自动重新更新序号</div></div>
                <textarea data-id="<?php echo ($vo["id"]); ?>" class="form-control blog-textarea animated" rows="1" placeholder="还没有生成简报" style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 40px; width: 100%;"></textarea>
                <div class="clearfix">
                    <div class="pull-left msg animated"></div>
                    <div class="btns pull-right">
                        <a class="btn btn-large btn-success">保存</a>
                        <a class="btn btn-reset">重置</a>
                    </div>
                </div>
            </div>
            <div class="main-bd">
                <div class="table-tray scrollwrapper">
                    <div class="tray-cell main-content">
                        <div id="blogs-container" class="blog-wrapper"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
<script id="blogs-template" type="text/x-handlebars-template">
    {{#each data}}
    <div class="blog-date-container clearfix" id="blog_{{id}}">
        <div class="blog-month {{hide}}">{{create_date_no_time}}</div>
        <div class="blog-list">
            <dl class="blog-item j_blog-item">
                <dt>
                    <div class="blog-date j_blog-date {{bgColor}}">
                        <div class="day">{{username}}</div>
                    </div>
                </dt>
                <div class="blog-user-container clearfix">
                    <div class="blog j_blog">
                        <dd class="blog-box">
                            <div class="box-top">
                                <div class="blog-header hide"><p><a class="name usercard-toggle" userid="4524569149044375527">想了</a></p></div>
                                <span class="today_bg">今日</span>
                                <div class="blog-body j_blog-body">{{{today}}}</div>
                                <span class="tomorrow_bg">明日</span>
                                <div class="blog-body j_blog-body tomorrow">{{{tomorrow}}}</div>
                            </div>
                        </dd>
                    </div>
                </div>
            </dl>
        </div>
    </div>
    {{/each}}
</script>
<script src="__PUBLIC__/js/handlebars-v4.0.2.js"></script>
<script src="__PUBLIC__/js/blogs.js"></script>
</html>