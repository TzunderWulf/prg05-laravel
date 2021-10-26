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

eval("// $(function(){}) is shorthand for $(document).ready(function()\n$(document).ready(function () {\n  console.log('why no workie');\n  $('.toggle-class').change(function () {\n    var status = $(this).prop('checked') === true ? 1 : 0;\n    var characterId = $(this).data('id');\n    $.ajax({\n      headers: {\n        'X-CSRF-TOKEN': $('meta[name=\"csrf-token\"]').attr('content')\n      },\n      type: \"POST\",\n      dataType: \"JSON\",\n      url: \"/change-status\",\n      data: {\n        'status': status,\n        'character-id': characterId\n      }\n    });\n  });\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9yZXNvdXJjZXMvanMvbWFpbi5qcz9mMzJhIl0sIm5hbWVzIjpbIiQiLCJkb2N1bWVudCIsInJlYWR5IiwiY29uc29sZSIsImxvZyIsImNoYW5nZSIsInN0YXR1cyIsInByb3AiLCJjaGFyYWN0ZXJJZCIsImRhdGEiLCJhamF4IiwiaGVhZGVycyIsImF0dHIiLCJ0eXBlIiwiZGF0YVR5cGUiLCJ1cmwiXSwibWFwcGluZ3MiOiJBQUFBO0FBRUFBLENBQUMsQ0FBQ0MsUUFBRCxDQUFELENBQVlDLEtBQVosQ0FBa0IsWUFBVTtBQUN4QkMsRUFBQUEsT0FBTyxDQUFDQyxHQUFSLENBQVksZUFBWjtBQUNBSixFQUFBQSxDQUFDLENBQUMsZUFBRCxDQUFELENBQW1CSyxNQUFuQixDQUEwQixZQUFXO0FBQ2pDLFFBQUlDLE1BQU0sR0FBR04sQ0FBQyxDQUFDLElBQUQsQ0FBRCxDQUFRTyxJQUFSLENBQWEsU0FBYixNQUE0QixJQUE1QixHQUFtQyxDQUFuQyxHQUF1QyxDQUFwRDtBQUNBLFFBQUlDLFdBQVcsR0FBR1IsQ0FBQyxDQUFDLElBQUQsQ0FBRCxDQUFRUyxJQUFSLENBQWEsSUFBYixDQUFsQjtBQUVBVCxJQUFBQSxDQUFDLENBQUNVLElBQUYsQ0FBTztBQUNIQyxNQUFBQSxPQUFPLEVBQUU7QUFDTCx3QkFBZ0JYLENBQUMsQ0FBQyx5QkFBRCxDQUFELENBQTZCWSxJQUE3QixDQUFrQyxTQUFsQztBQURYLE9BRE47QUFJSEMsTUFBQUEsSUFBSSxFQUFFLE1BSkg7QUFLSEMsTUFBQUEsUUFBUSxFQUFFLE1BTFA7QUFNSEMsTUFBQUEsR0FBRyxrQkFOQTtBQU9ITixNQUFBQSxJQUFJLEVBQUU7QUFDRixrQkFBVUgsTUFEUjtBQUVGLHdCQUFnQkU7QUFGZDtBQVBILEtBQVA7QUFZSCxHQWhCRDtBQWlCSCxDQW5CRCIsInNvdXJjZXNDb250ZW50IjpbIi8vICQoZnVuY3Rpb24oKXt9KSBpcyBzaG9ydGhhbmQgZm9yICQoZG9jdW1lbnQpLnJlYWR5KGZ1bmN0aW9uKClcblxuJChkb2N1bWVudCkucmVhZHkoZnVuY3Rpb24oKXtcbiAgICBjb25zb2xlLmxvZygnd2h5IG5vIHdvcmtpZScpXG4gICAgJCgnLnRvZ2dsZS1jbGFzcycpLmNoYW5nZShmdW5jdGlvbigpIHtcbiAgICAgICAgbGV0IHN0YXR1cyA9ICQodGhpcykucHJvcCgnY2hlY2tlZCcpID09PSB0cnVlID8gMSA6IDA7XG4gICAgICAgIGxldCBjaGFyYWN0ZXJJZCA9ICQodGhpcykuZGF0YSgnaWQnKTtcblxuICAgICAgICAkLmFqYXgoe1xuICAgICAgICAgICAgaGVhZGVyczoge1xuICAgICAgICAgICAgICAgICdYLUNTUkYtVE9LRU4nOiAkKCdtZXRhW25hbWU9XCJjc3JmLXRva2VuXCJdJykuYXR0cignY29udGVudCcpXG4gICAgICAgICAgICB9LFxuICAgICAgICAgICAgdHlwZTogXCJQT1NUXCIsXG4gICAgICAgICAgICBkYXRhVHlwZTogXCJKU09OXCIsXG4gICAgICAgICAgICB1cmw6IGAvY2hhbmdlLXN0YXR1c2AsXG4gICAgICAgICAgICBkYXRhOiB7XG4gICAgICAgICAgICAgICAgJ3N0YXR1cyc6IHN0YXR1cyxcbiAgICAgICAgICAgICAgICAnY2hhcmFjdGVyLWlkJzogY2hhcmFjdGVySWRcbiAgICAgICAgICAgIH1cbiAgICAgICAgfSlcbiAgICB9KVxufSlcbiJdLCJmaWxlIjoiLi9yZXNvdXJjZXMvanMvbWFpbi5qcy5qcyIsInNvdXJjZVJvb3QiOiIifQ==\n//# sourceURL=webpack-internal:///./resources/js/main.js\n");

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