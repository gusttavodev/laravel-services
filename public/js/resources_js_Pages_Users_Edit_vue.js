(self["webpackChunk"] = self["webpackChunk"] || []).push([["resources_js_Pages_Users_Edit_vue"],{

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/Users/Edit.vue?vue&type=script&lang=js&":
/*!************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/Users/Edit.vue?vue&type=script&lang=js& ***!
  \************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
Object(function webpackMissingModule() { var e = new Error("Cannot find module '@/Shared/Layout'"); e.code = 'MODULE_NOT_FOUND'; throw e; }());
Object(function webpackMissingModule() { var e = new Error("Cannot find module '@/Shared/TextInput'"); e.code = 'MODULE_NOT_FOUND'; throw e; }());
Object(function webpackMissingModule() { var e = new Error("Cannot find module '@/Shared/FileInput'"); e.code = 'MODULE_NOT_FOUND'; throw e; }());
Object(function webpackMissingModule() { var e = new Error("Cannot find module '@/Shared/SelectInput'"); e.code = 'MODULE_NOT_FOUND'; throw e; }());
Object(function webpackMissingModule() { var e = new Error("Cannot find module '@/Shared/LoadingButton'"); e.code = 'MODULE_NOT_FOUND'; throw e; }());
Object(function webpackMissingModule() { var e = new Error("Cannot find module '@/Shared/TrashedMessage'"); e.code = 'MODULE_NOT_FOUND'; throw e; }());
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






/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ({
  metaInfo: function metaInfo() {
    return {
      title: "".concat(this.form.first_name, " ").concat(this.form.last_name)
    };
  },
  components: {
    FileInput: Object(function webpackMissingModule() { var e = new Error("Cannot find module '@/Shared/FileInput'"); e.code = 'MODULE_NOT_FOUND'; throw e; }()),
    LoadingButton: Object(function webpackMissingModule() { var e = new Error("Cannot find module '@/Shared/LoadingButton'"); e.code = 'MODULE_NOT_FOUND'; throw e; }()),
    SelectInput: Object(function webpackMissingModule() { var e = new Error("Cannot find module '@/Shared/SelectInput'"); e.code = 'MODULE_NOT_FOUND'; throw e; }()),
    TextInput: Object(function webpackMissingModule() { var e = new Error("Cannot find module '@/Shared/TextInput'"); e.code = 'MODULE_NOT_FOUND'; throw e; }()),
    TrashedMessage: Object(function webpackMissingModule() { var e = new Error("Cannot find module '@/Shared/TrashedMessage'"); e.code = 'MODULE_NOT_FOUND'; throw e; }())
  },
  layout: Object(function webpackMissingModule() { var e = new Error("Cannot find module '@/Shared/Layout'"); e.code = 'MODULE_NOT_FOUND'; throw e; }()),
  props: {
    user: Object
  },
  remember: 'form',
  data: function data() {
    return {
      form: this.$inertia.form({
        _method: 'put',
        first_name: this.user.first_name,
        last_name: this.user.last_name,
        email: this.user.email,
        password: null,
        owner: this.user.owner,
        photo: null
      })
    };
  },
  methods: {
    update: function update() {
      var _this = this;

      this.form.post(this.route('users.update', this.user.id), {
        onSuccess: function onSuccess() {
          return _this.form.reset('password', 'photo');
        }
      });
    },
    destroy: function destroy() {
      if (confirm('Are you sure you want to delete this user?')) {
        this.$inertia["delete"](this.route('users.destroy', this.user.id));
      }
    },
    restore: function restore() {
      if (confirm('Are you sure you want to restore this user?')) {
        this.$inertia.put(this.route('users.restore', this.user.id));
      }
    }
  }
});

/***/ }),

/***/ "./resources/js/Pages/Users/Edit.vue":
/*!*******************************************!*\
  !*** ./resources/js/Pages/Users/Edit.vue ***!
  \*******************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _Edit_vue_vue_type_template_id_42efdfba___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Edit.vue?vue&type=template&id=42efdfba& */ "./resources/js/Pages/Users/Edit.vue?vue&type=template&id=42efdfba&");
/* harmony import */ var _Edit_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Edit.vue?vue&type=script&lang=js& */ "./resources/js/Pages/Users/Edit.vue?vue&type=script&lang=js&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! !../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */
;
var component = (0,_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__.default)(
  _Edit_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__.default,
  _Edit_vue_vue_type_template_id_42efdfba___WEBPACK_IMPORTED_MODULE_0__.render,
  _Edit_vue_vue_type_template_id_42efdfba___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns,
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/Pages/Users/Edit.vue"
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (component.exports);

/***/ }),

