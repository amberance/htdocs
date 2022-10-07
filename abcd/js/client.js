﻿/*
 * ==========================================================
 * CLIENT SCRIPT
 * ==========================================================
 *
 * Main JavaScript file used on both admin and client sides. © 2022 boxcoin.dev. All rights reserved.
 * 
 */

'use strict';
(function () {

    var body;
    var checkouts;
    var timeout = false;
    var previous_search = '';
    var countdown;
    var intervals = {};
    var busy = {};
    var ND = 'undefined';
    var admin = typeof BXC_ADMIN !== ND || document.getElementsByClassName('bxc-admin').length;
    var active_checkout;
    var active_checkout_id;
    var scripts = document.getElementsByTagName('script');
    var language = typeof BXC_LANGUAGE !== ND ? BXC_LANGUAGE : false;

    /*
    * ----------------------------------------------------------
    * _query
    * ----------------------------------------------------------
    */

    var _ = function (selector) {
        return typeof selector === 'object' && 'e' in selector ? selector : (new _.init(typeof selector === 'string' ? document.querySelectorAll(selector) : selector));
    }

    _.init = function (e) {
        this.e = e.tagName != 'SELECT' && (typeof e[0] !== 'undefined' || NodeList.prototype.isPrototypeOf(e)) ? e : [e];
    }

    _.ajax = function (url, paramaters = false, onSuccess = false, method = 'POST') {
        let xhr = new XMLHttpRequest();
        let fd = '';
        xhr.open(method, url, true);
        if (paramaters) {
            if (paramaters.action == 'bxc_wp_ajax') {
                for (var key in paramaters) {
                    if (typeof paramaters[key] === 'object') paramaters[key] = JSON.stringify(paramaters[key]);
                }
                fd = new URLSearchParams(paramaters).toString();
                xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            } else {
                fd = new FormData();
                fd.append('data', JSON.stringify(paramaters));
            }
        }
        xhr.onload = () => { if (onSuccess) onSuccess(xhr.responseText) };
        xhr.onerror = () => { return false };
        xhr.send(fd);
    }

    _.extend = function (a, b) {
        for (var key in b) if (b.hasOwnProperty(key)) a[key] = b[key];
        return a;
    }

    _.documentHeight = function () {
        let body = document.body, html = document.documentElement;
        return Math.max(body.scrollHeight, body.offsetHeight, html.clientHeight, html.scrollHeight, html.offsetHeight);
    }

    _.init.prototype.on = function (event, sel, handler) {
        for (var i = 0; i < this.e.length; i++) {
            this.e[i].addEventListener(event, function (event) {
                var t = event.target;
                while (t && t !== this) {
                    if (t.matches(sel)) {
                        handler.call(t, event);
                    }
                    t = t.parentNode;
                }
            });
        }
    }

    _.init.prototype.addClass = function (value) {
        for (var i = 0; i < this.e.length; i++) {
            this.e[i].classList.add(value);
        }
        return _(this.e);
    }

    _.init.prototype.removeClass = function (value) {
        value = value.trim().split(' ');
        for (var i = 0; i < value.length; i++) {
            for (var j = 0; j < this.e.length; j++) {
                this.e[j].classList.remove(value[i]);
            }
        }
        return _(this.e);
    }

    _.init.prototype.toggleClass = function (value) {
        for (var i = 0; i < this.e.length; i++) {
            this.e[i].classList.toggle(value);
        }
        return _(this.e);
    }

    _.init.prototype.setClass = function (class_name, add = true) {
        for (var i = 0; i < this.e.length; i++) {
            if (add) _(this.e[i]).addClass(class_name); else _(this.e[i]).removeClass(class_name);
        }
        return _(this.e);
    }

    _.init.prototype.hasClass = function (value) {
        return this.e.length ? this.e[0].classList.contains(value) : false;
    }

    _.init.prototype.find = function (selector) {
        if (selector.indexOf('>') === 0) selector = ':scope' + selector;
        return this.e.length ? _(this.e[0].querySelectorAll(selector)) : false;
    }

    _.init.prototype.parent = function () {
        return _(this.e[0].parentElement);
    }

    _.init.prototype.prev = function () {
        return _(this.e[0].previousElementSibling);
    }

    _.init.prototype.next = function () {
        return _(this.e[0].nextElementSibling);
    }

    _.init.prototype.attr = function (name, value = false) {
        if (value === false) return this.e[0].getAttribute(name);
        if (value) this.e[0].setAttribute(name, value); else this.e[0].removeAttribute(name);
        return _(this.e);
    }

    _.init.prototype.html = function (value = false) {
        if (!this.e.length) return;
        if (value === false) return this.e[0].innerHTML;
        if (typeof value === 'string') this.e[0].innerHTML = value; else this.e[0].appendChild(value);
        return _(this.e);
    }

    _.init.prototype.append = function (value) {
        var template = document.createElement('template');
        template.innerHTML = value.trim();
        this.e[0].appendChild(template.content.firstChild);
        return _(this.e);
    }

    _.init.prototype.prepend = function (value) {
        this.e[0].innerHTML = value + this.e[0].innerHTML;
        return _(this.e);
    }

    _.init.prototype.replace = function (content) {
        this.e[0].outerHTML = content;
        return _(this.e);
    }

    _.init.prototype.remove = function () {
        for (var i = 0; i < this.e.length; i++) {
            this.e[i].remove();
        }
    }

    _.init.prototype.data = function () {
        let response = {};
        let el = this.e[0];
        for (var i = 0, atts = el.attributes, n = atts.length; i < n; i++) {
            response[atts[i].nodeName.substr(5)] = atts[i].nodeValue;
        }
        return response;
    }

    _.init.prototype.is = function (type) {
        if (this.e[0].nodeType == 1 && this.e.length) {
            type = type.toLowerCase();
            return this.e[0].tagName.toLowerCase() == type || _(this).attr('type') == type;
        }
        return false;
    }

    _.init.prototype.index = function () {
        return [].indexOf.call(this.e[0].parentElement.children, this.e[0]);
    }

    _.init.prototype.siblings = function () {
        return this.e[0].parentNode.querySelectorAll(':scope > *')
    }

    _.init.prototype.length = function () {
        return this.e.length;
    }

    _.init.prototype.val = function (value = null) {
        if (value !== null) {
            for (var i = 0; i < this.e.length; i++) {
                this.e[i].value = value;
            }
        }
        return this.e.length ? this.e[0].value : '';
    }

    _.load = function (src = false, js = true, onLoad = false, content = false) {
        let resource = document.createElement(js ? 'script' : 'link');
        if (src) {
            if (js) resource.src = src; else resource.href = src;
            resource.type = js ? 'text/javascript' : 'text/css';
        } else {
            resource.innerHTML = content;
        }
        if (onLoad) {
            resource.onload = function () {
                onLoad();
            }
        }
        if (!js) resource.rel = 'stylesheet';
        document.head.appendChild(resource);
    }

    window._query = _;

    /*
    * ----------------------------------------------------------
    * Functions
    * ----------------------------------------------------------
    */

    var BOXCoin = {
        loading: function (element, action = -1) {
            element = _(element);
            if (action !== -1) return element.setClass('bxc-loading', action === true);
            if (element.hasClass('bxc-loading')) return true;
            else this.loading(element, true);
            return false;
        },

        activate: function (element, activate = true) {
            return _(element).setClass('bxc-active', activate);
        },

        ajax: function (function_name, data = false, onSuccess = false) {
            data['function'] = function_name;
            data['language'] = language;
            _.ajax(BXC_URL + 'ajax.php', data, (response) => {
                let error = false;
                let result = false;
                try {
                    result = JSON.parse(response);
                    error = !(result && 'success' in result && result.success);
                } catch (e) {
                    error = true;
                }
                if (error) {
                    body.find('.bxc-loading').removeClass('bxc-loading');
                    console.error(response);
                    busy[active_checkout_id] = false;
                } else if (onSuccess) onSuccess(result.response);
            });
        },

        cookie: function (name, value = false, expiration_days = false, action = 'get', seconds = false) {
            let https = location.protocol == 'https:' ? 'SameSite=None;Secure;' : '';
            if (action == 'get') {
                let cookies = document.cookie.split(';');
                for (var i = 0; i < cookies.length; i++) {
                    var cookie = cookies[i];
                    while (cookie.charAt(0) == ' ') {
                        cookie = cookie.substring(1);
                    }
                    if (cookie.indexOf(name) == 0) {
                        let value = cookie.substring(name.length + 1, cookie.length);
                        return value ? value : false;
                    }
                }
                return false;
            } else if (action == 'set') {
                let date = new Date();
                date.setTime(date.getTime() + (expiration_days * (seconds ? 1 : 86400) * 1000));
                document.cookie = name + "=" + value + ";expires=" + date.toUTCString() + ";path=/;" + https;
            } else if (this.cookie(name)) {
                document.cookie = name + "=" + value + ";expires=Thu, 01 Jan 1970 00:00:01 GMT;path=/;" + https;
            }
        },

        beautifyTime: function (datetime, extended = false, future = false) {
            let date;
            if (datetime == '0000-00-00 00:00:00') return '';
            if (datetime.indexOf('-') > 0) {
                let arr = datetime.split(/[- :]/);
                date = new Date(arr[0], arr[1] - 1, arr[2], arr[3], arr[4], arr[5]);
            } else {
                let arr = datetime.split(/[. :]/);
                date = new Date(arr[2], arr[1] - 1, arr[0], arr[3], arr[4], arr[5]);
            }
            let date_string = new Date(Date.UTC(date.getFullYear(), date.getMonth(), date.getDate(), date.getHours(), date.getMinutes(), date.getSeconds()));
            let diff_days = Math.round(((new Date()) - date_string) / (1000 * 60 * 60 * 24)) * (future ? -1 : 1);
            let days = [bxc_('Sunday'), bxc_('Monday'), bxc_('Tuesday'), bxc_('Wednesday'), bxc_('Thursday'), bxc_('Friday'), bxc_('Saturday')];
            let time = date_string.toLocaleTimeString('en-EN', { hour: '2-digit', minute: '2-digit' });
            if (time.charAt(0) === '0' && (time.includes('PM') || time.includes('AM'))) time = time.substring(1);
            if (diff_days < 1) {
                return `<span>${bxc_('Today')}</span>${extended ? ` <span>${time}</span>` : ''}`;
            } else if (diff_days < 8) {
                return `<span>${days[date_string.getDay()]}</span>${extended ? ` <span>${time}</span>` : ''}`;
            } else {
                return `<span>${date_string.toLocaleDateString()}</span>${extended ? ` <span>${time}</span>` : ''}`;
            }
        },

        search: function (input, searchFunction) {
            let icon = _(input).parent().find('i');
            let search = _(input).val().toLowerCase().trim();
            if (icon.hasClass('bxc-loading')) return;
            if (search == previous_search) {
                this.loading(icon, false);
                return;
            }
            clearTimeout(timeout);
            timeout = setTimeout(() => {
                previous_search = search;
                searchFunction(search, icon);
                this.loading(icon);
            }, 200);
        },

        searchClear: function (icon, onSuccess) {
            let search = _(icon).next().val();
            if (search) {
                _(icon).next().val('');
                onSuccess();
            }
        },

        getURL: function (name = false, url = false) {
            if (!url) url = location.search;
            if (!name) {
                var c = url.split('?').pop().split('&');
                var p = {};
                for (var i = 0; i < c.length; i++) {
                    var d = c[i].split('=');
                    p[d[0]] = SBF.escape(d[1]);
                }
                return p;
            }
            if (url.indexOf('?') > 0) {
                url = url.substr(0, url.indexOf('?'));
            }
            return BOXCoin.escape(decodeURIComponent((new RegExp('[?|&]' + name + '=' + '([^&;]+?)(&|#|;|$)').exec(url) || [, ""])[1].replace(/\+/g, '%20') || ""));
        },

        escape: function (string) {
            if (!string) return string;
            return string.replaceAll('<script', '&lt;script').replaceAll('</script', '&lt;/script').replaceAll('javascript:', '').replaceAll('onclick=', '').replaceAll('onerror=', '');
        },

        checkout: {
            settings: function (checkout) {
                checkout = _(checkout);
                let checkout_id = checkout.attr('data-boxcoin');
                let settings = { checkout_id: checkout_id };
                if (checkout_id.includes('custom')) {
                    return _.extend(settings, _(checkout).data());
                }
                return settings;
            },

            init: function (settings, area, onSuccess = false) {
                let active_transaction = this.storageTransaction(settings.checkout_id);
                _.ajax(BXC_URL + 'init.php', { checkout: settings, language: language }, (response) => {
                    area = _(area);
                    area.html(response);
                    if (active_transaction) {
                        active_checkout_id = area.attr('data-boxcoin');
                        active_checkout = area.find('> .bxc-main');
                        if (!['stripe', 'verifone'].includes(active_transaction.external_reference)) {
                            if (active_transaction.encrypted) {
                                BOXCoin.checkout.monitorTransaction(active_transaction.encrypted);
                            } else {
                                let time = parseInt((Date.now() - active_transaction.storage_time) / 1000);
                                let minutes = BXC_SETTINGS.countdown - Math.floor(time / 60);
                                let seconds = 60 - (time % 60);
                                if (seconds) minutes--;
                                this.initTransaction(active_transaction.id, active_transaction.amount, active_transaction.address_payment, active_transaction.cryptocurrency, active_transaction.external_reference, [minutes, seconds], active_transaction.custom_token, active_transaction.redirect);
                            }
                        }
                        if (active_checkout.hasClass('bxc-popup')) BOXCoin.checkout.openPopup(active_checkout_id);
                    }
                    if (BOXCoin.getURL('card')) this.completeTransaction(BOXCoin.getURL('card'), active_transaction);
                    if (BOXCoin.getURL('pay')) area.find(`.bxc-payment-methods [data-cryptocurrency="${BOXCoin.getURL('pay')}"]`).e[0].click();
                    if (onSuccess) onSuccess(response);
                });
            },

            initTransaction: function (transaction_id, amount, address, cryptocurrency, external_reference, countdown_partial = false, custom_token = false, redirect = false) {
                let pay_cnt = active_checkout.find('.bxc-pay-cnt');
                let area = pay_cnt.find('.bxc-pay-address');
                let cryptocurrency_uppercase = BOXCoin.baseCode(cryptocurrency.toUpperCase());
                let countdown_area = pay_cnt.find('[data-countdown]');
                let data = { id: transaction_id, amount: amount, address_payment: address, cryptocurrency: cryptocurrency, external_reference: external_reference, custom_token: custom_token, redirect: redirect };
                let network_label = BOXCoin.network(cryptocurrency, false);
                active_checkout.addClass('bxc-pay-cnt-active');
                area.find('.bxc-text').html(cryptocurrency_uppercase + network_label + ' ' + bxc_('address'));
                area.find('.bxc-title').html(address);
                area.find('.bxc-clipboard').attr('data-text', window.btoa(address));
                area = pay_cnt.find('.bxc-pay-amount');
                area.find('.bxc-title').html(amount + ' ' + cryptocurrency_uppercase);
                area.find('.bxc-clipboard').attr('data-text', window.btoa(amount));
                active_checkout.attr('data-transaction-id', transaction_id);
                area = pay_cnt.find('.bxc-qrcode-text');
                pay_cnt.find('.bxc-qrcode').attr('src', `https://api.qrserver.com/v1/create-qr-code/?size=500x500&data=${address}&color=${BXC_SETTINGS.qr_code_color}`);
                area.find('img').attr('src', custom_token ? custom_token.img : `${BXC_URL}media/icon-${cryptocurrency}.svg`);
                area.find('div').html(bxc_('Only send {T} to this address').replace('{T}', cryptocurrency_uppercase + network_label));
                countdown_area.html('');
                countdown = countdown_partial ? [countdown_partial[0], countdown_partial[1], true] : [BXC_SETTINGS.countdown, 0, true];
                clearInterval(intervals[active_checkout_id]);
                intervals[active_checkout_id] = setInterval(() => {
                    countdown_area.html(`${countdown[0]}:${countdown[1] < 10 ? '0' : ''}${countdown[1]}`);
                    countdown[1]--;
                    if (countdown[1] <= 0) {
                        if (countdown[0] <= 0) {
                            setTimeout(() => {
                                BOXCoin.event('TransactionCancelled', data);
                                this.cancelTransaction();
                                active_checkout.find('#bxc-expired-tx-id').html(transaction_id);
                                active_checkout.removeClass('bxc-tx-cnt-active').addClass('bxc-failed-cnt-active');
                            }, 500);
                        }
                        if (countdown[0] < 5 && countdown[2]) {
                            countdown_area.parent().addClass('bxc-countdown-expiring');
                            countdown[2] = false;
                        }
                        countdown[0]--;
                        countdown[1] = 59;
                    }
                }, 1000);
                clearInterval(intervals['check-' + active_checkout_id]);
                intervals['check-' + active_checkout_id] = setInterval(() => {
                    if (!busy[active_checkout_id]) {
                        busy[active_checkout_id] = true;
                        ajax('check-transactions', { transaction_id: transaction_id }, (response) => {
                            busy[active_checkout_id] = false;
                            if (response) {
                                if (response == 'expired') return;
                                if (Array.isArray(response) && response[0] == 'error') return console.error(response[1]);
                                this.monitorTransaction(response);
                            }
                        });
                    }
                }, 5000);
                this.storageTransaction(active_checkout_id, data);
                BOXCoin.event('TransactionStarted', data);
                loading(pay_cnt, false);
            },

            monitorTransaction: function (encrypted_transaction) {
                let active_transaction = this.storageTransaction(active_checkout_id);
                let interval_id = 'check-' + active_checkout_id;
                clearInterval(intervals[active_checkout_id]);
                clearInterval(intervals[interval_id]);
                intervals[interval_id] = setInterval(() => {
                    if (active_checkout && !busy[active_checkout_id]) {
                        busy[active_checkout_id] = true;
                        ajax('check-transaction', { transaction: encrypted_transaction }, (response) => {
                            busy[active_checkout_id] = false;
                            active_checkout.find('.bxc-tx-confirmations').html(response.confirmations + ' / ' + BXC_SETTINGS.confirmations);
                            if (response.confirmations) {
                                active_checkout.find('.bxc-tx-status').addClass('bxc-tx-status-confirmed').html(bxc_('Confirmed'));
                            }
                            if (response.confirmed) {
                                if (response.underpayment) {
                                    active_checkout.removeClass('bxc-tx-cnt-active').addClass('bxc-underpayment-cnt-active');
                                    clearInterval(intervals[interval_id]);
                                    active_checkout.find('#bxc-underpaid-tx-id').html(active_transaction.id);
                                    this.cancelTransaction();
                                } else {
                                    if (response.invoice) window.open(response.invoice);
                                    this.completeTransaction(encrypted_transaction, active_transaction, interval_id);
                                }
                            }
                        });
                    }
                }, 3000);
                if (active_transaction) active_transaction['encrypted'] = encrypted_transaction;
                if (active_checkout_id) this.storageTransaction(active_checkout_id, active_transaction);
                if (active_checkout) {
                    active_checkout.addClass('bxc-tx-cnt-active');
                    active_checkout.find('.bxc-tx-status').removeClass('bxc-tx-status-confirmed').html(bxc_('Pending'));
                    active_checkout.find('.bxc-tx-confirmations').html('0 / ' + BXC_SETTINGS.confirmations);
                }
            },

            completeTransaction: function (encrypted_transaction, active_transaction, interval_id = false) {
                if (typeof BXC_WP_AJAX_URL != ND) {
                    _.ajax(BXC_WP_AJAX_URL, { action: 'bxc_wp_ajax', type: 'woocommerce-payment-complete', transaction: active_transaction }, (response) => {
                        document.location.href = response;
                    });
                }
                if (BXC_SETTINGS.webhook) {
                    ajax('webhook', { transaction: encrypted_transaction });
                }
                if (active_transaction.redirect) {
                    setTimeout(() => { document.location.href = encodeURI(`${active_transaction.redirect}${active_transaction.redirect.includes('?') ? '&' : '?'}transaction_id=${active_transaction.id}&amount=${active_transaction.amount}&address=${active_transaction.address}&cryptocurrency=${active_transaction.cryptocurrency}&external_reference=${active_transaction.external_reference}`) }, 1000);
                } else {
                    active_checkout.removeClass('bxc-tx-cnt-active').addClass('bxc-complete-cnt-active');
                }
                clearInterval(intervals[interval_id]);
                BOXCoin.event('TransactionCompleted', active_transaction);
                this.cancelTransaction();
            },

            cancelTransaction: function () {
                clearInterval(intervals[active_checkout_id]);
                clearInterval(intervals['check-' + active_checkout_id]);
                active_checkout.removeClass('bxc-pay-cnt-active');
                busy[active_checkout_id] = false;
                this.storageTransaction(active_checkout_id, 'delete');
                active_checkout_id = false;
                active_checkout = false;
            },

            storageTransaction: function (checkout_id, transaction) {
                let transactions = storage('bxc-active-transaction');
                let exists = checkout_id in transactions;
                if (transaction) {
                    if (transaction == 'delete') {
                        delete transactions[checkout_id];
                    } else if (!exists || transaction.encrypted) {
                        transaction['storage_time'] = Date.now();
                        transactions[checkout_id] = transaction;
                    }
                } else {
                    if (exists) {
                        if (transactions[checkout_id].encrypted || ((transactions[checkout_id].storage_time + (BXC_SETTINGS.countdown * 60000)) > Date.now())) {
                            return transactions[checkout_id];
                        } else {
                            delete transactions[checkout_id];
                        }
                    }
                }
                storage('bxc-active-transaction', transactions);
                return false;
            },

            show: function (checkout_id) {
                body.find(`[data-boxcoin="${checkout_id}"] > div`).removeClass('bxc-hidden');
            },

            openPopup(checkout_id, open = true) {
                activate(body.find(`[data-boxcoin="${checkout_id}"] `).find('.bxc-popup,.bxc-popup-overlay'), open);
            }
        },

        event: function (name, data = {}) {
            data['checkout_id'] = active_checkout_id;
            let event = new CustomEvent('BXC' + name, data);
            document.dispatchEvent(event);
        },

        baseCode: function (cryptocurrency_code) {
            return cryptocurrency_code.replace('_tron', '').replace('_TRON', '');
        },

        network: function (cryptocurrency_code, label = true) {
            let networks = { ETH: ['usdt', 'usdc', 'link', 'shib', 'bat'], TRX: ['usdt_tron'], BSC: ['bnb', 'busd'] };
            cryptocurrency_code = cryptocurrency_code.toLowerCase();
            for (var key in networks) {
                if (networks[key].includes(cryptocurrency_code)) {
                    let text = key + ' ' + bxc_('network');
                    return label ? `<span class="bxc-label">${text}</span>` : ' ' + bxc_('on') + ' ' + text;
                }
            }
            return '';
        }
    }

    window.BOXCoin = BOXCoin;

    function bxc_(text) {
        return BXC_TRANSLATIONS && text in BXC_TRANSLATIONS ? BXC_TRANSLATIONS[text] : text;
    }

    function loading(element, action = -1) {
        return BOXCoin.loading(element, action);
    }

    function ajax(function_name, data = {}, onSuccess = false) {
        return BOXCoin.ajax(function_name, data, onSuccess);
    }

    function activate(element, activate = true) {
        return BOXCoin.activate(element, activate);
    }

    function checkoutParent(element) {
        return element.closest('.bxc-main');
    }

    function getScriptParameters(url) {
        var c = url.split('?').pop().split('&');
        var p = {};
        for (var i = 0; i < c.length; i++) {
            var d = c[i].split('=');
            p[d[0]] = d[1]
        }
        return p;
    }

    function storage(name, value = -1, default_value = {}) {
        if (value === -1) {
            let value = localStorage.getItem(name);
            return value ? JSON.parse(value) : default_value;
        }
        localStorage.setItem(name, JSON.stringify(value));
    }

    /*
    * ----------------------------------------------------------
    * Init
    * ----------------------------------------------------------
    */

    document.addEventListener('DOMContentLoaded', () => {
        body = _(document.body);
        if (!admin) {
            if (typeof BXC_URL != ND) return;
            for (var i = 0; i < scripts.length; i++) {
                if (['boxcoin', 'boxcoin-js'].includes(scripts[i].id)) {
                    let url = scripts[i].src.replace('js/client.js', '').replace('js/client.min.js', '');
                    let parameters = getScriptParameters(url);
                    if (url.includes('?')) url = url.substr(0, url.indexOf('?'));
                    _.load(url + 'css/client.css', false);
                    if ('lang' in parameters) language = parameters.lang;
                    if (url.includes('?')) url = url.substr(0, url.indexOf('?'));
                    checkouts = admin ? [] : body.find('[data-boxcoin]');
                    _.ajax(url + 'init.php', { init: true, language: language }, (response) => {
                        _.load(false, true, false, response);
                        checkouts.e.forEach(e => {
                            BOXCoin.checkout.init(BOXCoin.checkout.settings(e), e);
                        });
                    });
                    globalInit();
                    BOXCoin.event('Init');

                    /*
                    * ----------------------------------------------------------
                    * Checkout
                    * ----------------------------------------------------------
                    */

                    body.on('click', '.bxc-payment-methods > div', function () {
                        let checkout = _(checkoutParent(this));
                        let id = checkout.parent().attr('data-boxcoin');
                        checkout.find('.bxc-error').remove();
                        if (active_checkout_id && id != active_checkout_id) {
                            checkout.find('.bxc-body').prepend(`<div class="bxc-error bxc-text">${bxc_('Another transaction is being processed. Complete the transaction or cancel it to start a new one.')}</div>`);
                            setTimeout(() => { checkout.find('.bxc-error').remove() }, 10000);
                            return;
                        }
                        active_checkout = checkout;
                        active_checkout_id = id;
                        let cryptocurrency_code = _(this).attr('data-cryptocurrency');
                        let external_reference = active_checkout.attr('data-external-reference');
                        let amount = active_checkout.attr('data-price');
                        let input = active_checkout.find('#user-amount');
                        let custom_token = _(this).attr('data-custom-coin');
                        let billing = false;
                        if (!amount || amount == -1) {
                            amount = input.find('input').val();
                            if (!amount) {
                                input.addClass('bxc-error');
                                return;
                            }
                        }
                        if (custom_token) {
                            custom_token = { type: custom_token, img: _(this).find('img').attr('src') };
                        }
                        if (active_checkout.find('#bxc-billing [name="name"]').val().trim()) {
                            billing = {};
                            active_checkout.find('#bxc-billing input, #bxc-billing select').e.forEach(e => {
                                billing[_(e).attr('name')] = _(e).val();
                            });
                            storage('bxc-billing', billing);
                        }
                        active_checkout.addClass('bxc-pay-cnt-active');
                        loading(active_checkout.find('.bxc-pay-cnt'));
                        ajax('create-transaction', {
                            amount: amount,
                            cryptocurrency_code: cryptocurrency_code,
                            currency_code: active_checkout.attr('data-currency'),
                            external_reference: active_checkout.attr('data-external-reference'),
                            title: active_checkout.attr('data-title'),
                            description: active_checkout.attr('data-description'),
                            custom_token: custom_token,
                            url: document.location.href,
                            billing: billing ? JSON.stringify(billing) : ''
                        }, (response) => {
                            if (!Array.isArray(response)) return console.error(response);
                            if (['stripe', 'verifone'].includes(cryptocurrency_code)) {
                                let data = { id: response[0], amount: amount, external_reference: cryptocurrency_code };
                                BOXCoin.checkout.storageTransaction(active_checkout_id, data);
                                BOXCoin.event('TransactionStarted', data);
                                document.location = response[2];
                            } else {
                                BOXCoin.checkout.initTransaction(response[0], response[1], response[2], cryptocurrency_code, external_reference, false, custom_token, active_checkout.attr('data-redirect'));
                            }
                        });
                    });

                    body.on('click', '.bxc-back', function () {
                        active_checkout.find('.bxc-pay-top-main').addClass('bxc-hidden');
                    });

                    body.on('click', '#bxc-abort-cancel, #bxc-confirm-cancel', function () {
                        active_checkout.find('.bxc-pay-top-main').removeClass('bxc-hidden');
                    });

                    body.on('click', '#bxc-confirm-cancel', function () {
                        BOXCoin.event('TransactionCancelled', BOXCoin.checkout.storageTransaction(active_checkout_id));
                        BOXCoin.checkout.cancelTransaction();
                    });

                    body.on('click', '.bxc-failed-cnt .bxc-btn', function () {
                        active_checkout.removeClass('bxc-failed-cnt-active');
                    });

                    /*
                    * ----------------------------------------------------------
                    * Miscellaneous
                    * ----------------------------------------------------------
                    */

                    body.on('click', '.bxc-btn-popup,.bxc-popup-close', function () {
                        activate(_(this.closest('[data-boxcoin]')).find('.bxc-popup,.bxc-popup-overlay'), _(this).hasClass('bxc-btn-popup'));
                    });

                    body.on('click', '.bxc-collapse-btn', function () {
                        _(this).parent().removeClass('bxc-collapse');
                        _(this).remove();
                    });

                    /*
                    * ----------------------------------------------------------
                    * Invoice
                    * ----------------------------------------------------------
                    */

                    body.on('click', '#bxc-btn-invoice', function () {
                        let billing = storage('bxc-billing');
                        if (billing) {
                            for (var key in billing) {
                                _(`#bxc-billing [name="${key}"]`).val(billing[key]);
                            }
                        }
                        _(this).remove();
                        _('#bxc-billing').removeClass('bxc-hidden');
                    });

                    break;
                }
            }
        } else {
            globalInit();
        }

    }, false);

    /*
    * ----------------------------------------------------------
    * Global
    * ----------------------------------------------------------
    */

    function globalInit() {
        body.on('click', '.bxc-clipboard', function () {
            let tooltip = _(this).find('span');
            let text = tooltip.html();
            navigator.clipboard.writeText(window.atob(_(this).attr('data-text')));
            tooltip.html(bxc_('Copied'));
            activate(this);
            setTimeout(() => {
                activate(this, false);
                tooltip.html(text);
            }, 2000);
        });
    }
}());