!function(i){var n={};function r(t){if(n[t])return n[t].exports;var e=n[t]={i:t,l:!1,exports:{}};return i[t].call(e.exports,e,e.exports,r),e.l=!0,e.exports}r.m=i,r.c=n,r.d=function(t,e,i){r.o(t,e)||Object.defineProperty(t,e,{enumerable:!0,get:i})},r.r=function(t){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(t,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(t,"__esModule",{value:!0})},r.t=function(e,t){if(1&t&&(e=r(e)),8&t)return e;if(4&t&&"object"==typeof e&&e&&e.__esModule)return e;var i=Object.create(null);if(r.r(i),Object.defineProperty(i,"default",{enumerable:!0,value:e}),2&t&&"string"!=typeof e)for(var n in e)r.d(i,n,function(t){return e[t]}.bind(null,n));return i},r.n=function(t){var e=t&&t.__esModule?function(){return t.default}:function(){return t};return r.d(e,"a",e),e},r.o=function(t,e){return Object.prototype.hasOwnProperty.call(t,e)},r.p="/asset//",r(r.s=319)}({319:function(t,e,i){!function(t){i(320),window.api.timeago=function(){t(function(){t.timeago.settings.allowFuture=!0,t("[datetime]").timeago()})},window.api.timeago()}.call(this,i(6))},320:function(t,e,i){var n=[i(6)];void 0===(i="function"==typeof(i=function(f){f.timeago=function(t){return t instanceof Date?a(t):a("string"==typeof t?f.timeago.parse(t):"number"==typeof t?new Date(t):f.timeago.datetime(t))};var n=f.timeago;f.extend(f.timeago,{settings:{refreshMillis:6e4,allowPast:!0,allowFuture:!1,localeTitle:!1,cutoff:0,autoDispose:!0,strings:{prefixAgo:null,prefixFromNow:null,suffixAgo:"前",suffixFromNow:"from now",inPast:"any moment now",seconds:"少于1分钟",minute:"大约1分钟",minutes:"%d分钟",hour:"大约1小时",hours:"大约%d小时",day:"1天",days:"%d天",month:"大约1个月",months:"%d个月",year:"大约1年",years:"%d年",wordSeparator:" ",numbers:[]}},inWords:function(i){if(!this.settings.allowPast&&!this.settings.allowFuture)throw"timeago allowPast and allowFuture settings can not both be set to false.";var n=this.settings.strings,t=n.prefixAgo,e=n.suffixAgo;if(this.settings.allowFuture&&i<0&&(t=n.prefixFromNow,e=n.suffixFromNow),!this.settings.allowPast&&0<=i)return this.settings.strings.inPast;var r=Math.abs(i)/1e3,a=r/60,o=a/60,s=o/24,u=s/365;function l(t,e){t=f.isFunction(t)?t(e,i):t,e=n.numbers&&n.numbers[e]||e;return t.replace(/%d/i,e)}s=r<45&&l(n.seconds,Math.round(r))||r<90&&l(n.minute,1)||a<45&&l(n.minutes,Math.round(a))||a<90&&l(n.hour,1)||o<24&&l(n.hours,Math.round(o))||o<42&&l(n.day,1)||s<30&&l(n.days,Math.round(s))||s<45&&l(n.month,1)||s<365&&l(n.months,Math.round(s/30))||u<1.5&&l(n.year,1)||l(n.years,Math.round(u)),u=n.wordSeparator||"";return void 0===n.wordSeparator&&(u=" "),f.trim([t,s,e].join(u))},parse:function(t){t=(t=(t=(t=(t=(t=f.trim(t)).replace(/\.\d+/,"")).replace(/-/,"/").replace(/-/,"/")).replace(/T/," ").replace(/Z/," UTC")).replace(/([\+\-]\d\d)\:?(\d\d)/," $1$2")).replace(/([\+\-]\d\d)$/," $100");return new Date(t)},datetime:function(t){t=n.isTime(t)?f(t).attr("datetime"):f(t).attr("title");return n.parse(t)},isTime:function(t){return"time"===f(t).get(0).tagName.toLowerCase()}});var r={init:function(){var t=f.proxy(i,this);t();var e=n.settings;0<e.refreshMillis&&(this._timeagoInterval=setInterval(t,e.refreshMillis))},update:function(t){t=t instanceof Date?t:n.parse(t);f(this).data("timeago",{datetime:t}),n.settings.localeTitle&&f(this).attr("title",t.toLocaleString()),i.apply(this)},updateFromDOM:function(){f(this).data("timeago",{datetime:n.parse(n.isTime(this)?f(this).attr("datetime"):f(this).attr("title"))}),i.apply(this)},dispose:function(){this._timeagoInterval&&(window.clearInterval(this._timeagoInterval),this._timeagoInterval=null)}};function i(){var t=n.settings;if(t.autoDispose&&!f.contains(document.documentElement,this))return f(this).timeago("dispose"),this;var e,i,e=((e=f(e=this)).data("timeago")||(e.data("timeago",{datetime:n.datetime(e)}),i=f.trim(e.text()),n.settings.localeTitle?e.attr("title",e.data("timeago").datetime.toLocaleString()):!(0<i.length)||n.isTime(e)&&e.attr("title")||e.attr("title",i)),e.data("timeago"));return isNaN(e.datetime)||(0==t.cutoff||Math.abs(o(e.datetime))<t.cutoff?f(this).text(a(e.datetime)):0<f(this).attr("title").length&&f(this).text(f(this).attr("title"))),this}function a(t){return n.inWords(o(t))}function o(t){return(new Date).getTime()-t.getTime()}f.fn.timeago=function(t,e){var i=t?r[t]:r.init;if(!i)throw new Error("Unknown function name '"+t+"' for timeago");return this.each(function(){i.call(this,e)}),this},document.createElement("abbr"),document.createElement("time")})?i.apply(e,n):i)||(t.exports=i)},6:function(t,e){t.exports=window.$}});