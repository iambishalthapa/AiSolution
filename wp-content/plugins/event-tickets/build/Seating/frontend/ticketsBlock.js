/******/ (function(modules) { // webpackBootstrap
/******/ 	// install a JSONP callback for chunk loading
/******/ 	function webpackJsonpCallback(data) {
/******/ 		var chunkIds = data[0];
/******/ 		var moreModules = data[1];
/******/ 		var executeModules = data[2];
/******/
/******/ 		// add "moreModules" to the modules object,
/******/ 		// then flag all "chunkIds" as loaded and fire callback
/******/ 		var moduleId, chunkId, i = 0, resolves = [];
/******/ 		for(;i < chunkIds.length; i++) {
/******/ 			chunkId = chunkIds[i];
/******/ 			if(Object.prototype.hasOwnProperty.call(installedChunks, chunkId) && installedChunks[chunkId]) {
/******/ 				resolves.push(installedChunks[chunkId][0]);
/******/ 			}
/******/ 			installedChunks[chunkId] = 0;
/******/ 		}
/******/ 		for(moduleId in moreModules) {
/******/ 			if(Object.prototype.hasOwnProperty.call(moreModules, moduleId)) {
/******/ 				modules[moduleId] = moreModules[moduleId];
/******/ 			}
/******/ 		}
/******/ 		if(parentJsonpFunction) parentJsonpFunction(data);
/******/
/******/ 		while(resolves.length) {
/******/ 			resolves.shift()();
/******/ 		}
/******/
/******/ 		// add entry modules from loaded chunk to deferred list
/******/ 		deferredModules.push.apply(deferredModules, executeModules || []);
/******/
/******/ 		// run deferred modules when all chunks ready
/******/ 		return checkDeferredModules();
/******/ 	};
/******/ 	function checkDeferredModules() {
/******/ 		var result;
/******/ 		for(var i = 0; i < deferredModules.length; i++) {
/******/ 			var deferredModule = deferredModules[i];
/******/ 			var fulfilled = true;
/******/ 			for(var j = 1; j < deferredModule.length; j++) {
/******/ 				var depId = deferredModule[j];
/******/ 				if(installedChunks[depId] !== 0) fulfilled = false;
/******/ 			}
/******/ 			if(fulfilled) {
/******/ 				deferredModules.splice(i--, 1);
/******/ 				result = __webpack_require__(__webpack_require__.s = deferredModule[0]);
/******/ 			}
/******/ 		}
/******/
/******/ 		return result;
/******/ 	}
/******/
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// object to store loaded and loading chunks
/******/ 	// undefined = chunk not loaded, null = chunk preloaded/prefetched
/******/ 	// Promise = chunk loading, 0 = chunk loaded
/******/ 	var installedChunks = {
/******/ 		9: 0
/******/ 	};
/******/
/******/ 	var deferredModules = [];
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
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
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
/******/ 	__webpack_require__.p = "";
/******/
/******/ 	var jsonpArray = window["webpackJsonp"] = window["webpackJsonp"] || [];
/******/ 	var oldJsonpFunction = jsonpArray.push.bind(jsonpArray);
/******/ 	jsonpArray.push = webpackJsonpCallback;
/******/ 	jsonpArray = jsonpArray.slice();
/******/ 	for(var i = 0; i < jsonpArray.length; i++) webpackJsonpCallback(jsonpArray[i]);
/******/ 	var parentJsonpFunction = oldJsonpFunction;
/******/
/******/
/******/ 	// add entry module to deferred list
/******/ 	deferredModules.push(["jL1e",0]);
/******/ 	// run deferred modules when ready
/******/ 	return checkDeferredModules();
/******/ })
/************************************************************************/
/******/ ({

/***/ "3Fbz":
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

/***/ }),

/***/ "Almt":
/***/ (function(module, exports) {

module.exports = tec.tickets.seating.currency;

/***/ }),

/***/ "KO+N":
/***/ (function(module, exports) {

module.exports = tec.tickets.seating.frontend.session;

/***/ }),

/***/ "MsaN":
/***/ (function(module, exports) {

module.exports = tec.tickets.seating.utils;

/***/ }),

/***/ "g56x":
/***/ (function(module, exports) {

module.exports = wp.hooks;

/***/ }),

/***/ "jL1e":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
// ESM COMPAT FLAG
__webpack_require__.r(__webpack_exports__);

// EXPORTS
__webpack_require__.d(__webpack_exports__, "bootstrapIframe", function() { return /* binding */ bootstrapIframe; });
__webpack_require__.d(__webpack_exports__, "cancelReservations", function() { return /* binding */ cancelReservations; });
__webpack_require__.d(__webpack_exports__, "closeModal", function() { return /* binding */ closeModal; });
__webpack_require__.d(__webpack_exports__, "addModalEventListeners", function() { return /* binding */ addModalEventListeners; });

