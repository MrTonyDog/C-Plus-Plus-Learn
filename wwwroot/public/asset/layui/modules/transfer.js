layui.define(["laytpl","form"],function(e){"use strict";function a(e){return['<div class="layui-transfer-box" data-index="'+(e=e||{}).index+'">','<div class="layui-transfer-header">','<input type="checkbox" name="'+e.checkAllName+'" lay-filter="layTransferCheckbox" lay-type="all" lay-skin="primary" title="{{ d.data.title['+e.index+"] || 'list"+(e.index+1)+"' }}\">","</div>","{{# if(d.data.showSearch){ }}",'<div class="layui-transfer-search">','<i class="layui-icon layui-icon-search"></i>','<input type="input" class="layui-input" placeholder="关键词搜索">',"</div>","{{# } }}",'<ul class="layui-transfer-data"></ul>',"</div>"].join("")}function t(e){var a=this;a.index=++r.index,a.config=d.extend({},a.config,r.config,e),a.render()}var d=layui.$,n=layui.laytpl,i=layui.form,l="transfer",r={config:{},index:layui[l]?layui[l].index+1e4:0,set:function(e){var a=this;return a.config=d.extend({},a.config,e),a},on:function(e,a){return layui.onevent.call(this,l,e,a)}},c=function(){var a=this,e=a.config,t=e.id||a.index;return c.that[t]=a,{config:c.config[t]=e,reload:function(e){a.reload.call(a,e)},getData:function(){return a.getData.call(a)}}},s="layui-hide",h="layui-btn-disabled",o="layui-none",u="layui-transfer-box",f="layui-transfer-header",y="layui-transfer-search",p="layui-transfer-data",v=['<div class="layui-transfer layui-form layui-border-box" lay-filter="LAY-transfer-{{ d.index }}">',a({index:0,checkAllName:"layTransferLeftCheckAll"}),'<div class="layui-transfer-active">','<button type="button" class="layui-btn layui-btn-sm layui-btn-primary layui-btn-disabled" data-index="0">','<i class="layui-icon layui-icon-next"></i>',"</button>",'<button type="button" class="layui-btn layui-btn-sm layui-btn-primary layui-btn-disabled" data-index="1">','<i class="layui-icon layui-icon-prev"></i>',"</button>","</div>",a({index:1,checkAllName:"layTransferRightCheckAll"}),"</div>"].join("");t.prototype.config={title:["列表一","列表二"],width:200,height:360,data:[],value:[],showSearch:!1,id:"",text:{none:"无数据",searchNone:"无匹配数据"}},t.prototype.reload=function(e){var a=this;a.config=d.extend({},a.config,e),a.render()},t.prototype.render=function(){var e=this,a=e.config,t=e.elem=d(n(v).render({data:a,index:e.index})),i=a.elem=d(a.elem);i[0]&&(a.data=a.data||[],a.value=a.value||[],e.key=a.id||e.index,i.html(e.elem),e.layBox=e.elem.find("."+u),e.layHeader=e.elem.find("."+f),e.laySearch=e.elem.find("."+y),e.layData=t.find("."+p),e.layBtn=t.find(".layui-transfer-active .layui-btn"),e.layBox.css({width:a.width,height:a.height}),e.layData.css({height:a.height-e.layHeader.outerHeight()-e.laySearch.outerHeight()-2}),e.renderData(),e.events())},t.prototype.renderData=function(){var e=this,i=(e.config,[{checkName:"layTransferLeftCheck",views:[]},{checkName:"layTransferRightCheck",views:[]}]);e.parseData(function(e){var a=e.selected?1:0,t=["<li>",'<input type="checkbox" name="'+i[a].checkName+'" lay-skin="primary" lay-filter="layTransferCheckbox" title="'+e.title+'"'+(e.disabled?" disabled":"")+(e.checked?" checked":"")+' value="'+e.value+'">',"</li>"].join("");i[a].views.push(t),delete e.selected}),e.layData.eq(0).html(i[0].views.join("")),e.layData.eq(1).html(i[1].views.join("")),e.renderCheckBtn()},t.prototype.renderForm=function(e){i.render(e,"LAY-transfer-"+this.index)},t.prototype.renderCheckBtn=function(r){var c=this,o=c.config;r=r||{},c.layBox.each(function(e){var a=d(this),t=a.find("."+p),i=a.find("."+f).find('input[type="checkbox"]'),a=t.find('input[type="checkbox"]'),n=0,l=!1;a.each(function(){var e=d(this).data("hide");(this.checked||this.disabled||e)&&n++,this.checked&&!e&&(l=!0)}),i.prop("checked",l&&n===a.length),c.layBtn.eq(e)[l?"removeClass":"addClass"](h),r.stopNone||(e=t.children("li:not(."+s+")").length,c.noneView(t,e?"":o.text.none))}),c.renderForm("checkbox")},t.prototype.noneView=function(e,a){var t=d('<p class="layui-none">'+(a||"")+"</p>");e.find("."+o)[0]&&e.find("."+o).remove(),a.replace(/\s/g,"")&&e.append(t)},t.prototype.setValue=function(){var e=this.config,a=[];return this.layBox.eq(1).find("."+p+' input[type="checkbox"]').each(function(){d(this).data("hide")||a.push(this.value)}),e.value=a,this},t.prototype.parseData=function(a){var i=this.config,n=[];return layui.each(i.data,function(e,t){t=("function"==typeof i.parseData?i.parseData(t):t)||t,n.push(t=d.extend({},t)),layui.each(i.value,function(e,a){a==t.value&&(t.selected=!0)}),a&&a(t)}),i.data=n,this},t.prototype.getData=function(e){var a=this.config,i=[];return this.setValue(),layui.each(e||a.value,function(e,t){layui.each(a.data,function(e,a){delete a.selected,t==a.value&&i.push(a)})}),i},t.prototype.events=function(){var l=this,t=l.config;l.elem.on("click",'input[lay-filter="layTransferCheckbox"]+',function(){var e=d(this).prev(),a=e[0].checked,t=e.parents("."+u).eq(0).find("."+p);e[0].disabled||("all"===e.attr("lay-type")&&t.find('input[type="checkbox"]').each(function(){this.disabled||(this.checked=a)}),l.renderCheckBtn({stopNone:!0}))}),l.layBtn.on("click",function(){var e=d(this),a=e.data("index"),i=l.layBox.eq(a),n=[];e.hasClass(h)||(l.layBox.eq(a).each(function(e){d(this).find("."+p).children("li").each(function(){var e=d(this),a=e.find('input[type="checkbox"]'),t=a.data("hide");a[0].checked&&!t&&(a[0].checked=!1,i.siblings("."+u).find("."+p).append(e.clone()),e.remove(),n.push(a[0].value)),l.setValue()})}),l.renderCheckBtn(),""===(e=i.siblings("."+u).find("."+y+" input")).val()||e.trigger("keyup"),t.onchange&&t.onchange(l.getData(n),a))}),l.laySearch.find("input").on("keyup",function(){var i=this.value,e=d(this).parents("."+y).eq(0).siblings("."+p),a=e.children("li");a.each(function(){var e=d(this),a=e.find('input[type="checkbox"]'),t=-1!==a[0].title.indexOf(i);e[t?"removeClass":"addClass"](s),a.data("hide",!t)}),l.renderCheckBtn();a=a.length===e.children("li."+s).length;l.noneView(e,a?t.text.searchNone:"")})},c.that={},c.config={},r.reload=function(e,a){e=c.that[e];return e.reload(a),c.call(e)},r.getData=function(e){return c.that[e].getData()},r.render=function(e){e=new t(e);return c.call(e)},e(l,r)});