"use strict";

var _typeof = typeof Symbol === "function" && typeof Symbol.iterator === "symbol" ? function (obj) { return typeof obj; } : function (obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; };

/*! modernizr 3.12.0 (Custom Build) | MIT *
 * https://modernizr.com/download/?-cssgrid_cssgridlegacy-touchevents-mq-setclasses !*/
!function (e, n, t, r) {
  function o(e, n) {
    return (typeof e === "undefined" ? "undefined" : _typeof(e)) === n;
  }function i() {
    return "function" != typeof t.createElement ? t.createElement(arguments[0]) : _ ? t.createElementNS.call(t, "http://www.w3.org/2000/svg", arguments[0]) : t.createElement.apply(t, arguments);
  }function s() {
    var e = t.body;return e || (e = i(_ ? "svg" : "body"), e.fake = !0), e;
  }function a(e, n, r, o) {
    var a,
        l,
        u,
        f,
        c = "modernizr",
        d = i("div"),
        p = s();if (parseInt(r, 10)) for (; r--;) {
      u = i("div"), u.id = o ? o[r] : c + (r + 1), d.appendChild(u);
    }return a = i("style"), a.type = "text/css", a.id = "s" + c, (p.fake ? p : d).appendChild(a), p.appendChild(d), a.styleSheet ? a.styleSheet.cssText = e : a.appendChild(t.createTextNode(e)), d.id = c, p.fake && (p.style.background = "", p.style.overflow = "hidden", f = S.style.overflow, S.style.overflow = "hidden", S.appendChild(p)), l = n(d, e), p.fake && p.parentNode ? (p.parentNode.removeChild(p), S.style.overflow = f, S.offsetHeight) : d.parentNode.removeChild(d), !!l;
  }function l(e, t, r) {
    var o;if ("getComputedStyle" in n) {
      o = getComputedStyle.call(n, e, t);var i = n.console;if (null !== o) r && (o = o.getPropertyValue(r));else if (i) {
        var s = i.error ? "error" : "log";i[s].call(i, "getComputedStyle returning null, its possible modernizr test results are inaccurate");
      }
    } else o = !t && e.currentStyle && e.currentStyle[r];return o;
  }function u(e, n) {
    return !!~("" + e).indexOf(n);
  }function f(e) {
    return e.replace(/([A-Z])/g, function (e, n) {
      return "-" + n.toLowerCase();
    }).replace(/^ms-/, "-ms-");
  }function c(e, t) {
    var o = e.length;if ("CSS" in n && "supports" in n.CSS) {
      for (; o--;) {
        if (n.CSS.supports(f(e[o]), t)) return !0;
      }return !1;
    }if ("CSSSupportsRule" in n) {
      for (var i = []; o--;) {
        i.push("(" + f(e[o]) + ":" + t + ")");
      }return i = i.join(" or "), a("@supports (" + i + ") { #modernizr { position: absolute; } }", function (e) {
        return "absolute" === l(e, null, "position");
      });
    }return r;
  }function d(e) {
    return e.replace(/([a-z])-([a-z])/g, function (e, n, t) {
      return n + t.toUpperCase();
    }).replace(/^-/, "");
  }function p(e, n, t, s) {
    function a() {
      f && (delete E.style, delete E.modElem);
    }if (s = !o(s, "undefined") && s, !o(t, "undefined")) {
      var l = c(e, t);if (!o(l, "undefined")) return l;
    }for (var f, p, m, h, v, y = ["modernizr", "tspan", "samp"]; !E.style && y.length;) {
      f = !0, E.modElem = i(y.shift()), E.style = E.modElem.style;
    }for (m = e.length, p = 0; p < m; p++) {
      if (h = e[p], v = E.style[h], u(h, "-") && (h = d(h)), E.style[h] !== r) {
        if (s || o(t, "undefined")) return a(), "pfx" !== n || h;try {
          E.style[h] = t;
        } catch (e) {}if (E.style[h] !== v) return a(), "pfx" !== n || h;
      }
    }return a(), !1;
  }function m(e, n) {
    return function () {
      return e.apply(n, arguments);
    };
  }function h(e, n, t) {
    var r;for (var i in e) {
      if (e[i] in n) return !1 === t ? e[i] : (r = n[e[i]], o(r, "function") ? m(r, t || n) : r);
    }return !1;
  }function v(e, n, t, r, i) {
    var s = e.charAt(0).toUpperCase() + e.slice(1),
        a = (e + " " + T.join(s + " ") + s).split(" ");return o(n, "string") || o(n, "undefined") ? p(a, n, r, i) : (a = (e + " " + N.join(s + " ") + s).split(" "), h(a, n, t));
  }function y(e, n, t) {
    return v(e, r, r, n, t);
  }var g = [],
      C = { _version: "3.12.0", _config: { classPrefix: "", enableClasses: !0, enableJSClass: !0, usePrefixes: !0 }, _q: [], on: function on(e, n) {
      var t = this;setTimeout(function () {
        n(t[e]);
      }, 0);
    }, addTest: function addTest(e, n, t) {
      g.push({ name: e, fn: n, options: t });
    }, addAsyncTest: function addAsyncTest(e) {
      g.push({ name: null, fn: e });
    } },
      Modernizr = function Modernizr() {};Modernizr.prototype = C, Modernizr = new Modernizr();var w = [],
      S = t.documentElement,
      _ = "svg" === S.nodeName.toLowerCase(),
      b = function () {
    var e = n.matchMedia || n.msMatchMedia;return e ? function (n) {
      var t = e(n);return t && t.matches || !1;
    } : function (e) {
      var n = !1;return a("@media " + e + " { #modernizr { position: absolute; } }", function (e) {
        n = "absolute" === l(e, null, "position");
      }), n;
    };
  }();C.mq = b;var x = C._config.usePrefixes ? " -webkit- -moz- -o- -ms- ".split(" ") : ["", ""];C._prefixes = x, Modernizr.addTest("touchevents", function () {
    if ("ontouchstart" in n || n.TouchEvent || n.DocumentTouch && t instanceof DocumentTouch) return !0;var e = ["(", x.join("touch-enabled),("), "heartz", ")"].join("");return b(e);
  });var z = "Moz O ms Webkit",
      T = C._config.usePrefixes ? z.split(" ") : [];C._cssomPrefixes = T;var P = { elem: i("modernizr") };Modernizr._q.push(function () {
    delete P.elem;
  });var E = { style: P.elem.style };Modernizr._q.unshift(function () {
    delete E.style;
  });var N = C._config.usePrefixes ? z.toLowerCase().split(" ") : [];C._domPrefixes = N, C.testAllProps = v, C.testAllProps = y, Modernizr.addTest("cssgridlegacy", y("grid-columns", "10px", !0)), Modernizr.addTest("cssgrid", y("grid-template-rows", "none", !0)), function () {
    var e, n, t, r, i, s, a;for (var l in g) {
      if (g.hasOwnProperty(l)) {
        if (e = [], n = g[l], n.name && (e.push(n.name.toLowerCase()), n.options && n.options.aliases && n.options.aliases.length)) for (t = 0; t < n.options.aliases.length; t++) {
          e.push(n.options.aliases[t].toLowerCase());
        }for (r = o(n.fn, "function") ? n.fn() : n.fn, i = 0; i < e.length; i++) {
          s = e[i], a = s.split("."), 1 === a.length ? Modernizr[a[0]] = r : (Modernizr[a[0]] && (!Modernizr[a[0]] || Modernizr[a[0]] instanceof Boolean) || (Modernizr[a[0]] = new Boolean(Modernizr[a[0]])), Modernizr[a[0]][a[1]] = r), w.push((r ? "" : "no-") + a.join("-"));
        }
      }
    }
  }(), function (e) {
    var n = S.className,
        t = Modernizr._config.classPrefix || "";if (_ && (n = n.baseVal), Modernizr._config.enableJSClass) {
      var r = new RegExp("(^|\\s)" + t + "no-js(\\s|$)");n = n.replace(r, "$1" + t + "js$2");
    }Modernizr._config.enableClasses && (e.length > 0 && (n += " " + t + e.join(" " + t)), _ ? S.className.baseVal = n : S.className = n);
  }(w), delete C.addTest, delete C.addAsyncTest;for (var j = 0; j < Modernizr._q.length; j++) {
    Modernizr._q[j]();
  }e.Modernizr = Modernizr;
}(window, window, document);
'use strict';

