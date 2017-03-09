<?php

$editor_config = array(
	/* 前后端通信相关的配置,注释只允许使用多行方式 */

    /* 上传图片配置项 */
    "imageActionName"=> "uploadimage", /* 执行上传图片的action名称 */
    "imageFieldName"=> "upfile", /* 提交的图片表单名称 */
    "imageMaxSize"=> 2048000, /* 上传大小限制，单位B */
    "imageAllowFiles"=> array(".png", ".jpg", ".jpeg", ".gif", ".bmp"), /* 上传图片格式显示 */
    "imageCompressEnable"=> true, /* 是否压缩图片,默认是true */
    "imageCompressBorder"=> 1600, /* 图片压缩最长边限制 */
    "imageInsertAlign"=> "none", /* 插入的图片浮动方式 */
    "imageUrlPrefix"=> "", /* 图片访问路径前缀 */
    "localSavePathPrefix" =>ROOT_PATH,
    "imagePathFormat"=> "/res/upfile", /* 上传保存路径,可以自定义保存路径和文件名格式 */
                                /* {filename} 会替换成原文件名,配置这项需要注意中文乱码问题 */
                                /* {rand:6} 会替换成随机数,后面的数字是随机数的位数 */
                                /* {time} 会替换成时间戳 */
                                /* {yyyy} 会替换成四位年份 */
                                /* {yy} 会替换成两位年份 */
                                /* {mm} 会替换成两位月份 */
                                /* {dd} 会替换成两位日期 */
                                /* {hh} 会替换成两位小时 */
                                /* {ii} 会替换成两位分钟 */
                                /* {ss} 会替换成两位秒 */
                                /* 非法字符 \ => * ? " < > | */
                                /* 具请体看线上文档=> fex.baidu.com/ueditor/#use-format_upload_filename */

    /* 上传文件配置 */
    "fileActionName"=> "uploadfile", /* controller里,执行上传视频的action名称 */
    "fileFieldName"=> "upfile", /* 提交的文件表单名称 */
    "filePathFormat"=> ROOT_PATH."/res/upfile", /* 上传保存路径,可以自定义保存路径和文件名格式 */
    "fileUrlPrefix"=> "", /* 文件访问路径前缀 */
    "fileMaxSize"=> 51200000, /* 上传大小限制，单位B，默认50MB */
    "fileAllowFiles"=> array(
        ".png", ".jpg", ".jpeg", ".gif", ".bmp"
    ), /* 上传文件格式显示 */
);

return array (
	'editor_config'	=> $editor_config
);