// EXTERNAL MODULE: ./node_modules/@babel/runtime/helpers/defineProperty.js
var defineProperty = __webpack_require__("lSNA");
var defineProperty_default = /*#__PURE__*/__webpack_require__.n(defineProperty);

// EXTERNAL MODULE: ./node_modules/@babel/runtime/helpers/asyncToGenerator.js
var asyncToGenerator = __webpack_require__("yXPU");
var asyncToGenerator_default = /*#__PURE__*/__webpack_require__.n(asyncToGenerator);

// EXTERNAL MODULE: ./src/Tickets/Seating/app/frontend/ticketsBlock/style.pcss
var style = __webpack_require__("3Fbz");

// EXTERNAL MODULE: external "tec.tickets.seating.service.iframe"
var external_tec_tickets_seating_service_iframe_ = __webpack_require__("pJv/");

// EXTERNAL MODULE: external "tec.tickets.seating.service.api"
var external_tec_tickets_seating_service_api_ = __webpack_require__("wRIV");

// EXTERNAL MODULE: external "tec.tickets.seating.utils"
var external_tec_tickets_seating_utils_ = __webpack_require__("MsaN");

// CONCATENATED MODULE: ./src/Tickets/Seating/app/frontend/ticketsBlock/ticket-row.js


/**
 * @typedef {Object} TicketRowProps
 * @property {string} seatTypeId     The seat type ID.
 * @property {string} ticketId       The ticket ID.
 * @property {number} price          The price of the ticket in the provider currency.
 * @property {string} color          The color of the seat type, valid CSS color, e.g. "#d02697".
 * @property {string} ticketName     The name of the ticket, e.g. "VIP".
 * @property {string} seatLabel      The label of the seat, e.g. "C7".
 * @property {string} formattedPrice The formatted price of the ticket, e.g. "$40.00".
 */

/**
 * Create a Ticket Row component for the Seat Selection modal ticket block.
 *
 * @since 5.16.0
 *
 * @param {TicketRowProps} props The props for the Ticket Row component.
 *
 * @return {HTMLElement} The HTML element for the Ticket Row component.
 */
function TicketRow(props) {
  return Object(external_tec_tickets_seating_utils_["createHtmlComponentFromTemplateString"])(`<div class="tec-tickets-seating__ticket-row"
			data-seat-type-id="{seatTypeId}"
			data-ticket-id="{ticketId}"
			data-price="{price}"
			data-seat-label="{seatLabel}"
			>
			<div class="tec-tickets-seating__seat-color" style="background: {color}"></div>

			<div class="tec-tickets-seating__label">
				<div class="tec-tickets-seating__ticket-name">{ticketName}</div>
				<div class="tec-tickets-seating__seat-label">{seatLabel}</div>
			</div>

			<div class="tec-tickets-seating__ticket-price">{formattedPrice}</div>
		</div>`, props);
}
// CONCATENATED MODULE: ./src/Tickets/Seating/app/frontend/ticketsBlock/localized-data.js
var _window, _window$tec, _window$tec$tickets, _window$tec$tickets$s, _window$tec$tickets$s2;
/**
 * @typedef {Object} SeatMapTicketEntry
 * @property {string}                ticketId                   The ticket ID.
 * @property {string}                name                       The ticket name.
 * @property {number}                price                      The ticket price.
 * @property {string}                description                The ticket description.
 *
 * @typedef {Object} SeatTypeMap
 * @property {string}                id                         The seat type ID.
 * @property {SeatMapTicketEntry[]}  tickets                    The list of tickets for the seat type.
 *
 * @typedef {Object} TicketBlockExternals
 * @property {string}                objectName                 The key to fetch the modal dialog from the window object.
 * @property {SeatTypeMap[]}         seatTypeMap                The map of seat types
 * @property {Object<string,string>} labels                     The labels for the seat types.
 * @property {string}                providerClass              The provider class.
 * @property {number}                postId                     The post ID.
 * @property {string}                ajaxUrl                    The URL to the service ajax endpoint.
 * @property {string}                ajaxNonce                  The AJAX nonce.
 * @property {string}                ACTION_POST_RESERVATIONS   The AJAX action to post the reservations to the backend.
 * @property {string}                ACTION_CLEAR_RESERVATIONS  The AJAX action to clear the reservations from the backend.
 */

/**
 *
 * @type {TicketBlockExternals}
 */
