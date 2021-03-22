/**
 * Supply a Marketo form and have it stripped of all it’s style/css classes.
 * Allows us to style the forms without using !important css rules, and is generally
 * easier to manage.
 *
 * API https://developers.marketo.com/javascript-api/forms/api-reference/
 *
 * @param {Element | JQuery Object} formElement form to scrub
 * @param {Object} MktoForms2 The MktoForms2 object is the top-level publicly visible namespace for Forms2 functionality and contains functions to create, load, and fetch Form objects.
 * @param {Object} form The current form object
 */
window.removeMarketoStyles = function (formElement, MktoForms2, form) {
	/**
	 * For browsers that do not support Element.closest(),
	 * but carry support for element.matches() (or a prefixed equivalent, meaning IE9+),   a polyfill exists:
	 */
	if (!Element.prototype.matches) {
		Element.prototype.matches =
			Element.prototype.msMatchesSelector ||
			Element.prototype.webkitMatchesSelector;
	}

	if (!Element.prototype.closest) {
		Element.prototype.closest = function (s) {
			var el = this;

			do {
				if (Element.prototype.matches.call(el, s)) return el;
				el = el.parentElement || el.parentNode;
			} while (el !== null && el.nodeType === 1);
			return null;
		};
	}

	/**
	 * If formElement is a jquery object, get the the native API element from within
	 */
	if (!!formElement.jquery) {
		formElement = formElement[0];
	}

	/**
	 * Check the inputted email to make sure it is a valid email address,
	 * and then that it is not a standard email server to prevent civilians from
	 * getting into our marketing database.
	 *
	 * @param {String} email
	 */
	function isInvalidDomain(email) {
		var INVALID_DOMAINS = [
			"@gmail.",
			"@gmx.",
			"@bluewin.",
			"@yahoo.",
			"@hotmail.",
			"@live.",
			"@aol.",
			"@outlook.",
			"@web.de",
		];
		
		while (INVALID_DOMAINS.length) {
			var domain = INVALID_DOMAINS.pop().toLowerCase();
			if (email.toLowerCase().indexOf(domain) != -1) {
				return true;
			}
		}
		return false;
	}

	/**
	 * Check the inputted email to make sure it is a valid email address,
	 * and then that it is not a standard email server to prevent civilians from
	 * getting into our marketing database.
	 *
	 * @param {Object} form Marketo form
	 * @param {String} email Email input field
	 */
	function validateEmail(form, email) {
		if (email.indexOf("@") !== -1) {
			if (isInvalidDomain(email)) {
				form.submitable(false);
				var emailElem = form.getFormElem().find("#Email");
				form.showErrorMessage(
					"Please use your business email.",
					emailElem
				);
			} else {
				form.submitable(true);
			}
		}
	}

	function removeStyles() {
		var i, l;

		/**
		 * remove <style> elements injected intot he form by marketo
		 */
		var styleElements = formElement.querySelectorAll("style");
		for (i = 0, l = styleElements.length; i < l; i++) {
			var se = styleElements[i];
			se.parentNode.removeChild(se);
		}

		/**
		 * Remove the inline styles from marketo forms
		 */
		formElement.removeAttribute("style");
		var pontentiallyStyledElements = formElement.querySelectorAll(
			".mktoForm, .mktoOffset, .mktoError, .mktoErrorDetail, .mktoErrorMsg, .mktoHasWidth, input, textarea, .mktoLabel, .mktoFormCol, .mktoButtonWrap, .mktoRequired"
		);
		for (i = 0, l = pontentiallyStyledElements.length; i < l; i++) {
			pontentiallyStyledElements[i].removeAttribute("style");
		}

		/**
		 * Generate a class for the containing row for every input.
		 * This makes it easy to target rows that need be 50% width or otherwise repsonsive.
		 */
		var allInputs = formElement.querySelectorAll("input, select, textarea");
		for (i = 0, l = allInputs.length; i < l; i++) {
			var input = allInputs[i];
			var id = input.getAttribute("id");
			var mktoFormRow = input.closest(".mktoFormRow");
			if (mktoFormRow) {
				if (id) {
					mktoFormRow.classList.add("row" + id);
					mktoFormRow.setAttribute("id", id + "row");
				} else {
					mktoFormRow.classList.add("hide");
				}
			}

			/**
			 * Add some info the parent node about the type of input inside
			 * Used initially for targeting <select> fields to add custom arrows
			 */
			input.parentNode.classList.add("mkto" + input.tagName);
		}
	}

	//then cut the head off the snake...
	//remove the top level class all the marketo styling become ineffective.
	document.querySelector(".mktoForm").classList.remove("mktoForm");

	if (MktoForms2) {
		/**
		 *
		 */
		MktoForms2.whenReady(function (form) {
			var emailField = document.querySelector("[type=email]");

			emailField.addEventListener("blur", function () {
				validateEmail(form, emailField.value);
			});

			form.onValidate(function () {
				validateEmail(form, emailField.value);
			});
		});

		/**
		 * onFormRender fires on load, and also anytime new elements are appended
		 * to the form.
		 *
		 * There is a pattern with our Marketo forms where on completing one
		 * select field, another select field with follow up information is appended
		 * to the page. This looks for new select fields, and then re runs the removeStyles
		 * function.
		 *
		 * That means it loops over all the elements again, which is not precise, but
		 * speed shouldn't a problem.
		 *
		 * To see in action, check almost any form within mendix.com/resources/
		 * (https://mendixrebrand.local/resources/low-code-value-handbook/)
		 * And choose an "area of focus"—which fires on the onFormRender function—
		 * to reveal the "job role" select field
		 */
		MktoForms2.onFormRender(removeStyles);
	}

	/**
	 * for forms following a pen-and-paper style form, with the label inside a
	 * box along with the input, this allows a person to click anywhere within the box
	 * and have the input become active (for typing, etc.)
	 */
	var inputContainers = document.querySelectorAll(".mktoRequiredField");
	for (var i = inputContainers.length - 1; i >= 0; i--) {
		inputContainers[i].addEventListener("click", function (e) {
			var nodeList = e.target.querySelectorAll("input, select, textarea");
			if (nodeList.length) {
				nodeList[0].focus();
			}
		});
	}
};
