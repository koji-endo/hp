(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-2d215fa4"],{c100:function(t,n,a){"use strict";a.r(n);var o=function(){var t=this,n=t.$createElement,a=t._self._c||n;return a("div",{staticClass:"signout"},[a("h2",[t._v("Sign out")]),a("v-btn",{attrs:{color:"primary"},on:{click:t.googleSignOut}},[t._v("Sign out from Google")])],1)},c=[],e=(a("99af"),a("8aa5")),u=a.n(e),i={name:"Signout",methods:{googleSignOut:function(){var t=this,n=u.a.auth().currentUser,a=n.displayName,o=n.email;u.a.auth().signOut().then((function(){alert("".concat(a,"(").concat(o,")からログアウトしました")),t.$router.push("login")})).catch((function(t){alert("ログアウト時にエラーが発生しました (".concat(t,")"))}))}}},r=i,l=a("2877"),s=a("6544"),g=a.n(s),h=a("8336"),f=Object(l["a"])(r,o,c,!1,null,null,null);n["default"]=f.exports;g()(f,{VBtn:h["a"]})}}]);
//# sourceMappingURL=chunk-2d215fa4.bc68796b.js.map