const localizedData = (_window = window) === null || _window === void 0 ? void 0 : (_window$tec = _window.tec) === null || _window$tec === void 0 ? void 0 : (_window$tec$tickets = _window$tec.tickets) === null || _window$tec$tickets === void 0 ? void 0 : (_window$tec$tickets$s = _window$tec$tickets.seating) === null || _window$tec$tickets$s === void 0 ? void 0 : (_window$tec$tickets$s2 = _window$tec$tickets$s.frontend) === null || _window$tec$tickets$s2 === void 0 ? void 0 : _window$tec$tickets$s2.ticketsBlock;
// EXTERNAL MODULE: external "tec.tickets.seating.currency"
var external_tec_tickets_seating_currency_ = __webpack_require__("Almt");

// EXTERNAL MODULE: external "wp.hooks"
var external_wp_hooks_ = __webpack_require__("g56x");

// EXTERNAL MODULE: external "tec.tickets.seating.frontend.session"
var external_tec_tickets_seating_frontend_session_ = __webpack_require__("KO+N");

// CONCATENATED MODULE: ./src/Tickets/Seating/app/frontend/ticketsBlock/checkout-handlers.js




/**
 * Checks out a ticket using the Tickets Commerce module.
 * This is the default checkout handler for the Tickets Commerce in the context of the Tickets Seating feature.
 * This method call the backend to get the redirection URL with the cart data.
 *
 * @since 5.16.0
 *
 * @param {FormData} data The data to send to the Tickets Commerce checkout page.
 *
 * @return {Promise<boolean>} A promise that resolves to `true` if the checkout was successful, `false` otherwise.
 */
function checkoutWithTicketsCommerce(_x) {
  return _checkoutWithTicketsCommerce.apply(this, arguments);
}

/**
 * Returns the checkout handler for a given provider.
 * This function filters the checkout handler for a given provider in the context of the Tickets Seating feature.
 *
 * @since 5.16.0
 *
 * @param {string} provider The provider to get the checkout handler for.
 *
 * @return {Function|null} The checkout handler for the provider, or `null` if none is found.
 */
function _checkoutWithTicketsCommerce() {
  _checkoutWithTicketsCommerce = asyncToGenerator_default()(function* (data) {
    const searchParams = new URLSearchParams(window.location.search);
    searchParams.append('tec-tc-cart', 'redirect');
    const cartUrl = `${window.location.origin}${window.location.pathname}?${searchParams}`;

    // Call the backend to get the redirection URL with the cart data.
    const response = yield fetch(cartUrl, {
      method: 'POST',
      body: data
    });
    if (response.ok && response.url) {
      // We're going to leave the page: this should not interrupt the timer and clear the session.
      Object(external_tec_tickets_seating_frontend_session_["setIsInterruptable"])(false);

      // We got a Checkout page URL back: redirect to it.
      window.location.href = response.url;

      // This return value might never be used, due to the previous redirection, but it's here to make the linter happy.
      return true;
    }
    return false;
  });
  return _checkoutWithTicketsCommerce.apply(this, arguments);
}
function getCheckoutHandlerForProvider(provider) {
  let checkoutHandler;
  switch (provider) {
    case 'TECTicketsCommerceModule':
    case 'TEC\\Tickets\\Commerce\\Module':
      checkoutHandler = checkoutWithTicketsCommerce;
      break;
    default:
      checkoutHandler = null;
      break;
  }

  /**
   * Filters the checkout handler for a given provider in the context of the Tickets Seating feature..
   *
   * @since 5.16.0
   *
   * @param {Function|null} checkoutHandler The checkout handler for the provider.
   * @param {string}        provider        The provider to get the checkout handler for.
   */
  checkoutHandler = Object(external_wp_hooks_["applyFilters"])('tec.tickets.seating.checkoutHandler', checkoutHandler, provider);
  return checkoutHandler;
}
// CONCATENATED MODULE: ./src/Tickets/Seating/app/frontend/ticketsBlock/filters.js



/**
 * The list of ticket IDs that is checked for availability in the Tickets Block.
 *
 * @since 5.16.0
 *
 * @type {number[]}
 */
const ticketIds = Object.values(localizedData.seatTypeMap).reduce((acc, seatType) => {
  acc.push(...seatType.tickets.map(ticket => ticket.ticketId));
  return acc;
}, []);

/**
 * Filters the list of Ticket IDS that is checked for availability in the Tickets Block.
 *
 * @since 5.16.0
 *
 * @return {number[]} The filtered list of Ticket IDS that is checked for availability in the Tickets Block.
 */
function filterGeTickets() {
  return ticketIds;
}

// The default logic will not find any ticket to check for availability, so we need to filter it.
Object(external_wp_hooks_["addFilter"])('tec.tickets.tickets-block.getTickets', 'tec.tickets.seating', filterGeTickets);
// CONCATENATED MODULE: ./src/Tickets/Seating/app/frontend/ticketsBlock/index.js