jQuery(document).ready(function ($) {
  'use strict';

  $(".button.wp-editor.external-link").append(' <svg class="icon external" viewBox="0 0 24 24"><use xlink:href="#link_external"></use></svg>');

  $(".link.wp-editor.external-link").append(' <svg class="icon external" viewBox="0 0 24 24"><use xlink:href="#link_external"></use></svg>');

  $("iframe").wrap(function () {
    return "<div class='responsive-embed'></div>";
  });
});
'use strict';

/*global Modernizr */
/*jslint browser:true */

(function () {
  'use strict';

  var mq = window.matchMedia("(min-width: 1200px)");

  var main_menu = document.querySelector('.nav-container');

  if (main_menu) {
    var has_children = main_menu.querySelectorAll('.menu-item-has-children');

    if (has_children) {
      has_children.forEach(function (menu_item) {
        var sub_menu_container = menu_item.querySelector('.sub-menu-container'),
            timer;

        if (sub_menu_container) {
          var menu_item_link = menu_item.querySelector('a[aria-haspopup]');

          if (menu_item_link) {

            // Set aria expanded on mouse enter
            menu_item.addEventListener('mouseenter', function (e) {
              menu_item_link.setAttribute('aria-expanded', 'true');
            });

            // Remove aria expanded on mouse out
            menu_item.addEventListener('mouseleave', function (e) {
              menu_item_link.setAttribute('aria-expanded', 'false');
            });

            // Allow keyboard to open mobile menu
            menu_item_link.addEventListener('keydown', function (e) {
              // Open menu with enter, space, up, or down arrow
              if (e.keyCode === 13 || e.keyCode === 32 || e.keyCode === 38 || e.keyCode === 40) {
                e.preventDefault();

                if (e.target.parentNode.classList.contains('open')) {
                  e.target.parentNode.classList.remove('open');
                  e.target.setAttribute('aria-expanded', 'false');
                } else {
                  e.target.parentNode.classList.add('open');
                  e.target.setAttribute('aria-expanded', 'true');

                  setTimeout(function (event) {
                    var anchors = e.target.parentNode.querySelector('.sub-menu-container').querySelectorAll('a'),
                        select_anchor = anchors[0];

                    if (e.keyCode === 38) {
                      select_anchor = anchors[anchors.length - 1];
                    }

                    if (select_anchor) {
                      select_anchor.focus();
                    } else {
                      e.target.parentNode.querySelector('.sub-menu-container').focus();
                    }
                  }, 350);
                }
              }
            });

            // Allow top level nav to open sub nav on mobile
            menu_item_link.addEventListener('click', function (e) {
              if (document.body.classList.contains('mobile-menu-open')) {
                e.preventDefault();
                menu_item.classList.toggle('open');
              }
            });

            if (mq.matches) {

              menu_item_link.addEventListener('touchstart', function (e) {
                e.preventDefault();

                if (menu_item.classList.contains('open')) {
                  menu_item.classList.remove('open');
                  menu_item.setAttribute('aria-expanded', 'false');
                  console.log(menu_item.querySelector('a').href);
                  //window.open(menu_item.querySelector('a').href);
                  window.location.href = menu_item.querySelector('a').href;
                } else {
                  menu_item.classList.add('open');
                  menu_item.setAttribute('aria-expanded', 'true');
                }
              });
            }

            sub_menu_container.addEventListener('keydown', function (e) {
              var anchors = sub_menu_container.querySelectorAll('a'),
                  current_anchor_index = Array.from(anchors).indexOf(e.target);

              // On key escape
              if (e.keyCode === 27) {
                e.preventDefault();
                sub_menu_container.previousElementSibling.focus();
              }

              // On key up
              if (e.keyCode === 38) {
                e.preventDefault();

                if (current_anchor_index === 0) {
                  anchors[anchors.length - 1].focus();
                } else {
                  anchors[current_anchor_index - 1].focus();
                }
              }

              // On key down
              if (e.keyCode === 40) {
                e.preventDefault();

                if (current_anchor_index === anchors.length - 1) {
                  anchors[0].focus();
                } else {
                  anchors[current_anchor_index + 1].focus();
                }
              }

              // Key home, go to first anchor
              if (e.keyCode === 36) {
                e.preventDefault();
                anchors[0].focus();
              }

              // Key end, go to last anchor
              if (e.keyCode === 35) {
                e.preventDefault();
                anchors[anchors.length - 1].focus();
              }
            });

            // Clear out timer if focus still in subnav.
            sub_menu_container.addEventListener('focusin', function (event) {
              if (timer) {
                clearTimeout(timer);
                timer = null;
              }
            });

            // Set timer if focus leaves the subnav. This triggers even if you are tabbing within the subnav.
            sub_menu_container.addEventListener('focusout', function (event) {
              timer = setTimeout(function (event) {
                var open_menu_item = document.querySelector(".menu-item-has-children.open");
                if (open_menu_item) {
                  open_menu_item.classList.remove('open');
                  open_menu_item.querySelector('a[aria-haspopup]').setAttribute('aria-expanded', 'false');
                }
              }, 20);
            });
          }
        }
      });
    }
  }

  /** Trigger Mobile Menu **/
  var mobile_menu_trigger = document.querySelector('.mobile-menu-trigger');
  if (mobile_menu_trigger) {
    mobile_menu_trigger.addEventListener('click', function (e) {
      e.preventDefault();
      document.body.classList.toggle('mobile-menu-open');
    });
  }
})();