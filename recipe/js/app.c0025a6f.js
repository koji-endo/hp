(function(e){function t(t){for(var o,i,s=t[0],c=t[1],u=t[2],l=0,m=[];l<s.length;l++)i=s[l],Object.prototype.hasOwnProperty.call(r,i)&&r[i]&&m.push(r[i][0]),r[i]=0;for(o in c)Object.prototype.hasOwnProperty.call(c,o)&&(e[o]=c[o]);d&&d(t);while(m.length)m.shift()();return a.push.apply(a,u||[]),n()}function n(){for(var e,t=0;t<a.length;t++){for(var n=a[t],o=!0,i=1;i<n.length;i++){var s=n[i];0!==r[s]&&(o=!1)}o&&(a.splice(t--,1),e=c(c.s=n[0]))}return e}var o={},i={app:0},r={app:0},a=[];function s(e){return c.p+"js/"+({"Edit~Home":"Edit~Home",Home:"Home","Edit~List~Time":"Edit~List~Time",Edit:"Edit",List:"List",Time:"Time",Lens:"Lens",Login:"Login",Logout:"Logout"}[e]||e)+"."+{"Edit~Home":"f593361d",Home:"069cb9e6","Edit~List~Time":"d9a60f64",Edit:"82219904",List:"dab5da41",Time:"15c986cb",Lens:"634d8c0f",Login:"f7a124d0",Logout:"2e6be2db"}[e]+".js"}function c(t){if(o[t])return o[t].exports;var n=o[t]={i:t,l:!1,exports:{}};return e[t].call(n.exports,n,n.exports,c),n.l=!0,n.exports}c.e=function(e){var t=[],n={"Edit~Home":1,"Edit~List~Time":1,Edit:1,List:1,Time:1,Login:1};i[e]?t.push(i[e]):0!==i[e]&&n[e]&&t.push(i[e]=new Promise((function(t,n){for(var o="css/"+({"Edit~Home":"Edit~Home",Home:"Home","Edit~List~Time":"Edit~List~Time",Edit:"Edit",List:"List",Time:"Time",Lens:"Lens",Login:"Login",Logout:"Logout"}[e]||e)+"."+{"Edit~Home":"1404f7ae",Home:"31d6cfe0","Edit~List~Time":"6942cd46",Edit:"ca6df252",List:"938bb6fc",Time:"2f969eda",Lens:"31d6cfe0",Login:"23668cd1",Logout:"31d6cfe0"}[e]+".css",r=c.p+o,a=document.getElementsByTagName("link"),s=0;s<a.length;s++){var u=a[s],l=u.getAttribute("data-href")||u.getAttribute("href");if("stylesheet"===u.rel&&(l===o||l===r))return t()}var m=document.getElementsByTagName("style");for(s=0;s<m.length;s++){u=m[s],l=u.getAttribute("data-href");if(l===o||l===r)return t()}var d=document.createElement("link");d.rel="stylesheet",d.type="text/css",d.onload=t,d.onerror=function(t){var o=t&&t.target&&t.target.src||r,a=new Error("Loading CSS chunk "+e+" failed.\n("+o+")");a.code="CSS_CHUNK_LOAD_FAILED",a.request=o,delete i[e],d.parentNode.removeChild(d),n(a)},d.href=r;var f=document.getElementsByTagName("head")[0];f.appendChild(d)})).then((function(){i[e]=0})));var o=r[e];if(0!==o)if(o)t.push(o[2]);else{var a=new Promise((function(t,n){o=r[e]=[t,n]}));t.push(o[2]=a);var u,l=document.createElement("script");l.charset="utf-8",l.timeout=120,c.nc&&l.setAttribute("nonce",c.nc),l.src=s(e);var m=new Error;u=function(t){l.onerror=l.onload=null,clearTimeout(d);var n=r[e];if(0!==n){if(n){var o=t&&("load"===t.type?"missing":t.type),i=t&&t.target&&t.target.src;m.message="Loading chunk "+e+" failed.\n("+o+": "+i+")",m.name="ChunkLoadError",m.type=o,m.request=i,n[1](m)}r[e]=void 0}};var d=setTimeout((function(){u({type:"timeout",target:l})}),12e4);l.onerror=l.onload=u,document.head.appendChild(l)}return Promise.all(t)},c.m=e,c.c=o,c.d=function(e,t,n){c.o(e,t)||Object.defineProperty(e,t,{enumerable:!0,get:n})},c.r=function(e){"undefined"!==typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},c.t=function(e,t){if(1&t&&(e=c(e)),8&t)return e;if(4&t&&"object"===typeof e&&e&&e.__esModule)return e;var n=Object.create(null);if(c.r(n),Object.defineProperty(n,"default",{enumerable:!0,value:e}),2&t&&"string"!=typeof e)for(var o in e)c.d(n,o,function(t){return e[t]}.bind(null,o));return n},c.n=function(e){var t=e&&e.__esModule?function(){return e["default"]}:function(){return e};return c.d(t,"a",t),t},c.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},c.p="",c.oe=function(e){throw console.error(e),e};var u=window["webpackJsonp"]=window["webpackJsonp"]||[],l=u.push.bind(u);u.push=t,u=u.slice();for(var m=0;m<u.length;m++)t(u[m]);var d=l;a.push([0,"chunk-vendors"]),n()})({0:function(e,t,n){e.exports=n("56d7")},"56d7":function(e,t,n){"use strict";n.r(t);n("e260"),n("e6cf"),n("cca6"),n("a79d");var o,i,r=n("2b0e"),a=function(){var e=this,t=e.$createElement,n=e._self._c||t;return n("v-app",[n("TopMenu"),n("v-main",[n("v-container",{attrs:{fluid:""}},[n("router-view")],1)],1),n("v-footer",{attrs:{app:""}},[e._v(" footer ")])],1)},s=[],c=n("8aa5"),u=n.n(c),l={created:function(){},methods:{},data:function(){return{account:{username:"",email:"",photoURL:""}}}},m=l,d=n("2877"),f=Object(d["a"])(m,o,i,!1,null,null,null),p=f.exports,v=function(){var e=this,t=e.$createElement,n=e._self._c||t;return n("div",[n("v-navigation-drawer",{attrs:{color:"primary",dark:"",temporary:"",app:""},model:{value:e.drawer,callback:function(t){e.drawer=t},expression:"drawer"}},[n("v-list-item",[n("v-list-item-content",[n("v-list-item-title",{staticClass:"title mt-5",attrs:{align:"center"}},[e._v(" Recipe ")])],1)],1),n("v-divider"),n("v-list",[n("v-list-group",{attrs:{"no-action":"","sub-group":"",value:!0,color:"secondary"},scopedSlots:e._u([{key:"activator",fn:function(){return[n("v-list-item-content",{attrs:{color:"red"}},[n("v-list-item-title",[e._v("メニュー")])],1)]},proxy:!0}])},[n("v-list-item-group",{model:{value:e.retindex,callback:function(t){e.retindex=t},expression:"retindex"}},e._l(e.menus,(function(t,o){return n("v-list-item",{key:o,attrs:{link:""},on:{click:function(n){return e.$router.push(t.href)}}},[n("v-tooltip",{attrs:{bottom:""},scopedSlots:e._u([{key:"activator",fn:function(o){var i=o.on;return[n("v-list-item-title",e._g({staticClass:"ml-10"},i),[e._v(e._s(t.text))])]}}],null,!0)},[n("span",[e._v(e._s(t.message))])])],1)})),1)],1),n("v-list-group",{attrs:{"no-action":"","sub-group":"",value:!0,color:"secondary"},scopedSlots:e._u([{key:"activator",fn:function(){return[n("v-list-item-content",{attrs:{color:"red"}},[n("v-list-item-title",[e._v("ガーデン")])],1)]},proxy:!0}])},[n("v-list-item-group",{model:{value:e.retindex,callback:function(t){e.retindex=t},expression:"retindex"}},[n("v-list-item",{attrs:{link:"",to:"lens"}},[n("v-tooltip",{attrs:{bottom:""},scopedSlots:e._u([{key:"activator",fn:function(t){var o=t.on;return[n("v-list-item-title",e._g({staticClass:"ml-10"},o),[e._v(" Lens ")])]}}])},[n("span",[e._v("ABCD行列を用いたシミュレーションです。")])])],1)],1)],1)],1)],1),n("v-app-bar",{attrs:{app:"",color:"primary",dark:""}},[n("v-app-bar-nav-icon",{on:{click:e.sidebarStatus}}),n("v-toolbar-title",[e._v("Recipe")]),n("v-spacer"),n("v-menu",{attrs:{"offset-y":""},scopedSlots:e._u([{key:"activator",fn:function(t){var o=t.on;return[n("div",e._g({staticClass:"px-2"},o),[n("v-icon",{attrs:{dark:""}},[e._v("mdi-account-circle")]),e._v(" "+e._s(e.account.username)+" ")],1)]}}])},[""!==e.account.username?n("v-list",{attrs:{color:"primary",dark:""}},[n("v-list-item",[n("v-list-item-icon",[n("v-icon",[e._v("mdi-account")])],1),n("v-list-item-content",[n("v-list-item-title",{domProps:{textContent:e._s(e.account.username)}})],1)],1),n("v-list-item",[n("v-list-item-icon",[n("v-icon",[e._v("mdi-email")])],1),n("v-list-item-content",[n("v-list-item-title",{domProps:{textContent:e._s(e.account.email)}})],1)],1),n("v-list-item",[n("v-list-item-content",[n("v-img",{attrs:{width:"10%",src:e.account.photoURL}})],1)],1),n("v-list-item",[n("v-list-item-icon",[n("v-icon",[e._v("mdi-logout")])],1),n("v-list-item-content",[n("v-btn",{on:{click:e.logout}},[e._v("logout")])],1)],1)],1):n("v-list",{attrs:{color:"primary",dark:""}},[n("v-list-item",[n("v-list-item-icon",[n("v-icon",[e._v("mdi-login")])],1),n("v-list-item-content",[n("v-btn",{attrs:{to:"login"}},[e._v("login")])],1)],1)],1)],1)],1)],1)},h=[],g=(n("b0c0"),n("b85c")),b={data:function(){return{account:{username:"",email:"",photoURL:""},drawer:!1,model:{nav:"x"},menus:[{href:"home",text:"ホーム",message:"ホーム画面"},{href:"list",text:"編集",message:"編集するための一覧を開きます"},{href:"time",text:"時間管理",message:"時間管理します。"}]}},mounted:function(){var e=this;this.$store.subscribe((function(t,n){"onAuthStateChanged"===t.type&&(e.account.username=n.user.displayName||"",e.account.email=n.user.email||"",e.account.photoURL=n.user.photoURL||"")}))},methods:{sidebarStatus:function(){this.drawer=!this.drawer},logout:function(){u.a.auth().signOut(),this.$store.commit("onAuthStateChanged",{}),this.$router.push("home")}},computed:{retindex:{get:function(){var e,t=0,n=Object(g["a"])(this.menus);try{for(n.s();!(e=n.n()).done;){var o=e.value;if(o.href===this.$route.name)return t;t++}}catch(i){n.e(i)}finally{n.f()}return 0},set:function(){}}}},L=b,y=(n("f80d"),n("6544")),_=n.n(y),E=n("40dc"),w=n("5bc1"),k=n("8336"),T=n("ce7e"),x=n("132d"),S=n("adda"),A=n("8860"),C=n("56b0"),V=n("da13"),O=n("5d23"),j=n("1baa"),P=n("34c3"),H=n("e449"),I=n("f774"),N=n("2fa4"),B=n("2a7f"),M=n("3a2f"),R=Object(d["a"])(L,v,h,!1,null,null,null),U=R.exports;_()(R,{VAppBar:E["a"],VAppBarNavIcon:w["a"],VBtn:k["a"],VDivider:T["a"],VIcon:x["a"],VImg:S["a"],VList:A["a"],VListGroup:C["a"],VListItem:V["a"],VListItemContent:O["a"],VListItemGroup:j["a"],VListItemIcon:P["a"],VListItemTitle:O["b"],VMenu:H["a"],VNavigationDrawer:I["a"],VSpacer:N["a"],VToolbarTitle:B["a"],VTooltip:M["a"]});var $={name:"App",mixins:[p],components:{TopMenu:U},data:function(){return{}}},q=$,D=n("7496"),F=n("a523"),G=n("553a"),J=n("f6c4"),K=Object(d["a"])(q,a,s,!1,null,null,null),z=K.exports;_()(K,{VApp:D["a"],VContainer:F["a"],VFooter:G["a"],VMain:J["a"]});n("45fc"),n("d3b7");var Q=n("8c4f"),W=n("2f62");r["a"].use(W["a"]);var Z=new W["a"].Store({state:{user:{}},mutations:{onAuthStateChanged:function(e,t){e.user=t}},getters:{user:function(e){return e.user}}}),X=n("58ca");r["a"].use(Q["a"]),r["a"].use(X["a"],{refreshOnceOnNavigation:!0});var Y=[{path:"/home",name:"home",component:function(){return Promise.all([n.e("Edit~Home"),n.e("Home")]).then(n.bind(null,"bb51"))}},{path:"/login",name:"login",component:function(){return n.e("Login").then(n.bind(null,"a55b"))}},{path:"/logout",name:"logout",component:function(){return n.e("Logout").then(n.bind(null,"c100"))}},{path:"/edit",name:"edit",component:function(){return Promise.all([n.e("Edit~List~Time"),n.e("Edit~Home"),n.e("Edit")]).then(n.bind(null,"1071"))}},{path:"/list",name:"list",component:function(){return Promise.all([n.e("Edit~List~Time"),n.e("List")]).then(n.bind(null,"1a33"))},meta:{requiresAuth:!0}},{path:"/time",name:"time",component:function(){return Promise.all([n.e("Edit~List~Time"),n.e("Time")]).then(n.bind(null,"3e51"))},meta:{requiresAuth:!0}},{path:"/lens",name:"lens",component:function(){return n.e("Lens").then(n.bind(null,"2e3e"))}},{path:"*",redirect:"/home"}],ee=new Q["a"]({routes:Y});ee.beforeEach((function(e,t,n){if(e.matched.some((function(e){return e.meta.requiresAuth}))){if(u.a.auth().currentUser)return Z.commit("onAuthStateChanged",u.a.auth().currentUser),void n();u.a.auth().onAuthStateChanged((function(e){var t=e||{};Z.commit("onAuthStateChanged",t),e?n():n({name:"login"})}))}n()}));var te=ee,ne=n("9483");Object(ne["a"])("".concat("","service-worker.js"),{ready:function(){console.log("App is being served from cache by a service worker.\nFor more details, visit https://goo.gl/AFskqB")},registered:function(){console.log("Service worker has been registered.")},cached:function(){console.log("Content has been cached for offline use.")},updatefound:function(){console.log("New content is downloading.")},updated:function(){console.log("New content is available; please refresh.")},offline:function(){console.log("No internet connection found. App is running in offline mode.")},error:function(e){console.error("Error during service worker registration:",e)}});var oe=n("f309");r["a"].use(oe["a"]);var ie=new oe["a"]({theme:{themes:{light:{primary:"#1e407a",secondary:"#b0bec5",anchor:"#8c9eff"},dark:{primary:"#0000cc",secondary:"#b0bec5",anchor:"#8c9eff"}},options:{customProperties:!0}}}),re=n("59ca"),ae=n.n(re);r["a"].config.productionTip=!1;var se={apiKey:"AIzaSyA2pSS1RatwnlB4bcf3QnKMQgbl3ZjT060",authDomain:"fuego-899c1.firebaseapp.com",databaseURL:"https://fuego-899c1.firebaseio.com",projectId:"fuego-899c1",storageBucket:"fuego-899c1.appspot.com",messagingSenderId:"535111845869",appId:"1:535111845869:web:b1f1970b52001bf05209e4",measurementId:"G-WES2LVHBJ0"};ae.a.initializeApp(se),ae.a.auth().setPersistence(ae.a.auth.Auth.Persistence.LOCAL),new r["a"]({router:te,store:Z,vuetify:ie,render:function(e){return e(z)}}).$mount("#app")},d1e8:function(e,t,n){},f80d:function(e,t,n){"use strict";var o=n("d1e8"),i=n.n(o);i.a}});
//# sourceMappingURL=app.c0025a6f.js.map