function ownKeys(object, enumerableOnly) { var keys = Object.keys(object); if (Object.getOwnPropertySymbols) { var symbols = Object.getOwnPropertySymbols(object); enumerableOnly && (symbols = symbols.filter(function (sym) { return Object.getOwnPropertyDescriptor(object, sym).enumerable; })), keys.push.apply(keys, symbols); } return keys; }
function _objectSpread(target) { for (var i = 1; i < arguments.length; i++) { var source = null != arguments[i] ? arguments[i] : {}; i % 2 ? ownKeys(Object(source), !0).forEach(function (key) { defineProperty_default()(target, key, source[key]); }) : Object.getOwnPropertyDescriptors ? Object.defineProperties(target, Object.getOwnPropertyDescriptors(source)) : ownKeys(Object(source)).forEach(function (key) { Object.defineProperty(target, key, Object.getOwnPropertyDescriptor(source, key)); }); } return target; }









const {
  objectName,
  seatTypeMap,
  labels,
  providerClass,
  postId,
  ajaxUrl,
  ajaxNonce,
  ACTION_POST_RESERVATIONS,
  ACTION_CLEAR_RESERVATIONS
} = localizedData;

/**
 * The total price element.
 *
 * @since 5.16.0
 *
 * @type {HTMLElement|null}
 */
let totalPriceElement = null;

/**
 * The total tickets element.
 *
 * @since 5.16.0
 *
 * @type {HTMLElement|null}
 */
let totalTicketsElement = null;

/**
 * The empty ticket list message element.
 *
 * @since 5.16.0
 *
 * @type {HTMLElement|null}
 */
let emptyTicketMessageElement = null;

/**
 * The Confirm button selector.
 *
 * @since 5.16.0
 *
 * @type {string}
 */
const confirmSelector = '.tec-tickets-seating__modal .tec-tickets-seating__sidebar-control--confirm';

/**
 * @typedef {Object} SeatMapTicketEntry
 * @property {string} ticketId    The ticket ID.
 * @property {string} name        The ticket name.
 * @property {number} price       The ticket price.
 * @property {string} description The ticket description.
 */

/**
 * @typedef {Object} A11yDialog
 * @property {HTMLElement} node The dialog element.
 */

/**
 * The tickets map.
 *
 * @since 5.16.0
 *
 * @type {Object<string, SeatMapTicketEntry>}
 */
const tickets = Object.values(seatTypeMap).reduce((map, seatType) => {
  seatType.tickets.forEach(ticket => {
    map[ticket.ticketId] = ticket;
  });
  return map;
}, {});

/**
 * The current fetch signal handler.
 *
 * @since 5.16.0
 *
 * @type {AbortController}
 */
let currentController = new AbortController();

/**
 * Whether the reservations should be cancelled on hide or destroy of the seat selection modal or not.
 * By default, the reservations will be cancelled, but this flag will be set to `false` during checkout.
 *
 * @since 5.16.0
 *
 * @type {boolean}
 */
let shouldCancelReservations = true;

/**
 * Formats the text representing the total number of tickets selected.
 *
 * @since 5.16.0
 *
 * @param {number} value The value to format.
 *
 * @return {string} The formatted value.
 */
function formatTicketNumber(value) {
  return value === 1 ? labels.oneTicket : labels.multipleTickets.replace('{count}', value);
}

/**
 * Disable the Checkout confirmation button(s).
 *
 * @since 5.16.0
 *
 * @param {HTMLElement|null} parentElement The parent element to disable the checkout button for.
 *
 * @return {void}
 */
function enableCheckout(parentElement) {
  parentElement = parentElement || document;
  Array.from(parentElement.querySelectorAll(confirmSelector)).forEach(confirm => {
    confirm.disabled = false;
  });
}

/**
 * Enables the Checkout confirmation button(s).
 *
 * @since 5.16.0
 *
 * @param {HTMLElement|null} parentElement The parent element to enable the checkout button for.
 *
 * @return {void}
 */
function disableCheckout(parentElement) {
  parentElement = parentElement || document;
  Array.from(parentElement.querySelectorAll(confirmSelector)).forEach(confirm => {
    confirm.disabled = true;
  });
}

/**
 * Updates the total prices and number of tickets in the block.
 *
 * @since 5.16.0
 *
 * @param {HTMLElement|null} parentElement The parent element to update the totals for.
 *
 * @return {void} The total prices and number of tickets are updated.
 */
