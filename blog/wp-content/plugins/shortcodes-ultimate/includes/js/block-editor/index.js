!function o(n,c,i){function l(t,e){if(!c[t]){if(!n[t]){var r="function"==typeof require&&require;if(!e&&r)return r(t,!0);if(s)return s(t,!0);throw(e=new Error("Cannot find module '"+t+"'")).code="MODULE_NOT_FOUND",e}r=c[t]={exports:{}},n[t][0].call(r.exports,function(e){return l(n[t][1][e]||e)},r,r.exports,o,n,c,i)}return c[t].exports}for(var s="function"==typeof require&&require,e=0;e<i.length;e++)l(i[e]);return l}({1:[function(e,t,r){"use strict";const o=wp.element["Fragment"],n=wp.blockEditor["BlockControls"];var{}=wp.components;wp.hooks.addFilter("editor.BlockEdit","shortcodes-ultimate/with-insert-shortcode-button",t=>e=>-1===SUBlockEditorSettings.supportedBlocks.indexOf(e.name)?React.createElement(t,e):React.createElement(o,null,React.createElement(t,e),React.createElement(n,{controls:[{icon:React.createElement("svg",{viewBox:"0 0 24 24",xmlns:"http://www.w3.org/2000/svg"},React.createElement("path",{d:"M10,3L3,3L3,21L10,21L10,17L7,17L7,7L10,7L10,3ZM14,3L21,3L21,21L14,21L14,17L17,17L17,7L14,7L14,3Z"})),title:SUBlockEditorL10n.insertShortcode,onClick:()=>{window.SUG.App.insert("block",{props:e})}}]})))},{}]},{},[1]);
//# sourceMappingURL=index.js.map
