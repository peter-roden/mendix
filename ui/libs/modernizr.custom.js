/*! modernizr 3.4.0 (Custom Build) | MIT *
 * https://modernizr.com/download/?-flexbox-flexboxlegacy-touchevents-setclasses !*/
!function(e,n,t){function r(e,n){return typeof e===n}function o(){var e,n,t,o,s,i,l;for(var a in x)if(x.hasOwnProperty(a)){if(e=[],n=x[a],n.name&&(e.push(n.name.toLowerCase()),n.options&&n.options.aliases&&n.options.aliases.length))for(t=0;t<n.options.aliases.length;t++)e.push(n.options.aliases[t].toLowerCase());for(o=r(n.fn,"function")?n.fn():n.fn,s=0;s<e.length;s++)i=e[s],l=i.split("."),1===l.length?Modernizr[l[0]]=o:(!Modernizr[l[0]]||Modernizr[l[0]]instanceof Boolean||(Modernizr[l[0]]=new Boolean(Modernizr[l[0]])),Modernizr[l[0]][l[1]]=o),C.push((o?"":"no-")+l.join("-"))}}function s(e){var n=w.className,t=Modernizr._config.classPrefix||"";if(_&&(n=n.baseVal),Modernizr._config.enableJSClass){var r=new RegExp("(^|\\s)"+t+"no-js(\\s|$)");n=n.replace(r,"$1"+t+"js$2")}Modernizr._config.enableClasses&&(n+=" "+t+e.join(" "+t),_?w.className.baseVal=n:w.className=n)}function i(){return"function"!=typeof n.createElement?n.createElement(arguments[0]):_?n.createElementNS.call(n,"http://www.w3.org/2000/svg",arguments[0]):n.createElement.apply(n,arguments)}function l(){var e=n.body;return e||(e=i(_?"svg":"body"),e.fake=!0),e}function a(e,t,r,o){var s,a,u,f,c="modernizr",d=i("div"),p=l();if(parseInt(r,10))for(;r--;)u=i("div"),u.id=o?o[r]:c+(r+1),d.appendChild(u);return s=i("style"),s.type="text/css",s.id="s"+c,(p.fake?p:d).appendChild(s),p.appendChild(d),s.styleSheet?s.styleSheet.cssText=e:s.appendChild(n.createTextNode(e)),d.id=c,p.fake&&(p.style.background="",p.style.overflow="hidden",f=w.style.overflow,w.style.overflow="hidden",w.appendChild(p)),a=t(d,e),p.fake?(p.parentNode.removeChild(p),w.style.overflow=f,w.offsetHeight):d.parentNode.removeChild(d),!!a}function u(e,n){return!!~(""+e).indexOf(n)}function f(e,n){return function(){return e.apply(n,arguments)}}function c(e,n,t){var o;for(var s in e)if(e[s]in n)return t===!1?e[s]:(o=n[e[s]],r(o,"function")?f(o,t||n):o);return!1}function d(e){return e.replace(/([a-z])-([a-z])/g,function(e,n,t){return n+t.toUpperCase()}).replace(/^-/,"")}function p(e){return e.replace(/([A-Z])/g,function(e,n){return"-"+n.toLowerCase()}).replace(/^ms-/,"-ms-")}function m(n,t,r){var o;if("getComputedStyle"in e){o=getComputedStyle.call(e,n,t);var s=e.console;if(null!==o)r&&(o=o.getPropertyValue(r));else if(s){var i=s.error?"error":"log";s[i].call(s,"getComputedStyle returning null, its possible modernizr test results are inaccurate")}}else o=!t&&n.currentStyle&&n.currentStyle[r];return o}function v(n,r){var o=n.length;if("CSS"in e&&"supports"in e.CSS){for(;o--;)if(e.CSS.supports(p(n[o]),r))return!0;return!1}if("CSSSupportsRule"in e){for(var s=[];o--;)s.push("("+p(n[o])+":"+r+")");return s=s.join(" or "),a("@supports ("+s+") { #modernizr { position: absolute; } }",function(e){return"absolute"==m(e,null,"position")})}return t}function h(e,n,o,s){function l(){f&&(delete N.style,delete N.modElem)}if(s=r(s,"undefined")?!1:s,!r(o,"undefined")){var a=v(e,o);if(!r(a,"undefined"))return a}for(var f,c,p,m,h,y=["modernizr","tspan","samp"];!N.style&&y.length;)f=!0,N.modElem=i(y.shift()),N.style=N.modElem.style;for(p=e.length,c=0;p>c;c++)if(m=e[c],h=N.style[m],u(m,"-")&&(m=d(m)),N.style[m]!==t){if(s||r(o,"undefined"))return l(),"pfx"==n?m:!0;try{N.style[m]=o}catch(g){}if(N.style[m]!=h)return l(),"pfx"==n?m:!0}return l(),!1}function y(e,n,t,o,s){var i=e.charAt(0).toUpperCase()+e.slice(1),l=(e+" "+P.join(i+" ")+i).split(" ");return r(n,"string")||r(n,"undefined")?h(l,n,o,s):(l=(e+" "+E.join(i+" ")+i).split(" "),c(l,n,t))}function g(e,n,r){return y(e,t,t,n,r)}var C=[],x=[],S={_version:"3.4.0",_config:{classPrefix:"",enableClasses:!0,enableJSClass:!0,usePrefixes:!0},_q:[],on:function(e,n){var t=this;setTimeout(function(){n(t[e])},0)},addTest:function(e,n,t){x.push({name:e,fn:n,options:t})},addAsyncTest:function(e){x.push({name:null,fn:e})}},Modernizr=function(){};Modernizr.prototype=S,Modernizr=new Modernizr;var w=n.documentElement,_="svg"===w.nodeName.toLowerCase(),b=S._config.usePrefixes?" -webkit- -moz- -o- -ms- ".split(" "):["",""];S._prefixes=b;var z=S.testStyles=a;Modernizr.addTest("touchevents",function(){var t;if("ontouchstart"in e||e.DocumentTouch&&n instanceof DocumentTouch)t=!0;else{var r=["@media (",b.join("touch-enabled),("),"heartz",")","{#modernizr{top:9px;position:absolute}}"].join("");z(r,function(e){t=9===e.offsetTop})}return t});var T="Moz O ms Webkit",P=S._config.usePrefixes?T.split(" "):[];S._cssomPrefixes=P;var E=S._config.usePrefixes?T.toLowerCase().split(" "):[];S._domPrefixes=E;var j={elem:i("modernizr")};Modernizr._q.push(function(){delete j.elem});var N={style:j.elem.style};Modernizr._q.unshift(function(){delete N.style}),S.testAllProps=y,S.testAllProps=g,Modernizr.addTest("flexbox",g("flexBasis","1px",!0)),Modernizr.addTest("flexboxlegacy",g("boxDirection","reverse",!0)),o(),s(C),delete S.addTest,delete S.addAsyncTest;for(var k=0;k<Modernizr._q.length;k++)Modernizr._q[k]();e.Modernizr=Modernizr}(window,document);