function updateTotals(parentElement) {
  parentElement = parentElement || document;
  const rows = Array.from(parentElement.querySelectorAll('.tec-tickets-seating__ticket-row'));
  if (rows.length) {
    enableCheckout(parentElement);
  } else {
    disableCheckout(parentElement);
  }
  totalPriceElement.innerText = Object(external_tec_tickets_seating_currency_["formatWithCurrency"])(rows.reduce(function (acc, row) {
    return acc + Number(row.dataset.price);
  }, 0));
  totalTicketsElement.innerText = formatTicketNumber(rows.length);
  const totalsWrapper = parentElement.querySelector('.tec-tickets-seating__total');
  if (rows.length === 0) {
    totalsWrapper.classList.add('tec-tickets-seating__total-hidden');
  } else {
    totalsWrapper.classList.remove('tec-tickets-seating__total-hidden');
  }
}

/**
 * @typedef {Object} TicketSelectionProps
 * @property {string} reservationId The reservation UUID.
 * @property {string} seatColor     The seat type color.
 * @property {string} seatLabel     The seat type label.
 * @property {string} seatTypeId    The seat type ID.
 * @property {string} ticketId      The ticket ID.
 */

/**
 * Add a ticket to the selection.
 *
 * @since 5.16.0
 *
 * @param {HTMLElement|null}     parentElement The parent element to add the ticket to.
 * @param {TicketSelectionProps} props         The props for the Ticket Row component.
 *
 * @return {void} The ticket row is added to the DOM.
 */
function addTicketToSelection(parentElement, props) {
  var _tickets$props$ticket;
  parentElement = parentElement || document;
  const ticketPrice = (tickets === null || tickets === void 0 ? void 0 : (_tickets$props$ticket = tickets[props.ticketId]) === null || _tickets$props$ticket === void 0 ? void 0 : _tickets$props$ticket.price) || null;
  const ticketName = (tickets === null || tickets === void 0 ? void 0 : tickets[props.ticketId].name) || null;
  if (!(ticketPrice && ticketName)) {
    return;
  }
  const ticketRowProps = {
    seatTypeId: props.seatTypeId,
    ticketId: props.ticketId,
    price: ticketPrice,
    color: props.seatColor,
    ticketName,
    seatLabel: props.seatLabel,
    formattedPrice: Object(external_tec_tickets_seating_currency_["formatWithCurrency"])(ticketPrice)
  };
  parentElement.querySelector('.tec-tickets-seating__ticket-rows').appendChild(TicketRow(ticketRowProps));
}

/**
 * Posts the reservations to the backend replacing the existing ones.
 *
 * @since 5.16.0
 *
 * @param {Object} reservations The reservation IDs to post to the backend.
 */
function postReservationsToBackend(_x) {
  return _postReservationsToBackend.apply(this, arguments);
}
/**
 * Updates the tickets selection.
 *
 * @since 5.16.0
 *
 * @param {HTMLElement|null}       parentElement The parent element to add the tickets to.
 * @param {TicketSelectionProps[]} items         The items to add to the selection.
 */
function _postReservationsToBackend() {
  _postReservationsToBackend = asyncToGenerator_default()(function* (reservations) {
    // First of all, cancel any similar requests that might be in progress.
    yield currentController.abort('New reservations data');
    const newController = new AbortController();
    const requestUrl = new URL(ajaxUrl);
    requestUrl.searchParams.set('_ajax_nonce', ajaxNonce);
    requestUrl.searchParams.set('action', ACTION_POST_RESERVATIONS);
    requestUrl.searchParams.set('postId', postId);
    let response = null;
    response = yield fetch(requestUrl.toString(), {
      method: 'POST',
      signal: newController.signal,
      body: JSON.stringify({
        token: Object(external_tec_tickets_seating_service_api_["getToken"])(),
        reservations
      })
    });
    currentController = newController;
    if (!response.ok) {
      console.error('Failed to post reservations to backend');
      return false;
    }
    return true;
  });
  return _postReservationsToBackend.apply(this, arguments);
}
function updateTicketsSelection(parentElement, items) {
  parentElement = parentElement || document;
  parentElement.querySelector('.tec-tickets-seating__ticket-rows').innerHTML = '';
  items.forEach(item => {
    addTicketToSelection(parentElement, item);
  });
  const reservations = items.reduce((acc, item) => {
    acc[item.ticketId] = acc[item.ticketId] || [];
    acc[item.ticketId].push({
      reservationId: item.reservationId,
      seatTypeId: item.seatTypeId,
      seatLabel: item.seatLabel
    });
    return acc;
  }, {});
  postReservationsToBackend(reservations);
  updateTotals(parentElement);
}

/**
 * Updates the empty tickets message.
 *
 * @since 5.16.0
 *
 * @param {number|null} ticketCount The number of selected tickets.
 */
