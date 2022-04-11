<?php if(!defined('IN_CMS')) exit;?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="renderer" content="webkit">
<title>插件管理</title>
<link rel="stylesheet" href="{WEB_ROOT}public/css/ui.css">
<link rel="stylesheet" href="{WEB_ROOT}public/admin/css/layout.css">
<script src="{WEB_ROOT}public/js/jquery.js"></script>
<script src="{WEB_ROOT}public/js/ui.js"></script>
</head>

<body>
    <div class="position">当前位置：模板插件 > <a href="{U('index')}">插件管理</a></div>
    <div class="borders">
        <!---->
        <div class="ui-tabs ui-tabs-white" data-href="1">
            <ul class="ui-tabs-nav">
              <li><a href="{U('index','type=0')}">本地插件</a></li>
			  <li class="active"><a href="{U('index','type=1')}">插件市场</a></li>
            </ul>
            <div class="ui-tabs-content">
                <div class="ui-tabs-pane active">
                    <!--loop-->
                    <div class="ui-table-wrap">
                    <table class="ui-table ui-table-border ui-table-hover ui-table-striped">
						<thead class="ui-thead-gray">
							<tr>
								<th>插件名称</th>
								<th width="120">作者</th>
								<th width="120">当前版本</th>
								<th width="120">最新版本</th>
								<th width="120">插件价格</th>
								<th width="120">系统授权</th>
								<th width="120">状态</th>
								<th width="120">管理</th>
							</tr>
						</thead>
						<tbody>
						{if count($folder)==0}
						<tr>
							<td colspan="10">暂无插件</td>
						</tr>
						{/if}
						{foreach $folder as $key=>$val}
						{php $name=$val['app'];}
						<tr>
							<td class="ui-text-left">{$val['title']}</td>
							<td><a href="{$val['url']}" target="_blank">{$val['author']}</a></td>
							<td>{$val['version']}</td>
							<td>{$val['lastversion']}</td>
							<td>{if $val['price']<=0}免费{else}<span class="ui-text-red">{$val['price']}</span> <em>元</em>{/if}</td>
							<td>{if $val['isvip']==0}<em>不需要</em>{else}需要{/if}</td>
							<td>{if $val['isstall']==1}已安装{else}<em>未安装</em>{/if}</td>
							<td class="ui-text-right">{if $val['isstall']==1 && versiontonum($val['lastversion'])>versiontonum($val['version'])}<a href="javascript:;" class="install" data-url="{U('install','type='.$type.'&name='.$name.'&id='.$val['id'].'&way=1')}" data-price="{$val['price']}"  data-isvip="{$val['isvip']}">更新</a>　{/if}{if $val['isstall']==1}{if $val['admin']}<a href="{U("plug/".$name."/admin")}">管理</a>　{/if}<a href="javascript:;" class="delete" data-url="{U('del','name='.$name.'')}">卸载</a>{else}<a href="javascript:;" class="install" data-url="{U('install','type='.$type.'&name='.$name.'&id='.$val['id'].'')}" data-price="{$val['price']}"  data-isvip="{$val['isvip']}">安装</a>{/if}</td>
						</tr>
						{/foreach}
						</tbody>
					</table>
                    </div>
                    <!--loop-->
                </div>
            </div>
        </div>
        
        <!---->
    </div>
    
<script>
$(function()
{
	$(".install").click(function()
	{
		var url=$(this).data("url");
		var price=$(this).data("price");
		var isvip=$(this).data("isvip");
		var html='';
		if(price>0)
		{
			html+='<div class="ui-height-40">此插件需要支付<span class="ui-text-red ui-ml-sm ui-mr-sm">'+price+'</span>元后才能下载（<span class="ui-text-red ui-ml-sm ui-mr-sm">不重复扣费</span>）</div>';
		}
		if(isvip>0)
		{
			html+='<div class="ui-height-40"><span class="ui-text-red">提示：</span>此插件需要系统<code>授权</code>后才能使用</div>';
		}
		$.dialog(
		{
			title:"操作提示",
			text:"确定要安装此插件？"+html,
			oktheme:'ui-btn-info',
			ok:function(e)
			{
				sdcms.loading('正在安装，请稍等');
				$.ajax(
				{
					url:url,
					type:'post',
					dataType:'json',
					data:'token={$token}',
					error:function(e){alert(e.responseText);},
					success:function(d)
					{
						e.close();
						if(d.state=='success')
						{
							sdcms.success(d.msg);
							setTimeout(function(){location.href='{THIS_LOCAL}';},3000);
						}
						else
						{
							sdcms.error(d.msg);
						}
					}
				});
			}
		});
    });
	$(".delete").click(function()
	{
		var url=$(this).data("url");
		$.dialog(
		{
			title:"操作提示",
			text:"确定要卸载此插件？",
			oktheme:'ui-btn-info',
			ok:function(e)
			{
				$.ajax(
				{
					url:url,
					type:'post',
					dataType:'json',
					data:'token={$token}',
					error:function(e){alert(e.responseText);},
					success:function(d)
					{
						e.close();
						if(d.state=='success')
						{
							sdcms.success(d.msg);
							setTimeout(function(){location.href='{THIS_LOCAL}';},3000);
						}
						else
						{
							sdcms.error(d.msg);
						}
					}
				});
			}
		});
    });
})
</script>
</body>
</html>