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
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
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
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 52);
/******/ })
/************************************************************************/
/******/ ({

/***/ 52:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(8);


/***/ }),

/***/ 8:
/***/ (function(module, exports) {

var editor; // use a global for the submit and return data rendering in the examples

$(document).ready(function () {
    editor = new $.fn.datatables() - editor.Editor({
        ajax: "../resources/views/admin/patrimonies/list.blade.php",
        table: "#patrimonies",
        fields: [{
            label: "Status:",
            name: "Status"
        }, {
            label: "Nome:",
            name: "Nome"
        }, {
            label: "Categoria:",
            name: "Categoria"
        }, {
            label: "Modelo:",
            name: "Modelo"
        }, {
            label: "Numero de Série:",
            name: "Numero_de_serie"
        }, {
            label: "Numero de Patrimonio:",
            name: "Numero_de_Patrimonio"
        }, {
            label: "Descrição:",
            name: "Descricao"
        }, {
            label: "Local:",
            name: "local"
        }, {
            label: "Setor:",
            name: "Setor"
        }]
    });

    $('#example').DataTable({
        dom: 'Bfrlip',
        ajax: "../resources/views/admin/patrimonies/list.blade.php",
        columns: [{ data: "Status" }, { data: "Nome" }, { data: "Categoria" }, { data: "Modelo" }, { data: "Numero_de_serie" }, { data: "Numero_de_Patrimonio" }, { data: "Descricao" }, { data: "local" }, { data: "Setor" }],
        select: true,
        buttons: [{
            extend: 'collection',
            text: 'Export',
            buttons: ['copy', 'excel', 'csv', 'pdf', 'print']
        }]
    });
});

$('#quantity').on('change', function () {
    if (jQuery(this).val() > 1 && jQuery('.finalNumber').length === 0) {
        var finalNumber = Number(jQuery(this).val()) + Number(jQuery('#InitialNumber').val());
        jQuery('.patrimonyNumbers').append('<div class="form-group finalNumber"><label for="description">Número de Patrimônio Final</label><input type="text" class="form-control" name="patrimonyNumberFinal" placeholder="Número de Patrimônio Final" required="" id="FinalNumber" value="' + finalNumber + '"></div>');
        jQuery('.finalNumber').fadeIn();
    } else if (jQuery(this).val() == 1 && jQuery('.finalNumber').length > 0) {
        jQuery('.finalNumber').fadeOut();
        var b = document.getElementsByClassName('finalNumber');
        var a = document.getElementByClassName('patrimonyNumbers');
        a[0].removeChild(b[0]);
    } else if (jQuery(this).val() > 1 && jQuery('.finalNumber').length !== 0) {
        jQuery('#FinalNumber').attr('value', Number(jQuery(this).val()) + Number(jQuery('#InitialNumber').val()));
    }
});

/***/ })

/******/ });