function updateEmptyTicketsMessage(ticketCount) {
  if (!ticketCount) {
    emptyTicketMessageElement.classList.remove('tec-tickets-seating__empty-tickets-message-hidden');
  } else {
    emptyTicketMessageElement.classList.add('tec-tickets-seating__empty-tickets-message-hidden');
  }
}

/**
 * Validates a selection item received from the service is valid.
 *
 * @since 5.16.0
 *
 * @param {Object} item The item to validate.
 *
 * @return {boolean} True if the item is valid, false otherwise.
 */
function validateSelectionItemFromService(item) {
  return item.seatTypeId && item.ticketId && item.seatColor && item.seatLabel && item.reservationId;
}

/**
 * Registers the handlers for the msssages received from the service.
 *
 * @since 5.16.0
 *
 *
 * @param {HTMLElement} iframe The service iframe element to listen to.
 */
function registerActions(iframe) {
  // When the service is ready for data, send the seat type map to the iframe.
  Object(external_tec_tickets_seating_service_api_["registerAction"])(external_tec_tickets_seating_service_api_["INBOUND_APP_READY_FOR_DATA"], () => {
    Object(external_tec_tickets_seating_service_api_["removeAction"])(external_tec_tickets_seating_service_api_["INBOUND_APP_READY_FOR_DATA"]);
    Object(external_tec_tickets_seating_service_api_["sendPostMessage"])(iframe, external_tec_tickets_seating_service_api_["OUTBOUND_SEAT_TYPE_TICKETS"], seatTypeMap);
  });

  // When a seat is selected, add it to the selection.
  Object(external_tec_tickets_seating_service_api_["registerAction"])(external_tec_tickets_seating_service_api_["INBOUND_SEATS_SELECTED"], items => {
    updateTicketsSelection(iframe.closest('.event-tickets'), items.filter(item => validateSelectionItemFromService(item)));
    updateEmptyTicketsMessage(items.length);
  });
}

/**
 * Watches for click events on the sidebar arrow to toggle it up and down
 *
 * @since 5.16.0
 *
 *
 * @param {HTMLElement} dom The dom or document
 */
function toggleMobileSidebarOpen(dom) {
  dom = dom || document;
  dom.querySelector('.tec-tickets-seating__sidebar-arrow').addEventListener('click', () => {
    const sidebar = dom.querySelector('.tec-tickets-seating__modal-sidebar');
    if (sidebar) {
      sidebar.classList.toggle('tec-tickets-seating__modal-sidebar-open');
    }
  });
}

/**
 * Setups up the mobile version of the ticket drawer and iframe.
 *
 * @since 5.16.0
 *
 *
 * @param {HTMLElement} dom The dom or document
 */
function setupMobileTicketsDrawer(dom) {
  dom = dom || document;
  if (window && window.innerWidth <= 960) {
    const iframeContainer = dom.querySelector('.tec-tickets-seating__iframe-container');
    iframeContainer.style.height = iframeContainer.clientHeight + 'px';
    iframeContainer.style.maxHeight = iframeContainer.clientHeight + 'px';
    const sidebarContainer = dom.querySelector('.tec-tickets-seating__modal-sidebar_container');
    sidebarContainer.style.height = sidebarContainer.clientHeight + 'px';
    sidebarContainer.style.minHeight = sidebarContainer.clientHeight + 'px';
    sidebarContainer.style.maxHeight = sidebarContainer.clientHeight + 'px';
    const sidebar = sidebarContainer.querySelector('.tec-tickets-seating__modal-sidebar');
    if (sidebar) {
      sidebar.style.position = 'absolute';
    }
  }
}

/**
 * Bootstraps the service iframe starting the communication with the service.
 *
 * @since 5.16.0
 *
 * @param {HTMLDocument|null} dom The document to use to bootstrap the iframe.
 *
 * @return {Promise<boolean>} A promise that resolves to true if the iframe is ready to communicate with the service.
 */
function bootstrapIframe(_x2) {
  return _bootstrapIframe.apply(this, arguments);
}

/**
 * Prompts the backend to cancel the reservations.
 *
 * @since 5.16.0
 *
 * @return {Promise<boolean>} A promise that resolves to `true` if the reservations were removed successfully,
 *                            `false` otherwise.
 */
