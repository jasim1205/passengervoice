// JavaScript Document

jQuery(function(){
		jQuery('#ticker').tickerme();
	});
	
	
	
	// js code for news ticker
	
(function(e){e.fn.tickerme=function(t){var n=e.extend({},e.fn.tickerme.defaults,t);return this.each(function(){function a(){e(t).hide();e("body").prepend(r).prepend(i);var n='<div id="ticker_container">';n+='<div id="newscontent"><div id="news"></div></div>';n+='<div id="controls">';n+='<a href="#" id="pause_trigger"></a>';n+="</div>";n+="</div>";e(n).insertAfter(t);e(t).children().each(function(t){s[t]=e(this).html()});f()}function f(){if(o==s.length-1){o=0}else{o++}if(n.type=="fade"){e("#news").fadeOut(n.fade_speed,function(){e("#newscontent").html('<div id="news">'+s[o]+"</div>");e("#news").fadeIn(n.fade_speed)})}u=setTimeout(f,n.duration)}var t=e(this);var r='<svg display="none" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="224" height="32" viewBox="0 0 224 32"><defs><g id="icon-play"><path class="path1" d="M6 4l20 12-20 12z"></path></g><g id="icon-pause"><path class="path1" d="M4 4h10v24h-10zM18 4h10v24h-10z"></path></g><g id="icon-prev"><path class="path1" d="M18 5v10l10-10v22l-10-10v10l-11-11z"></path></g><g id="icon-next"><path class="path1" d="M16 27v-10l-10 10v-22l10 10v-10l11 11z"></path></g></defs></svg>';var i='<style type="text/css">#ticker_container{width:100%}#newscontent{float:left}#news{display:none}#controls{float:right;height:16px}.icon{display:inline-block;width:16px;height:16px;fill:'+n.control_colour+"}.icon:hover{fill:"+n.control_rollover+"}</style>";var s=[];var o=-1;var u;a();e("a#pause_trigger").click(function(){clearTimeout(u);e(this).hide();e("#play_trigger").show();return false});e("a#play_trigger").click(function(){f();e(this).hide();e("#pause_trigger").show();return false});e("a#prev_trigger").click(function(){if(o==0){o=s.length-1}else{o--}e("#newscontent").html('<div id="news" style="display:block">'+s[o]+"</div>");if(n.auto_stop)e("a#pause_trigger").trigger("click");return false});e("a#next_trigger").click(function(){if(o==s.length-1){o=0}else{o++}e("#newscontent").html('<div id="news" style="display:block">'+s[o]+"</div>");if(n.auto_stop)e("a#pause_trigger").trigger("click");return false})})};e.fn.tickerme.defaults={fade_speed:500,duration:3e3,auto_stop:true,type:"fade",control_colour:"#333333",control_rollover:"#666666"}})(jQuery)


 $(document).ready(function() {

$('.ticker').ticker();

});

(function(l){function B(c){for(var a=c.length-1;0<a;a--){var v=Math.floor(Math.random()*(a+1)),b=c[a];c[a]=c[v];c[v]=b}return c}function w(c,a){a=a||[];return c.replace(/\x3c!--.*?--\x3e/img,"").replace(/<\/?([a-z][a-z0-9]*)\b[^>]*>/img,function(c,b){return-1!==a.indexOf(b.toLowerCase())?c:""})}l.fn.ticker=function(c){var a=l.extend({},l.fn.ticker.defaults,c);return this.each(function(){function c(){t=!0;x?(x=!1,b()):y=setTimeout(function(){a.pauseOnHover&&d.hasClass("hover")?(clearTimeout(h),c()):b()},a.itemSpeed)}function b(){t?(t=!1,z()):a.finishOnHover&&a.pauseOnHover&&d.hasClass("hover")&&e<=k[f].length?(p.html(u()),e+=1,b()):h=setTimeout(function(){a.pauseOnHover&&d.hasClass("hover")?(clearTimeout(h),b()):(z(),e>k[f].length&&(f+=1,e=0,f==k.length&&(f=0),clearTimeout(h),clearTimeout(y),c()))},a.cursorSpeed)}function z(){0===e&&a.fade?(clearTimeout(h),p.fadeOut(a.fadeOutSpeed,function(){p.html(u());p.fadeIn(a.fadeInSpeed,function(){e+=1;b()})})):(p.html(u()),e+=1,clearTimeout(h),b())}function u(){var c,b,q,m;switch(e%2){case 1:c=a.cursorOne;break;case 0:c=a.cursorTwo}e>=k[f].length&&(c="");var n="",d=[];for(b=0;b<e;b++){m=null;for(q=0;q<r[f].length;q++)if(r[f][q]&&r[f][q].start===b){m=r[f][q];break}m&&(n+=m.tag,m.selfClosing||("/"===m.tag.charAt(1)?d.pop():d.push(m.name)));n+=k[f][b]}for(b=0;b<d.length;b++)n+="</"+d[b]+">";return n+c}var d=l(this),p,C=d.find("li"),k=[],r={},y,h,f=0,e=0,x=!0,t=!0,D="a b strong span i em u".split(" ");if(a.finishOnHover||a.pauseOnHover)d.removeClass("hover"),d.hover(function(){l(this).toggleClass("hover")});var s,A;C.each(function(a,c){var b=s=w(l(this).html(),D),d;d=[];for(var e=/<\/?([a-z][a-z0-9]*)\b[^>]*>/im,f=/\/\s{0,}>$/m,h=[],g;null!==(g=e.exec(b));)if(0===d.length||-1!==d.indexOf(g[1]))g={tag:g[0],name:g[1],selfClosing:f.test(g[0]),start:g.index,end:g.index+g[0].length-1},h.push(g),b=b.slice(0,g.start)+b.slice(g.end+1),e.lastIndex=0;A=h;s=w(s);k.push(s);r[k.length-1]=A});a.random&&B(k);d.find("ul").after("<div></div>").remove();p=d.find("div");c()})};l.fn.ticker.defaults={random:!1,itemSpeed:3E3,cursorSpeed:50,pauseOnHover:!0,finishOnHover:!0,cursorOne:"_",cursorTwo:"-",fade:!0,fadeInSpeed:600,fadeOutSpeed:300}})(jQuery);




 $(document).ready(function(){
 $(function () {
  $.scrollUp({
         scrollName: 'scrollUp', // Element ID
         scrollDistance: 300, // Distance from top/bottom before showing element (px)
         scrollFrom: 'top', // 'top' or 'bottom'
         scrollSpeed: 300, // Speed back to top (ms)
         easingType: 'linear', // Scroll to top easing (see http://easings.net/)
         animation: 'fade', // Fade, slide, none
         animationSpeed: 200, // Animation in speed (ms)
         scrollTrigger: false, // Set a custom triggering element. Can be an HTML string or jQuery object
     //scrollTarget: false, // Set a custom target element for scrolling to the top
         scrollText: '<i class="fa fa-angle-up"></i>', // Text for element, can contain HTML
         scrollTitle: false, // Set a custom <a> title if required.
         scrollImg: false, // Set true to use image
         activeOverlay: false, // Set CSS color to display scrollUp active point, e.g '#00FFFF'
         zIndex: 2147483647 // Z-Index for the overlay
  });
 });
});
 