/***/ "./resources/js/Pages/Users/Edit.vue?vue&type=script&lang=js&":
/*!********************************************************************!*\
  !*** ./resources/js/Pages/Users/Edit.vue?vue&type=script&lang=js& ***!
  \********************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Edit_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./Edit.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/Users/Edit.vue?vue&type=script&lang=js&");
 /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (_node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Edit_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__.default); 

/***/ }),

/***/ "./resources/js/Pages/Users/Edit.vue?vue&type=template&id=42efdfba&":
/*!**************************************************************************!*\
  !*** ./resources/js/Pages/Users/Edit.vue?vue&type=template&id=42efdfba& ***!
  \**************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Edit_vue_vue_type_template_id_42efdfba___WEBPACK_IMPORTED_MODULE_0__.render),
/* harmony export */   "staticRenderFns": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Edit_vue_vue_type_template_id_42efdfba___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns)
/* harmony export */ });
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Edit_vue_vue_type_template_id_42efdfba___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./Edit.vue?vue&type=template&id=42efdfba& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/Users/Edit.vue?vue&type=template&id=42efdfba&");


/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/Users/Edit.vue?vue&type=template&id=42efdfba&":
/*!*****************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/Users/Edit.vue?vue&type=template&id=42efdfba& ***!
  \*****************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* binding */ render),
/* harmony export */   "staticRenderFns": () => (/* binding */ staticRenderFns)
/* harmony export */ });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "div",
    [
      _c("div", { staticClass: "mb-8 flex justify-start max-w-3xl" }, [
        _c(
          "h1",
          { staticClass: "font-bold text-3xl" },
          [
            _c(
              "inertia-link",
              {
                staticClass: "text-indigo-400 hover:text-indigo-600",
                attrs: { href: _vm.route("users") }
              },
              [_vm._v("Users")]
            ),
            _vm._v(" "),
            _c("span", { staticClass: "text-indigo-400 font-medium" }, [
              _vm._v("/")
            ]),
            _vm._v(
              "\n      " +
                _vm._s(_vm.form.first_name) +
                " " +
                _vm._s(_vm.form.last_name) +
                "\n    "
            )
          ],
          1
        ),
        _vm._v(" "),
        _vm.user.photo
          ? _c("img", {
              staticClass: "block w-8 h-8 rounded-full ml-4",
              attrs: { src: _vm.user.photo }
            })
          : _vm._e()
      ]),
      _vm._v(" "),
      _vm.user.deleted_at
        ? _c(
            "trashed-message",
            { staticClass: "mb-6", on: { restore: _vm.restore } },
            [_vm._v("\n    This user has been deleted.\n  ")]
          )
        : _vm._e(),
      _vm._v(" "),
      _c(
        "div",
        { staticClass: "bg-white rounded-md shadow overflow-hidden max-w-3xl" },
        [
          _c(
            "form",
            {
              on: {
                submit: function($event) {
                  $event.preventDefault()
                  return _vm.update($event)
                }
              }
            },
            [
              _c(
                "div",
                { staticClass: "p-8 -mr-6 -mb-8 flex flex-wrap" },
                [
                  _c("text-input", {
                    staticClass: "pr-6 pb-8 w-full lg:w-1/2",
                    attrs: {
                      error: _vm.form.errors.first_name,
                      label: "First name"
                    },
                    model: {
                      value: _vm.form.first_name,
                      callback: function($$v) {
                        _vm.$set(_vm.form, "first_name", $$v)
                      },
                      expression: "form.first_name"
                    }
                  }),
                  _vm._v(" "),
                  _c("text-input", {
                    staticClass: "pr-6 pb-8 w-full lg:w-1/2",
                    attrs: {
                      error: _vm.form.errors.last_name,
                      label: "Last name"
                    },
                    model: {
                      value: _vm.form.last_name,
                      callback: function($$v) {
                        _vm.$set(_vm.form, "last_name", $$v)
                      },
                      expression: "form.last_name"
                    }
                  }),
                  _vm._v(" "),
                  _c("text-input", {
                    staticClass: "pr-6 pb-8 w-full lg:w-1/2",
                    attrs: { error: _vm.form.errors.email, label: "Email" },
                    model: {
                      value: _vm.form.email,
                      callback: function($$v) {
                        _vm.$set(_vm.form, "email", $$v)
                      },
                      expression: "form.email"
                    }
                  }),
                  _vm._v(" "),
                  _c("text-input", {
                    staticClass: "pr-6 pb-8 w-full lg:w-1/2",
                    attrs: {
                      error: _vm.form.errors.password,
                      type: "password",
                      autocomplete: "new-password",
                      label: "Password"
                    },
                    model: {
                      value: _vm.form.password,
                      callback: function($$v) {
                        _vm.$set(_vm.form, "password", $$v)
                      },
                      expression: "form.password"
                    }
                  }),
                  _vm._v(" "),
                  _c(
                    "select-input",
                    {
                      staticClass: "pr-6 pb-8 w-full lg:w-1/2",
                      attrs: { error: _vm.form.errors.owner, label: "Owner" },
                      model: {
                        value: _vm.form.owner,
                        callback: function($$v) {
                          _vm.$set(_vm.form, "owner", $$v)
                        },
                        expression: "form.owner"
                      }
                    },
                    [
                      _c("option", { domProps: { value: true } }, [
                        _vm._v("Yes")
                      ]),
                      _vm._v(" "),
                      _c("option", { domProps: { value: false } }, [
                        _vm._v("No")
                      ])
                    ]
                  ),
                  _vm._v(" "),
                  _c("file-input", {
                    staticClass: "pr-6 pb-8 w-full lg:w-1/2",
                    attrs: {
                      error: _vm.form.errors.photo,
                      type: "file",
                      accept: "image/*",
                      label: "Photo"
                    },
                    model: {
                      value: _vm.form.photo,
                      callback: function($$v) {
                        _vm.$set(_vm.form, "photo", $$v)
                      },
                      expression: "form.photo"
                    }
                  })
                ],
                1
              ),
              _vm._v(" "),
              _c(
                "div",
                {
                  staticClass:
                    "px-8 py-4 bg-gray-50 border-t border-gray-100 flex items-center"
                },
                [
                  !_vm.user.deleted_at
                    ? _c(
                        "button",
                        {
                          staticClass: "text-red-600 hover:underline",
                          attrs: { tabindex: "-1", type: "button" },
                          on: { click: _vm.destroy }
                        },
                        [_vm._v("Delete User")]
                      )
                    : _vm._e(),
                  _vm._v(" "),
                  _c(
                    "loading-button",
                    {
                      staticClass: "btn-indigo ml-auto",
                      attrs: { loading: _vm.form.processing, type: "submit" }
                    },
                    [_vm._v("Update User")]
                  )
                ],
                1
              )
            ]
          )
        ]
      )
    ],
    1
  )
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js":
/*!********************************************************************!*\
  !*** ./node_modules/vue-loader/lib/runtime/componentNormalizer.js ***!
  \********************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* binding */ normalizeComponent)
