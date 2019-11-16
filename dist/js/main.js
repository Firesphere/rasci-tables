/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./client/src/js/components/form.js":
/*!******************************************!*\
  !*** ./client/src/js/components/form.js ***!
  \******************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
var dropdowns = Array.from(document.getElementsByClassName('rasci-value'));
var savebuttons = Array.from(document.getElementsByClassName('savebutton'));
var form = document.getElementById('Form_SaveForm');
var table = document.getElementById('totals-table');
/* harmony default export */ __webpack_exports__["default"] = (function () {
  dropdowns.forEach(function (item) {
    item.addEventListener("change", function () {
      var cell = item.closest('td');
      cell.classList.remove('R', 'A', 'S', 'C', 'I');

      if (item.value) {
        cell.classList.add(item.value[0].toUpperCase());
      }

      savebuttons.forEach(function (item) {
        item.style.display = 'none';
      });
      document.querySelector('th.savebutton').style.display = 'block';
    });
  });
  form.addEventListener("submit", function (e) {
    e.preventDefault();
    var original = e.explicitOriginalTarget;
    original.value = "";
    e.explicitOriginalTarget.classList.add('spinner-border');
    var data = new FormData(form);
    var request = new XMLHttpRequest();
    request.open("POST", form.getAttribute('action'));
    request.send(data);

    request.onreadystatechange = function () {
      table.innerHTML = request.response;
    };

    setTimeout(function () {
      e.explicitOriginalTarget.classList.remove('spinner-border');
      e.explicitOriginalTarget.value = "Save";

      try {
        e.explicitOriginalTarget.closest('td').style.display = 'none';
        document.querySelector('th.savebutton').style.display = 'none';
        Array.from(document.querySelectorAll('td.savebutton.alert-dark')).forEach(function (item) {
          item.style.display = 'none';
        });
      } catch (exception) {// no-op
      }
    }, 1000);
    return false;
  });
});

/***/ }),

/***/ "./client/src/js/main.js":
/*!*******************************!*\
  !*** ./client/src/js/main.js ***!
  \*******************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _components_form__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./components/form */ "./client/src/js/components/form.js");

Object(_components_form__WEBPACK_IMPORTED_MODULE_0__["default"])();

/***/ }),

/***/ "./client/src/scss/main.scss":
/*!***********************************!*\
  !*** ./client/src/scss/main.scss ***!
  \***********************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ 0:
/*!*****************************************************************!*\
  !*** multi ./client/src/js/main.js ./client/src/scss/main.scss ***!
  \*****************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! /home/simonerkelens/Projects/policies/iso27001compliance/client/src/js/main.js */"./client/src/js/main.js");
module.exports = __webpack_require__(/*! /home/simonerkelens/Projects/policies/iso27001compliance/client/src/scss/main.scss */"./client/src/scss/main.scss");


/***/ })

/******/ });