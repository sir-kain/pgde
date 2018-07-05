/**
 * RUBY ELEMENTS JQUERY PLUGIN
 * @author          HaiBach
 * @version         1.0
 */

(function(c){window.rm01VA||(window.rm01VA={codeName:"rubymenu",codeData:"options",namespace:"rm01"},rm01VA.optsDefault={isAutoInit:!0,isOffCanvas:!0,direction:"hor",textBack:null,widthOffCanvas:[0,767],html:{caret:'<span class="{ns}caret"></span>',toggle:'<a class="{ns}btn-toggle"><span></span><span></span><span></span></a>',back:'<li class="{ns}list {ns}listback"><a class="{ns}linkback"><span class="{ns}arrowback">&lsaquo;</span></a></li>'}});c[rm01VA.codeName]=function(d,p){var b={codekey:Math.ceil(1E9*
Math.random()),ev:c("<div/>"),ns:rm01VA.namespace},g={},e={},h={addClasses:function(){var a=b.ns;d.addClass(a+"ready");!e.dirsHor&&d.addClass(a+"drawer");var a=function(a,f,c){a=a.find(h.ns(f));a.length&&a.addClass(b.ns+c);return a},f=a(d,"> .{ns}menu","menu-lv1"),n=a(f,"> li > .{ns}menu","menu-lv2"),q=a(n,"> li > .{ns}menu","menu-lv3");a(d,".{ns}menu > li","list");a(f,"> li","list-lv1");a(n,"> li","list-lv2");a(q,"> li","list-lv3");a=function(a,f){var n=a.find(h.ns("> .{ns}menu > li"));n.each(function(){var a=
c(this);a.find(h.ns(".{ns}menu")).length&&a.addClass(b.ns+f)});return n};b.$listParentLV1=a(d,"list-parent-lv1");b.$listParentLV2=a(b.$listParentLV1,"list-parent-lv2")},ns:function(a){return a.replace(/\{ns\}/g,b.ns)},stringToObject:function(a){"string"==typeof a&&(a=a.replace(/\u0027/g,'"'),a=c.parseJSON(a));return c.isPlainObject(a)?a:{}},camelCase:function(a){return a.replace(/-([a-z])/gi,function(a,b){return b.toUpperCase()})},properCase:function(a){return a.charAt(0).toUpperCase()+a.slice(1)},
matchMedia:function(a,b){if(window.matchMedia){var n="(min-width: WMINpx) and (max-width: WMAXpx)".replace("WMIN",a).replace("WMAX",b);if(window.matchMedia(n).matches)return!0}else if(n=c(window).width(),n>=a&&n<=b)return!0;return!1}},m={mergeAllOpts:function(){var a=d.data(rm01VA.codeData),a=h.stringToObject(a);g=c.extend(!0,g,rm01VA.optsDefault,p,a);d.removeAttr("data-"+rm01VA.codeData)},init:function(){e.dirsHor="hor"==g.direction;e.dirsHor||(e.drawer=!0)},cssName:function(){var a=b,f;a:{f=document.createElement("p").style;
var c=["Webkit","Moz","ms","O"],e=["-webkit-","-moz-","-ms-","-o-"],d=h.camelCase("animation-druation");if(void 0==f[d])for(var d=h.properCase(d),g=0,k=c.length;g<k;g++)if(void 0!=f[c[g]+d]){f=e[g];break a}f=""}a.prefix=f},resize:function(){c(window).width();var a=g.widthOffCanvas,f=b.ns,n=f+g.direction,q=f+"offcanvas",u=f+"drawer",f=f+"hanger";e.offCanvasLast=e.offCanvas;e.offCanvas=g.isOffCanvas;e.offCanvas&&(e.offCanvas=h.matchMedia(a[0],a[1]));a=n+(e.dirsHor?" "+f:"");q+=e.dirsHor?" "+u:"";u=
e.offCanvas?a:q;d.addClass(e.offCanvas?q:a).removeClass(u);q=b.ns+"show";e.offCanvas?b.$canvasToggle.addClass(q):b.$canvasToggle.removeClass(q);e.offCanvas?e.dirsHor&&(e.drawer=!0):(k.pushOff(),e.dirsHor&&(e.drawer=!1));e.offCanvas!=e.offCanvasLast&&k.removeOpenAll()}},l={resize:function(){var a="resize."+b.ns+b.codekey;c(window).off(a).on(a,function(){clearTimeout(b.tiResize);b.tiResize=setTimeout(function(){m.resize()},100)});m.resize()},tapOpenCanvas:function(){c("html");b.$canvasToggle.on("click."+
b.ns+b.codekey,function(){e.push?(k.pushOff(),k.removeOpenAll()):k.pushOn();return!1})},tapOnLink:function(){var a=b.ns,f="click."+a+b.codekey;b.$linkToggle.on(f,function(){var b=c(this),f=b.closest(h.ns(".{ns}list")),d=a+"open";f.length&&(e.drawer?!f.hasClass(d)&&t.drawer(b,"open"):t.hanger(b));return!1});b.$linkback.on(f,function(){var a=c(this).closest(h.ns(".{ns}menu")).siblings("a");t.drawer(a,"closed");return!1});c("html").on(f,function(b){c(b.target).closest("."+a).is(d)||e.offCanvas||e.dirsHor&&
k.removeOpenAll()})}},t={hanger:function(a){var f=a.closest(h.ns(".{ns}list")),c=a.closest(h.ns(".{ns}menu")),d=a.siblings(h.ns(".{ns}menu"));a=b.ns;var e=a+"open",g=a+"fx-open";f.hasClass(e)?k.removeOpenAll(c):(k.removeOpenAll(c),c.add(f).addClass(e),d.addClass(g),f=1E3*parseFloat(d.css(b.prefix+"animation-duration")),clearTimeout(b.tiFxHanger),b.tiFxHanger=setTimeout(function(){d.removeClass(g)},f))},drawer:function(a,c){var d=a.closest(h.ns(".{ns}list")),e=a.closest(h.ns(".{ns}menu")),g=b.ns,k=
g+"open";d.length&&function(){var p,l,r;"open"==c?(p=g+"fx-open",l=e,r=a.siblings(h.ns(".{ns}menu")).clone().addClass(b.ns+"ghost")):(p=g+"fx-closed",l=a.siblings(h.ns(".{ns}menu")),r=e.clone().removeClass(k).addClass(g+"ghost"),r.find(h.ns(".{ns}ghost")).remove(),r.find(h.ns(".{ns}open")).removeClass(g+"open"));l.after(r).add(r).addClass(p);var m=b.prefix+"animation-duration",t=parseFloat(l.css(m)),m=parseFloat(r.css(m));b.speedCur=t>m?t:m;b.speedCur*=1E3;clearTimeout(b.tiFxDrawer);b.tiFxDrawer=
setTimeout(function(){e.add(d)["open"==c?"addClass":"removeClass"](k);l.removeClass(p);r.remove()},b.speedCur)}()}},k={pushOff:function(){c("html").add(d).add(b.$canvasToggle).removeClass(b.ns+"push");e.push=!1},pushOn:function(){c("html").add(d).add(b.$canvasToggle).addClass(b.ns+"push");e.push=!0},searchOpen:function(a,c){var d=a[c](h.ns(".{ns}open"));d.length&&d.removeClass(b.ns+"open")},removeOpenAll:function(a){a||(a=d);k.searchOpen(a,"find")},removeOpenCur:function(a){k.searchOpen(a,"closest")}},
b=c.extend(b,k);c.data(d[0],rm01VA.codeName,b);m.mergeAllOpts();m.init();m.cssName();h.addClasses();(function(){b.$linkback=c();d.find(h.ns("> .{ns}menu .{ns}menu")).each(function(){var a=c(this),d=a.siblings("a"),e=g.textBack;null==e&&(e=d.length?d.html():"");var d=c(h.ns(g.html.back)),k=d.find("a");k.html(k.html()+e);a.prepend(d);b.$linkback=b.$linkback.add(k)});b.$linkToggle=d.find(h.ns(".{ns}menu .{ns}menu")).siblings("a");b.$linkToggle.append(h.ns(g.html.caret));b.$canvasToggle=c(h.ns(g.html.toggle));
d.before(b.$canvasToggle)})();l.resize();l.tapOpenCanvas();l.tapOnLink()};c.fn[rm01VA.codeName]=function(){var d=arguments,l=rm01VA.codeName,b=null;c(this).each(function(){var g=c(this),e=g.data(l);void 0==d[0]&&(d[0]={});c.isPlainObject(d[0])&&(e||new c[l](g,d[0]),b=g.data(l))});return b};var l=function(d){d.each(function(){c(this)[rm01VA.codeName]()})};c(document).ready(function(){l(c("."+rm01VA.namespace))})})(jQuery);
(function(c){var l=1E10*Math.random(),d,p,b=function(){d.on("click.rb01"+l,function(b){c("html, body").animate({scrollTop:0},300);return!1});var b="scroll.rb01"+l,e=c(window),h=!1,m=function(){300<e.scrollTop()?h||(d.addClass("rb01actived"),h=!0):h&&(d.removeClass("rb01actived"),h=!1)};c(window).on(b,function(){clearTimeout(p);p=setTimeout(m,200)})};c(document).ready(function(){var g='<a class="{ns}" alt="Top Page"><span class="{ns}first"></span><span class="{ns}last"></span></a>'.replace(/\{ns\}/g,
"rb01");c("body").append(g);d=c(".rb01");b()})})(jQuery);