function _bootstrapIframe() {
  _bootstrapIframe = asyncToGenerator_default()(function* (dom) {
    dom = dom || document;
    const iframe = Object(external_tec_tickets_seating_service_iframe_["getIframeElement"])(dom);
    if (!iframe) {
      console.error('Iframe element not found.');
      return false;
    }

    // Register the actions before initializing the iframe to avoid race conditions.
    registerActions(iframe);
    try {
      yield Object(external_tec_tickets_seating_service_iframe_["initServiceIframe"])(iframe);
    } catch (err) {
      // Reload the page: the server will render a tickets block explaining what is happening.
      window.location.reload();
      return false;
    }
    toggleMobileSidebarOpen(dom);
    setupMobileTicketsDrawer(dom);
    totalPriceElement = dom.querySelector('.tec-tickets-seating__total-price');
    totalTicketsElement = dom.querySelector('.tec-tickets-seating__total-text');
    emptyTicketMessageElement = dom.querySelector('.tec-tickets-seating__empty-tickets-message');
  });
  return _bootstrapIframe.apply(this, arguments);
}
function cancelReservationsOnBackend() {
  return _cancelReservationsOnBackend.apply(this, arguments);
}
/**
 * Clears the ticket selection from the DOM.
 *
 * @since 5.16.0
 *
 * @return {void} The ticket selection is cleared.
 */
function _cancelReservationsOnBackend() {
  _cancelReservationsOnBackend = asyncToGenerator_default()(function* () {
    // First of all, cancel any similar requests that might be in progress.
    yield currentController.abort('New reservations data');
    const newController = new AbortController();
    const requestUrl = new URL(ajaxUrl);
    requestUrl.searchParams.set('_ajax_nonce', ajaxNonce);
    requestUrl.searchParams.set('action', ACTION_CLEAR_RESERVATIONS);
    requestUrl.searchParams.set('token', Object(external_tec_tickets_seating_service_api_["getToken"])());
    requestUrl.searchParams.set('postId', postId);
    const response = yield fetch(requestUrl.toString(), {
      signal: newController.signal,
      method: 'POST'
    });
    currentController = newController;
    if (!response.ok) {
      console.error('Failed to remove reservations from backend');
      return false;
    }
    return true;
  });
  return _cancelReservationsOnBackend.apply(this, arguments);
}
function clearTicketSelection() {
  Array.from(document.querySelectorAll('.tec-tickets-seating__ticket-rows .tec-tickets-seating__ticket-row')).forEach(row => {
    row.remove();
  });
}

/**
 * Dispatches a clear reservations message to the service through the iframe.
 *
 * @since 5.16.0
 *
 * @param {HTMLElement|null} dialogElement The dialog element the iframe element that should be used to communicate with the service.
 */
function cancelReservations(_x3) {
  return _cancelReservations.apply(this, arguments);
}

/**
 * Closes the modal element using its reference on the window object.
 *
 * @since 5.16.0
 *
 * @return {void} The modal is closed.
 */
function _cancelReservations() {
  _cancelReservations = asyncToGenerator_default()(function* (dialogElement) {
    if (!shouldCancelReservations) {
      return;
    }
    const iframe = dialogElement ? dialogElement.querySelector('.tec-tickets-seating__iframe-container iframe.tec-tickets-seating__iframe') : null;
    if (iframe) {
      Object(external_tec_tickets_seating_service_api_["sendPostMessage"])(iframe, external_tec_tickets_seating_service_api_["OUTBOUND_REMOVE_RESERVATIONS"]);
    }
    yield cancelReservationsOnBackend();
    Object(external_tec_tickets_seating_frontend_session_["reset"])();
    clearTicketSelection();
  });
  return _cancelReservations.apply(this, arguments);
}
function closeModal() {
  var _window;
  const modal = (_window = window) === null || _window === void 0 ? void 0 : _window[objectName];
  if (!modal) {
    return;
  }
  modal._hide();
}

/**
 * @typedef {Object} SelectedTicket
 * @property {string} ticket_id The ticket ID.
 * @property {number} quantity  The quantity of the ticket.
 * @property {string} optout    Whether the ticket is opted out or not.
 */

/**
 * Reads and compiles a list of the selected tickets from the DOM
 *
 * @since 5.16.0
 *
 * @return {SelectedTicket[]} A list of the selected tickets.
 */
function readTicketsFromSelection() {
  const ticketsFromSelection = Array.from(document.querySelectorAll('.tec-tickets-seating__ticket-rows .tec-tickets-seating__ticket-row')).reduce((acc, row) => {
    const ticketId = row.dataset.ticketId;
    if (!(acc !== null && acc !== void 0 && acc[ticketId])) {
      acc[ticketId] = {
        ticket_id: ticketId,
        quantity: 1,
        optout: '1',
        // @todo: actually pull this from the Attendee data collection.
        seat_labels: [row.dataset.seatLabel]
      };
    } else {
      acc[ticketId].quantity++;
      acc[ticketId].seat_labels = [...acc[ticketId].seat_labels, row.dataset.seatLabel];
    }
    return acc;
  }, {});
  return Object.values(ticketsFromSelection);
}

