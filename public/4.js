(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[4],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/investor/email/mailtemplate/CreateComponent.vue?vue&type=script&lang=js&":
/*!******************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/investor/email/mailtemplate/CreateComponent.vue?vue&type=script&lang=js& ***!
  \******************************************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _Sample_json__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./../Sample.json */ "./resources/js/components/investor/email/Sample.json");
var _Sample_json__WEBPACK_IMPORTED_MODULE_0___namespace = /*#__PURE__*/__webpack_require__.t(/*! ./../Sample.json */ "./resources/js/components/investor/email/Sample.json", 1);
/* harmony import */ var html2canvas__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! html2canvas */ "./node_modules/html2canvas/dist/html2canvas.js");
/* harmony import */ var html2canvas__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(html2canvas__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js");
/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(jquery__WEBPACK_IMPORTED_MODULE_2__);
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//



/* harmony default export */ __webpack_exports__["default"] = ({
  data: function data() {
    return {
      dialog: false,
      form: {},
      loading: false
    };
  },
  mounted: function mounted() {},
  methods: {
    store: function store() {},
    editorLoaded: function editorLoaded() {
      this.$refs.editor.loadDesign(_Sample_json__WEBPACK_IMPORTED_MODULE_0__);
    },
    saveDesign: function saveDesign() {
      this.$refs.editor.saveDesign(function (design) {
        console.log("saveDesign", design);
      });
    },
    exportHtml: function exportHtml() {
      var _this = this;

      this.loading = true;
      this.$refs.editor.exportHtml(function (data) {
        // console.log("exportHtml", data);
        // $('#review').html(data.html)
        // html2canvas(document.getElementById('review')).then(function(canvas) {
        //     // document.getElementById('review').appendChild(canvas);
        //     // console.log(document.getElementById('review'),canvas)
        // });
        var access = {
          title: _this.form.title,
          subject: _this.form.subject,
          body: data.html
        };

        _this.$store.dispatch("MailTemplate/store", access).then(function (res) {})["finally"](function () {
          return _this.loading = _this.dialog = false;
        });
      });
    }
  }
});

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/investor/email/mailtemplate/CreateComponent.vue?vue&type=template&id=4d737b52&":
/*!**********************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/investor/email/mailtemplate/CreateComponent.vue?vue&type=template&id=4d737b52& ***!
  \**********************************************************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "div",
    [
      _c(
        "v-dialog",
        {
          attrs: { width: "80vw" },
          scopedSlots: _vm._u([
            {
              key: "activator",
              fn: function(ref) {
                var on = ref.on
                return [
                  _c("v-btn", _vm._g({ attrs: { text: "" } }, on), [
                    _vm._v("\n                Create\n            ")
                  ])
                ]
              }
            }
          ]),
          model: {
            value: _vm.dialog,
            callback: function($$v) {
              _vm.dialog = $$v
            },
            expression: "dialog"
          }
        },
        [
          _vm._v(" "),
          _c(
            "v-card",
            [
              _c(
                "v-card-title",
                { attrs: { "primary-title": "" } },
                [
                  _vm._v("\n                Form\n                "),
                  _c("v-spacer"),
                  _vm._v(" "),
                  _c(
                    "v-btn",
                    {
                      attrs: {
                        text: "",
                        loading: _vm.loading,
                        disabled: _vm.loading
                      },
                      on: {
                        click: function($event) {
                          return _vm.exportHtml()
                        }
                      }
                    },
                    [_vm._v("Submit")]
                  )
                ],
                1
              ),
              _vm._v(" "),
              _c(
                "v-card-text",
                [
                  _c(
                    "v-row",
                    [
                      _c(
                        "v-col",
                        { attrs: { cols: "12" } },
                        [
                          _c(
                            "v-form",
                            { ref: "form", attrs: { "lazy-validation": "" } },
                            [
                              _c(
                                "v-row",
                                [
                                  _c("v-text-field", {
                                    attrs: { label: "title" },
                                    model: {
                                      value: _vm.form.title,
                                      callback: function($$v) {
                                        _vm.$set(_vm.form, "title", $$v)
                                      },
                                      expression: "form.title"
                                    }
                                  })
                                ],
                                1
                              ),
                              _vm._v(" "),
                              _c(
                                "v-row",
                                [
                                  _c("v-text-field", {
                                    attrs: { label: "subject" },
                                    model: {
                                      value: _vm.form.subject,
                                      callback: function($$v) {
                                        _vm.$set(_vm.form, "subject", $$v)
                                      },
                                      expression: "form.subject"
                                    }
                                  })
                                ],
                                1
                              ),
                              _vm._v(" "),
                              _c(
                                "v-row",
                                [
                                  _c("EmailEditor", {
                                    ref: "editor",
                                    staticStyle: {
                                      width: "100%",
                                      "min-height": "80vh"
                                    },
                                    on: { load: _vm.editorLoaded }
                                  })
                                ],
                                1
                              )
                            ],
                            1
                          )
                        ],
                        1
                      ),
                      _vm._v(" "),
                      _c("v-col", { attrs: { cols: "12" } }, [
                        _c("div", {
                          directives: [
                            {
                              name: "show",
                              rawName: "v-show",
                              value: false,
                              expression: "false"
                            }
                          ],
                          attrs: { id: "review" }
                        })
                      ])
                    ],
                    1
                  )
                ],
                1
              ),
              _vm._v(" "),
              _c("v-divider")
            ],
            1
          )
        ],
        1
      )
    ],
    1
  )
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./resources/js/components/investor/email/mailtemplate/CreateComponent.vue":
/*!*********************************************************************************!*\
  !*** ./resources/js/components/investor/email/mailtemplate/CreateComponent.vue ***!
  \*********************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _CreateComponent_vue_vue_type_template_id_4d737b52___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./CreateComponent.vue?vue&type=template&id=4d737b52& */ "./resources/js/components/investor/email/mailtemplate/CreateComponent.vue?vue&type=template&id=4d737b52&");
/* harmony import */ var _CreateComponent_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./CreateComponent.vue?vue&type=script&lang=js& */ "./resources/js/components/investor/email/mailtemplate/CreateComponent.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _CreateComponent_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _CreateComponent_vue_vue_type_template_id_4d737b52___WEBPACK_IMPORTED_MODULE_0__["render"],
  _CreateComponent_vue_vue_type_template_id_4d737b52___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/investor/email/mailtemplate/CreateComponent.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/investor/email/mailtemplate/CreateComponent.vue?vue&type=script&lang=js&":
/*!**********************************************************************************************************!*\
  !*** ./resources/js/components/investor/email/mailtemplate/CreateComponent.vue?vue&type=script&lang=js& ***!
  \**********************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_CreateComponent_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../../node_modules/babel-loader/lib??ref--4-0!../../../../../../node_modules/vue-loader/lib??vue-loader-options!./CreateComponent.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/investor/email/mailtemplate/CreateComponent.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_CreateComponent_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/investor/email/mailtemplate/CreateComponent.vue?vue&type=template&id=4d737b52&":
/*!****************************************************************************************************************!*\
  !*** ./resources/js/components/investor/email/mailtemplate/CreateComponent.vue?vue&type=template&id=4d737b52& ***!
  \****************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_CreateComponent_vue_vue_type_template_id_4d737b52___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../../node_modules/vue-loader/lib??vue-loader-options!./CreateComponent.vue?vue&type=template&id=4d737b52& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/investor/email/mailtemplate/CreateComponent.vue?vue&type=template&id=4d737b52&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_CreateComponent_vue_vue_type_template_id_4d737b52___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_CreateComponent_vue_vue_type_template_id_4d737b52___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);