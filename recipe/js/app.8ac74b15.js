(function(e){function t(t){for(var r,o,c=t[0],u=t[1],s=t[2],l=0,d=[];l<c.length;l++)o=c[l],Object.prototype.hasOwnProperty.call(a,o)&&a[o]&&d.push(a[o][0]),a[o]=0;for(r in u)Object.prototype.hasOwnProperty.call(u,r)&&(e[r]=u[r]);f&&f(t);while(d.length)d.shift()();return i.push.apply(i,s||[]),n()}function n(){for(var e,t=0;t<i.length;t++){for(var n=i[t],r=!0,o=1;o<n.length;o++){var c=n[o];0!==a[c]&&(r=!1)}r&&(i.splice(t--,1),e=u(u.s=n[0]))}return e}var r={},o={app:0},a={app:0},i=[];function c(e){return u.p+"js/"+({}[e]||e)+"."+{"chunk-0940969d":"25223714","chunk-39910e96":"76bf08f0","chunk-5df1361b":"5202e676","chunk-e36d6500":"65484b1e","chunk-2d2086b7":"fe36afa0","chunk-2d215fa4":"9f4e8a8c","chunk-2d21a3d2":"72b0c4da"}[e]+".js"}function u(t){if(r[t])return r[t].exports;var n=r[t]={i:t,l:!1,exports:{}};return e[t].call(n.exports,n,n.exports,u),n.l=!0,n.exports}u.e=function(e){var t=[],n={"chunk-0940969d":1,"chunk-39910e96":1,"chunk-5df1361b":1,"chunk-e36d6500":1};o[e]?t.push(o[e]):0!==o[e]&&n[e]&&t.push(o[e]=new Promise((function(t,n){for(var r="css/"+({}[e]||e)+"."+{"chunk-0940969d":"a70b69a6","chunk-39910e96":"1404f7ae","chunk-5df1361b":"de4cbd29","chunk-e36d6500":"a851346a","chunk-2d2086b7":"31d6cfe0","chunk-2d215fa4":"31d6cfe0","chunk-2d21a3d2":"31d6cfe0"}[e]+".css",a=u.p+r,i=document.getElementsByTagName("link"),c=0;c<i.length;c++){var s=i[c],l=s.getAttribute("data-href")||s.getAttribute("href");if("stylesheet"===s.rel&&(l===r||l===a))return t()}var d=document.getElementsByTagName("style");for(c=0;c<d.length;c++){s=d[c],l=s.getAttribute("data-href");if(l===r||l===a)return t()}var f=document.createElement("link");f.rel="stylesheet",f.type="text/css",f.onload=t,f.onerror=function(t){var r=t&&t.target&&t.target.src||a,i=new Error("Loading CSS chunk "+e+" failed.\n("+r+")");i.code="CSS_CHUNK_LOAD_FAILED",i.request=r,delete o[e],f.parentNode.removeChild(f),n(i)},f.href=a;var p=document.getElementsByTagName("head")[0];p.appendChild(f)})).then((function(){o[e]=0})));var r=a[e];if(0!==r)if(r)t.push(r[2]);else{var i=new Promise((function(t,n){r=a[e]=[t,n]}));t.push(r[2]=i);var s,l=document.createElement("script");l.charset="utf-8",l.timeout=120,u.nc&&l.setAttribute("nonce",u.nc),l.src=c(e);var d=new Error;s=function(t){l.onerror=l.onload=null,clearTimeout(f);var n=a[e];if(0!==n){if(n){var r=t&&("load"===t.type?"missing":t.type),o=t&&t.target&&t.target.src;d.message="Loading chunk "+e+" failed.\n("+r+": "+o+")",d.name="ChunkLoadError",d.type=r,d.request=o,n[1](d)}a[e]=void 0}};var f=setTimeout((function(){s({type:"timeout",target:l})}),12e4);l.onerror=l.onload=s,document.head.appendChild(l)}return Promise.all(t)},u.m=e,u.c=r,u.d=function(e,t,n){u.o(e,t)||Object.defineProperty(e,t,{enumerable:!0,get:n})},u.r=function(e){"undefined"!==typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},u.t=function(e,t){if(1&t&&(e=u(e)),8&t)return e;if(4&t&&"object"===typeof e&&e&&e.__esModule)return e;var n=Object.create(null);if(u.r(n),Object.defineProperty(n,"default",{enumerable:!0,value:e}),2&t&&"string"!=typeof e)for(var r in e)u.d(n,r,function(t){return e[t]}.bind(null,r));return n},u.n=function(e){var t=e&&e.__esModule?function(){return e["default"]}:function(){return e};return u.d(t,"a",t),t},u.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},u.p="",u.oe=function(e){throw console.error(e),e};var s=window["webpackJsonp"]=window["webpackJsonp"]||[],l=s.push.bind(s);s.push=t,s=s.slice();for(var d=0;d<s.length;d++)t(s[d]);var f=l;i.push([0,"chunk-vendors"]),n()})({0:function(e,t,n){e.exports=n("56d7")},"50ec":function(e,t,n){},"56d7":function(e,t,n){"use strict";n.r(t);n("e260"),n("e6cf"),n("cca6"),n("a79d");var r,o,a=n("2b0e"),i=function(){var e=this,t=e.$createElement,n=e._self._c||t;return n("v-app",[n("TopMenu",{attrs:{account:e.account}}),n("v-content",[n("v-container",{attrs:{fluid:""}},[n("router-view")],1)],1),n("v-footer",{attrs:{app:""}},[e._v(" footer ")])],1)},c=[],u=(n("b0c0"),n("8aa5")),s=n.n(u),l={created:function(){var e=this;s.a.auth().onAuthStateChanged((function(t){t?(e.account.username=t.displayName,e.account.email=t.email,e.account.photoURL=t.photoURL):"login"===e.$route.name||e.$router.push("login")}))},methods:{},data:function(){return{account:{username:"",email:"",photoURL:""}}}},d=l,f=n("2877"),p=Object(f["a"])(d,r,o,!1,null,null,null),m=p.exports,h=function(){var e=this,t=e.$createElement,n=e._self._c||t;return n("div",[n("v-navigation-drawer",{attrs:{color:"primary",dark:"",temporary:"",app:""},model:{value:e.drawer,callback:function(t){e.drawer=t},expression:"drawer"}},[n("v-list-item",[n("v-list-item-content",[n("v-list-item-title",{staticClass:"title mt-5",attrs:{align:"center"}},[e._v(" Recipe ")])],1)],1),n("v-divider"),n("v-list",[n("v-list-group",{attrs:{"no-action":"","sub-group":"",value:!0,color:"secondary"},scopedSlots:e._u([{key:"activator",fn:function(){return[n("v-list-item-content",{attrs:{color:"red"}},[n("v-list-item-title",[e._v("メニュー")])],1)]},proxy:!0}])},[n("v-list-item-group",{model:{value:e.retindex,callback:function(t){e.retindex=t},expression:"retindex"}},e._l(e.menus,(function(t,r){return n("v-list-item",{key:r,attrs:{link:"",href:t.href}},[n("v-tooltip",{attrs:{bottom:""},scopedSlots:e._u([{key:"activator",fn:function(r){var o=r.on;return[n("v-list-item-title",e._g({staticClass:"ml-10"},o),[e._v(e._s(t.text))])]}}],null,!0)},[n("span",[e._v(e._s(t.message))])])],1)})),1)],1)],1)],1),n("v-app-bar",{attrs:{app:"",color:"primary",dark:""}},[n("v-app-bar-nav-icon",{on:{click:e.sidebarStatus}}),n("v-toolbar-title",[e._v("Recipe")]),n("v-spacer"),""!==e.account.email?n("v-menu",{attrs:{"offset-y":""},scopedSlots:e._u([{key:"activator",fn:function(t){var r=t.on;return[n("v-btn",e._g({attrs:{icon:""}},r),[n("v-icon",[e._v("mdi-dots-vertical")])],1)]}}],null,!1,2097855828)},[n("v-list",{attrs:{color:"primary",dark:""}},[n("v-list-item",[n("v-list-item-title",[n("v-icon",[e._v("mdi-account")]),e._v(" "+e._s(e.account.username)),n("br"),n("v-icon",[e._v("mdi-email")]),e._v(" "+e._s(e.account.email)),n("br"),n("v-row",[n("v-col",{attrs:{cols:"12",xs:"8"}},[n("v-img",{attrs:{width:"20%",src:e.account.photoURL}})],1),n("v-col",{attrs:{cols:"12",xs:"4"}},[n("router-link",{attrs:{to:"logout"}},[n("v-btn",[e._v(" Logout")])],1)],1)],1)],1)],1)],1)],1):e._e()],1)],1)},v=[],b=(n("a4d3"),n("e01a"),n("d28b"),n("d3b7"),n("3ca3"),n("ddb0"),{props:{account:Object},data:function(){return{drawer:!1,model:{nav:"x"},menus:[{href:"home",text:"ホーム",message:"ホーム画面"},{href:"list",text:"編集",message:"編集するための一覧を開きます"},{href:"logout",text:"ログアウト",message:"ログアウトします"}]}},methods:{sidebarStatus:function(){this.drawer=!this.drawer}},computed:{retindex:function(){var e=0,t=!0,n=!1,r=void 0;try{for(var o,a=this.menus[Symbol.iterator]();!(t=(o=a.next()).done);t=!0){var i=o.value;if(i.href===this.$route.name)return e;e++}}catch(c){n=!0,r=c}finally{try{t||null==a.return||a.return()}finally{if(n)throw r}}return 0}}}),g=b,k=(n("f80d"),n("6544")),y=n.n(k),w=n("40dc"),_=n("5bc1"),x=n("8336"),V=n("62ad"),S=n("ce7e"),j=n("132d"),L=n("adda"),O=n("8860"),A=n("56b0"),C=n("da13"),P=n("5d23"),T=n("1baa"),I=n("e449"),E=n("f774"),N=n("0fd9"),R=n("2fa4"),B=n("2a7f"),D=n("3a2f"),M=Object(f["a"])(g,h,v,!1,null,null,null),U=M.exports;y()(M,{VAppBar:w["a"],VAppBarNavIcon:_["a"],VBtn:x["a"],VCol:V["a"],VDivider:S["a"],VIcon:j["a"],VImg:L["a"],VList:O["a"],VListGroup:A["a"],VListItem:C["a"],VListItemContent:P["a"],VListItemGroup:T["a"],VListItemTitle:P["b"],VMenu:I["a"],VNavigationDrawer:E["a"],VRow:N["a"],VSpacer:R["a"],VToolbarTitle:B["a"],VTooltip:D["a"]});var $={name:"App",mixins:[m],components:{TopMenu:U},data:function(){return{}}},F=$,q=n("7496"),z=n("a523"),G=n("a75b"),J=n("553a"),K=Object(f["a"])(F,i,c,!1,null,null,null),X=K.exports;y()(K,{VApp:q["a"],VContainer:z["a"],VContent:G["a"],VFooter:J["a"]});var H=n("8c4f");a["a"].use(H["a"]);var W=[{path:"/home",name:"home",component:function(){return Promise.all([n.e("chunk-39910e96"),n.e("chunk-2d21a3d2")]).then(n.bind(null,"bb51"))}},{path:"/login",name:"login",component:function(){return n.e("chunk-2d2086b7").then(n.bind(null,"a55b"))}},{path:"/logout",name:"logout",component:function(){return n.e("chunk-2d215fa4").then(n.bind(null,"c100"))}},{path:"/edit",name:"edit",component:function(){return Promise.all([n.e("chunk-0940969d"),n.e("chunk-39910e96"),n.e("chunk-5df1361b")]).then(n.bind(null,"1071"))}},{path:"/list",name:"list",component:function(){return Promise.all([n.e("chunk-0940969d"),n.e("chunk-e36d6500")]).then(n.bind(null,"1a33"))}},{path:"*",redirect:"/home"}],Y=new H["a"]({mode:"history",base:"hp/recipe",routes:W}),Z=Y,Q=n("2f62");a["a"].use(Q["a"]);var ee=new Q["a"].Store({state:{},mutations:{},actions:{},modules:{}}),te=n("9483");Object(te["a"])("".concat("","service-worker.js"),{ready:function(){console.log("App is being served from cache by a service worker.\nFor more details, visit https://goo.gl/AFskqB")},registered:function(){console.log("Service worker has been registered.")},cached:function(){console.log("Content has been cached for offline use.")},updatefound:function(){console.log("New content is downloading.")},updated:function(){console.log("New content is available; please refresh.")},offline:function(){console.log("No internet connection found. App is running in offline mode.")},error:function(e){console.error("Error during service worker registration:",e)}});var ne=n("f309");a["a"].use(ne["a"]);var re=new ne["a"]({theme:{themes:{light:{primary:"#1e407a",secondary:"#b0bec5",anchor:"#8c9eff"},dark:{primary:"#0000cc",secondary:"#b0bec5",anchor:"#8c9eff"}},options:{customProperties:!0}}});a["a"].config.productionTip=!1;var oe={apiKey:"AIzaSyDXUdmD1x4cZiy8xFR2bzRKPj0kLvqdzoI",authDomain:"koji-endo.github.io",databaseURL:"https://inicio-f147a.firebaseio.com",projectId:"inicio-f147a",storageBucket:"inicio-f147a.appspot.com",messagingSenderId:"486069456813",appId:"1:486069456813:web:b764b1f9050c8f46369b24",measurementId:"G-WY0TCJ486X"};s.a.initializeApp(oe),new a["a"]({router:Z,store:ee,vuetify:re,render:function(e){return e(X)}}).$mount("#app")},f80d:function(e,t,n){"use strict";var r=n("50ec"),o=n.n(r);o.a}});
//# sourceMappingURL=app.8ac74b15.js.map