/**
 * Proceeds to the checkout phase according to the provider.
 *
 * @since 5.16.0
 *
 * @return {Promise<void>} A promise that resolves to void. Note that, most likely, the checkout will redirect to the
 *                          provider's checkout page.
 */
function proceedToCheckout() {
  return _proceedToCheckout.apply(this, arguments);
}
/**
 * Append the expire date to the iframe src.
 *
 * @since 5.16.0
 *
 * @param {A11yDialog} dialogElement The A11y dialog element.
 */
function _proceedToCheckout() {
  _proceedToCheckout = asyncToGenerator_default()(function* () {
    // The seat selection modal will be hidden or destroyed, so we should not cancel the reservations.
    shouldCancelReservations = false;
    const checkoutHandler = getCheckoutHandlerForProvider(providerClass);
    if (!checkoutHandler) {
      console.error(`No checkout handler found for provider ${providerClass}`);
      return;
    }
    const data = new FormData();
    data.append('provider', providerClass);
    data.append('attendee[optout]', '1');
    data.append('tickets_tickets_ar', '1');
    const selectedTickets = readTicketsFromSelection();
    data.append('tribe_tickets_saving_attendees', '1');
    data.append('tribe_tickets_ar_data', JSON.stringify({
      tribe_tickets_tickets: selectedTickets,
      tribe_tickets_meta: [],
      tribe_tickets_post_id: postId
    }));
    const ok = yield checkoutHandler(data);
    if (!ok) {
      console.error('Failed to proceed to checkout.');
    }
    shouldCancelReservations = true;
  });
  return _proceedToCheckout.apply(this, arguments);
}
function setExpireDate(dialogElement) {
  var _dialogElement$node;
  const iframe = dialogElement ? dialogElement === null || dialogElement === void 0 ? void 0 : (_dialogElement$node = dialogElement.node) === null || _dialogElement$node === void 0 ? void 0 : _dialogElement$node.querySelector('.tec-tickets-seating__iframe-container iframe.tec-tickets-seating__iframe') : null;
  if (!iframe) {
    return;
  }
  iframe.src = iframe.src + '&expireDate=' + new Date().getTime();
}

/**
 * Adds event listeners to the modal element once it's loaded.
 *
 * @since 5.16.0
 *
 * @return {void} Adds event listeners to the modal element once it's loaded.
 */
function addModalEventListeners() {
  var _document$querySelect, _document$querySelect2;
  (_document$querySelect = document.querySelector('.tec-tickets-seating__modal .tec-tickets-seating__sidebar-control--cancel')) === null || _document$querySelect === void 0 ? void 0 : _document$querySelect.addEventListener('click', closeModal);
  (_document$querySelect2 = document.querySelector(confirmSelector)) === null || _document$querySelect2 === void 0 ? void 0 : _document$querySelect2.addEventListener('click', proceedToCheckout);
  Object(external_tec_tickets_seating_frontend_session_["start"])();
  const modal = window[objectName];
  if (!modal) {
    return;
  }
  modal.on('hide', cancelReservations);
  modal.on('destroy', cancelReservations);
}

/**
 * Waits for the modal element to be present in the DOM.
 *
 * @return {Promise<Element>} A promise that resolves to the modal element.
 */
function waitForModalElement() {
  return _waitForModalElement.apply(this, arguments);
}
function _waitForModalElement() {
  _waitForModalElement = asyncToGenerator_default()(function* () {
    return new Promise(resolve => {
      const check = () => {
        if (window[objectName]) {
          resolve(window[objectName]);
        }
        setTimeout(check, 50);
      };
      check();
    });
  });
  return _waitForModalElement.apply(this, arguments);
}
waitForModalElement().then(modalElement => {
  modalElement.on('show', () => {
    disableCheckout();
    bootstrapIframe(document);
    addModalEventListeners();
    setExpireDate(modalElement);
  });
});
window.tec = window.tec || {};
window.tec.tickets = window.tec.tickets || {};
window.tec.tickets.seating = window.tec.tickets.seating || {};
window.tec.tickets.seating.frontend = window.tec.tickets.seating.frontend || {};
window.tec.tickets.seating.frontend.ticketsBlock = _objectSpread(_objectSpread({}, window.tec.tickets.seating.frontend.ticketsBlock || {}), {}, {
  cancelReservations
});

/***/ }),

/***/ "pJv/":
/***/ (function(module, exports) {

module.exports = tec.tickets.seating.service.iframe;

/***/ }),

/***/ "wRIV":
/***/ (function(module, exports) {

module.exports = tec.tickets.seating.service.api;

/***/ })

/******/ });