/* harmony export */ });
/* globals __VUE_SSR_CONTEXT__ */

// IMPORTANT: Do NOT use ES2015 features in this file (except for modules).
// This module is a runtime utility for cleaner component module output and will
// be included in the final webpack user bundle.

function normalizeComponent (
  scriptExports,
  render,
  staticRenderFns,
  functionalTemplate,
  injectStyles,
  scopeId,
  moduleIdentifier, /* server only */
  shadowMode /* vue-cli only */
) {
  // Vue.extend constructor export interop
  var options = typeof scriptExports === 'function'
    ? scriptExports.options
    : scriptExports

  // render functions
  if (render) {
    options.render = render
    options.staticRenderFns = staticRenderFns
    options._compiled = true
  }

  // functional template
  if (functionalTemplate) {
    options.functional = true
  }

  // scopedId
  if (scopeId) {
    options._scopeId = 'data-v-' + scopeId
  }

  var hook
  if (moduleIdentifier) { // server build
    hook = function (context) {
      // 2.3 injection
      context =
        context || // cached call
        (this.$vnode && this.$vnode.ssrContext) || // stateful
        (this.parent && this.parent.$vnode && this.parent.$vnode.ssrContext) // functional
      // 2.2 with runInNewContext: true
      if (!context && typeof __VUE_SSR_CONTEXT__ !== 'undefined') {
        context = __VUE_SSR_CONTEXT__
      }
      // inject component styles
      if (injectStyles) {
        injectStyles.call(this, context)
      }
      // register component module identifier for async chunk inferrence
      if (context && context._registeredComponents) {
        context._registeredComponents.add(moduleIdentifier)
      }
    }
    // used by ssr in case component is cached and beforeCreate
    // never gets called
    options._ssrRegister = hook
  } else if (injectStyles) {
    hook = shadowMode
      ? function () {
        injectStyles.call(
          this,
          (options.functional ? this.parent : this).$root.$options.shadowRoot
        )
      }
      : injectStyles
  }

  if (hook) {
    if (options.functional) {
      // for template-only hot-reload because in that case the render fn doesn't
      // go through the normalizer
      options._injectStyles = hook
      // register for functional component in vue file
      var originalRender = options.render
      options.render = function renderWithStyleInjection (h, context) {
        hook.call(context)
        return originalRender(h, context)
      }
    } else {
      // inject component registration as beforeCreate hook
      var existing = options.beforeCreate
      options.beforeCreate = existing
        ? [].concat(existing, hook)
        : [hook]
    }
  }

  return {
    exports: scriptExports,
    options: options
  }
}


/***/ })

}]);