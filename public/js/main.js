/*
 * ATTENTION: An "eval-source-map" devtool has been used.
 * This devtool is neither made for production nor for readable output files.
 * It uses "eval()" calls to create a separate source file with attached SourceMaps in the browser devtools.
 * If you are trying to read the output file, select a different devtool (https://webpack.js.org/configuration/devtool/)
 * or disable the default devtool with "devtool: false".
 * If you are looking for production-ready output files, see mode: "production" (https://webpack.js.org/configuration/mode/).
 */
/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/js/main.js":
/*!******************************!*\
  !*** ./resources/js/main.js ***!
  \******************************/
/***/ (() => {

eval("// $(function(){}) is shorthand for $(document).ready(function()\n$(document).ready(function () {\n  $('.toggle-class').change(function () {\n    var status = $(this).prop('checked') === true ? 1 : 0;\n    var characterId = $(this).data('id');\n    $.ajax({\n      headers: {\n        'X-CSRF-TOKEN': $('meta[name=\"csrf-token\"]').attr('content')\n      },\n      type: \"POST\",\n      dataType: \"JSON\",\n      url: \"/change-status\",\n      data: {\n        'status': status,\n        'character-id': characterId\n      }\n    });\n  });\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9yZXNvdXJjZXMvanMvbWFpbi5qcz9mMzJhIl0sIm5hbWVzIjpbIiQiLCJkb2N1bWVudCIsInJlYWR5IiwiY2hhbmdlIiwic3RhdHVzIiwicHJvcCIsImNoYXJhY3RlcklkIiwiZGF0YSIsImFqYXgiLCJoZWFkZXJzIiwiYXR0ciIsInR5cGUiLCJkYXRhVHlwZSIsInVybCJdLCJtYXBwaW5ncyI6IkFBQUE7QUFFQUEsQ0FBQyxDQUFDQyxRQUFELENBQUQsQ0FBWUMsS0FBWixDQUFrQixZQUFVO0FBQ3hCRixFQUFBQSxDQUFDLENBQUMsZUFBRCxDQUFELENBQW1CRyxNQUFuQixDQUEwQixZQUFXO0FBQ2pDLFFBQUlDLE1BQU0sR0FBR0osQ0FBQyxDQUFDLElBQUQsQ0FBRCxDQUFRSyxJQUFSLENBQWEsU0FBYixNQUE0QixJQUE1QixHQUFtQyxDQUFuQyxHQUF1QyxDQUFwRDtBQUNBLFFBQUlDLFdBQVcsR0FBR04sQ0FBQyxDQUFDLElBQUQsQ0FBRCxDQUFRTyxJQUFSLENBQWEsSUFBYixDQUFsQjtBQUVBUCxJQUFBQSxDQUFDLENBQUNRLElBQUYsQ0FBTztBQUNIQyxNQUFBQSxPQUFPLEVBQUU7QUFDTCx3QkFBZ0JULENBQUMsQ0FBQyx5QkFBRCxDQUFELENBQTZCVSxJQUE3QixDQUFrQyxTQUFsQztBQURYLE9BRE47QUFJSEMsTUFBQUEsSUFBSSxFQUFFLE1BSkg7QUFLSEMsTUFBQUEsUUFBUSxFQUFFLE1BTFA7QUFNSEMsTUFBQUEsR0FBRyxrQkFOQTtBQU9ITixNQUFBQSxJQUFJLEVBQUU7QUFDRixrQkFBVUgsTUFEUjtBQUVGLHdCQUFnQkU7QUFGZDtBQVBILEtBQVA7QUFZSCxHQWhCRDtBQWlCSCxDQWxCRCIsInNvdXJjZXNDb250ZW50IjpbIi8vICQoZnVuY3Rpb24oKXt9KSBpcyBzaG9ydGhhbmQgZm9yICQoZG9jdW1lbnQpLnJlYWR5KGZ1bmN0aW9uKClcblxuJChkb2N1bWVudCkucmVhZHkoZnVuY3Rpb24oKXtcbiAgICAkKCcudG9nZ2xlLWNsYXNzJykuY2hhbmdlKGZ1bmN0aW9uKCkge1xuICAgICAgICBsZXQgc3RhdHVzID0gJCh0aGlzKS5wcm9wKCdjaGVja2VkJykgPT09IHRydWUgPyAxIDogMDtcbiAgICAgICAgbGV0IGNoYXJhY3RlcklkID0gJCh0aGlzKS5kYXRhKCdpZCcpO1xuXG4gICAgICAgICQuYWpheCh7XG4gICAgICAgICAgICBoZWFkZXJzOiB7XG4gICAgICAgICAgICAgICAgJ1gtQ1NSRi1UT0tFTic6ICQoJ21ldGFbbmFtZT1cImNzcmYtdG9rZW5cIl0nKS5hdHRyKCdjb250ZW50JylcbiAgICAgICAgICAgIH0sXG4gICAgICAgICAgICB0eXBlOiBcIlBPU1RcIixcbiAgICAgICAgICAgIGRhdGFUeXBlOiBcIkpTT05cIixcbiAgICAgICAgICAgIHVybDogYC9jaGFuZ2Utc3RhdHVzYCxcbiAgICAgICAgICAgIGRhdGE6IHtcbiAgICAgICAgICAgICAgICAnc3RhdHVzJzogc3RhdHVzLFxuICAgICAgICAgICAgICAgICdjaGFyYWN0ZXItaWQnOiBjaGFyYWN0ZXJJZFxuICAgICAgICAgICAgfVxuICAgICAgICB9KVxuICAgIH0pXG59KVxuIl0sImZpbGUiOiIuL3Jlc291cmNlcy9qcy9tYWluLmpzLmpzIiwic291cmNlUm9vdCI6IiJ9\n//# sourceURL=webpack-internal:///./resources/js/main.js\n");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval-source-map devtool is used.
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./resources/js/main.js"]();
/******/ 	
/******/ })()
;