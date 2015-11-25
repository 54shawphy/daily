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
<body data-today="<?php echo ($todayDate); ?>">
<div class="ui-wrap">
    <div id="header" style="display: none">
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
            <li class="ui-tab-item ui-tab-item-current">
                <a href="index.php?c=Index&a=blog">个人</a>
            </li>
            <li class="ui-tab-item">
                <a href="index.php?c=Index&a=blogs">组内</a>
            </li>
            <li class="ui-tab-item">
                <a href="index.php?c=Index&a=blogss">团队</a>
            </li>
        </ul>
    </div>
    <div id="mainContainer">
        <div class="module-view module-blog-view">
            <div class="main-hd" style="display: none">
                <ul class="toolkit-list">
                    <li class="toolkit-item"></li>
                </ul>
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
    {{#each data.list}}
    <div class="blog-date-container clearfix" id="blog_{{id}}">
        <div class="blog-month {{hide}}">{{create_date_no_time}}</div>
        <div class="blog-list">
            <dl class="blog-item j_blog-item">
                <dt>
                    <div class="blog-date j_blog-date {{bgColor}}">
                        <div class="day">{{date}}</div>
                    </div>
                </dt>
                <div class="blog-user-container clearfix">
                    <div class="blog j_blog">
                        <dd class="blog-box">
                            <div class="box-top">
                                <div class="blog-header hide"><p><a class="name usercard-toggle" userid="4524569149044375527">想了</a></p></div>
                                <div class="blog-body j_blog-body">{{{today}}}</div>
                                <div class="blog-body-edit hide">
                                    <div class="blog-input"><textarea
                                            class="form-control blog-textarea animated"
                                            rows="1" placeholder="今天还做了什么?"
                                            style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 40px;"></textarea>
                                    </div>
                                    <div class="blog-edit-btns clearfix j_blog-post-btns" style="position: relative;">
                                        <div class="pull-left edit-info">提示：先直接输入内容然后回车，上一行会自动添加序号。</div>
                                        <div class="pull-right"><a
                                                class="btn btn-sm btn-success blog-body-edit-post-btn">发布 </a><a
                                                class="btn btn-sm blog-body-edit-cancel-btn">取消 </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="blog-time time">{{create_date}}</div>
                                <div class="blog-action blog-header-right"><a
                                        class="blog-add hide-im" title="补交">补交</a><a
                                        class="blog-edit graph graph-28-pencil"
                                        title="编辑"></a><!--<a
                                        class="blog-comment graph graph-28-bubble j_blogComment"
                                        title="评论" user-id="4524569149044375527" day="20151026"
                                        blog-id="4524582576011148421"></a>--></div>
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
<script src="__PUBLIC__/js/blog.js"></script>
</html>