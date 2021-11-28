(function() {
    var f = "function" == typeof Object.create ? Object.create : function(a) {
            function b() {}
            b.prototype = a;
            return new b
        },
        g;
    if ("function" == typeof Object.setPrototypeOf) g = Object.setPrototypeOf;
    else {
        var h;
        a: {
            var k = { L: !0 },
                l = {};
            try {
                l.__proto__ = k;
                h = l.L;
                break a
            } catch (a) {}
            h = !1
        }
        g = h ? function(a, b) { a.__proto__ = b; if (a.__proto__ !== b) throw new TypeError(a + " is not extensible"); return a } : null
    }
    var m = g,
        n = this;

    function p(a) {
        a = a.split(".");
        for (var b = n, c = 0; c < a.length; c++)
            if (b = b[a[c]], null == b) return null;
        return b
    }

    function q(a, b, c) { return a.call.apply(a.bind, arguments) }

    function r(a, b, c) {
        if (!a) throw Error();
        if (2 < arguments.length) {
            var d = Array.prototype.slice.call(arguments, 2);
            return function() {
                var c = Array.prototype.slice.call(arguments);
                Array.prototype.unshift.apply(c, d);
                return a.apply(b, c)
            }
        }
        return function() { return a.apply(b, arguments) }
    }

    function u(a, b, c) { Function.prototype.bind && -1 != Function.prototype.bind.toString().indexOf("native code") ? u = q : u = r; return u.apply(null, arguments) }
    var v = Date.now || function() { return +new Date };

    function w(a, b) {
        var c = a.split("."),
            d = n;
        c[0] in d || "undefined" == typeof d.execScript || d.execScript("var " + c[0]);
        for (var e; c.length && (e = c.shift());) c.length || void 0 === b ? d[e] && d[e] !== Object.prototype[e] ? d = d[e] : d = d[e] = {} : d[e] = b
    };

    function x() {
        this.h = this.h;
        this.m = this.m
    }
    x.prototype.h = !1;
    x.prototype.dispose = function() { this.h || (this.h = !0, this.o()) };
    x.prototype.o = function() {
        if (this.m)
            for (; this.m.length;) this.m.shift()()
    };
    var y = window.yt && window.yt.config_ || window.ytcfg && window.ytcfg.data_ || {};
    w("yt.config_", y);

    function A(a, b) { return a in y ? y[a] : b }

    function B() { return A("SCHEDULER_SOFT_STATE_TIMER", 800) };
    var C, D = A("EXPERIMENT_FLAGS", {}).web_emulated_idle_callback_delay;
    C = void 0 === D ? 300 : Number(D || 0);
    var E = 1E3 / 60 - 3;

    function F(a) {
        a = void 0 === a ? {} : a;
        x.call(this);
        this.a = [];
        this.a[4] = [];
        this.a[3] = [];
        this.a[2] = [];
        this.a[1] = [];
        this.a[0] = [];
        this.f = 0;
        this.G = a.timeout || 1;
        this.c = {};
        this.l = E;
        this.s = this.b = this.j = 0;
        this.u = this.i = !1;
        this.g = [];
        this.A = u(this.I, this);
        this.F = u(this.K, this);
        this.C = u(this.H, this);
        this.D = u(this.J, this);
        this.v = !1;
        var b;
        if (b = !!window.requestIdleCallback) b = !A("EXPERIMENT_FLAGS", {}).disable_scheduler_requestIdleCallback;
        this.B = b;
        (this.w = !!a.useRaf && !!window.requestAnimationFrame) && document.addEventListener("visibilitychange",
            this.A)
    }
    F.prototype = f(x.prototype);
    F.prototype.constructor = F;
    if (m) m(F, x);
    else
        for (var G in x)
            if ("prototype" != G)
                if (Object.defineProperties) {
                    var H = Object.getOwnPropertyDescriptor(x, G);
                    H && Object.defineProperty(F, G, H)
                } else F[G] = x[G];
    F.a = x.prototype;

    function I(a, b) {
        var c = v();
        J(b);
        c = v() - c;
        a.i || (a.l -= c)
    }

    function K(a, b, c, d) {
        ++a.s;
        if (10 == c) return I(a, b), a.s;
        var e = a.s;
        a.c[e] = b;
        a.i && !d ? a.g.push({ id: e, priority: c }) : (a.a[c].push(e), a.u || a.i || (0 != a.b && L(a) != a.j && M(a), a.start()));
        return e
    }

    function N(a) {
        a.g.length = 0;
        for (var b = 4; 0 <= b; b--) a.a[b].length = 0;
        a.c = {};
        M(a)
    }

    function L(a) {
        for (var b = 4; b >= a.f; b--)
            if (0 < a.a[b].length) return 0 < b ? !document.hidden && a.w ? 3 : 2 : 1;
        return 0
    }

    function J(a) {
        try { a() } catch (b) {
            (a = p("yt.logging.errors.log")) && a(b)
        }
    }
    F.prototype.H = function(a) {
        var b = void 0;
        a && (b = a.timeRemaining());
        this.v = !0;
        O(this, b);
        this.v = !1
    };
    F.prototype.K = function() { O(this) };
    F.prototype.J = function() { O(this) };
    F.prototype.I = function() { this.b && (M(this), this.start()) };

    function O(a, b) {
        M(a);
        a.i = !0;
        for (var c = v() + (b || a.l), d = a.a[4]; d.length;) {
            var e = d.shift(),
                t = a.c[e];
            delete a.c[e];
            t && J(t)
        }
        d = a.v ? 0 : 1;
        d = a.f > d ? a.f : d;
        if (!(v() >= c)) {
            do {
                a: {
                    e = a;t = d;
                    for (var z = 3; z >= t; z--)
                        for (var P = e.a[z]; P.length;) {
                            var Q = P.shift(),
                                R = e.c[Q];
                            delete e.c[Q];
                            if (R) { e = R; break a }
                        }
                    e = null
                }
                e && J(e)
            } while (e && v() < c)
        }
        a.i = !1;
        c = 0;
        for (d = a.g.length; c < d; c++) e = a.g[c], a.a[e.priority].push(e.id);
        a.l = E;
        a: {
            for (c = 3; 0 <= c; c--)
                if (a.a[c].length) { c = !0; break a }
            c = !1
        }(c || a.g.length) && a.start();
        a.g.length = 0
    }
    F.prototype.start = function() {
        this.u = !1;
        if (0 == this.b) switch (this.j = L(this), this.j) {
            case 1:
                var a = this.C;
                this.b = this.B ? window.requestIdleCallback(a, { timeout: 3E3 }) : window.setTimeout(a, C);
                break;
            case 2:
                this.b = window.setTimeout(this.F, this.G);
                break;
            case 3:
                this.b = window.requestAnimationFrame(this.D)
        }
    };

    function M(a) {
        if (a.b) {
            switch (a.j) {
                case 1:
                    var b = a.b;
                    a.B ? window.cancelIdleCallback(b) : window.clearTimeout(b);
                    break;
                case 2:
                    window.clearTimeout(a.b);
                    break;
                case 3:
                    window.cancelAnimationFrame(a.b)
            }
            a.b = 0
        }
    }
    F.prototype.o = function() {
        N(this);
        M(this);
        this.w && document.removeEventListener("visibilitychange", this.A);
        x.prototype.o.call(this)
    };
    var S = p("yt.scheduler.instance.timerIdMap_") || {},
        T = 0,
        U = 0;

    function V() { var a = p("ytglobal.schedulerInstanceInstance_"); if (!a || a.h) a = new F(A("scheduler", void 0) || {}), w("ytglobal.schedulerInstanceInstance_", a); return a }

    function aa() {
        var a = p("ytglobal.schedulerInstanceInstance_");
        a && (a && "function" == typeof a.dispose && a.dispose(), w("ytglobal.schedulerInstanceInstance_", null))
    }

    function ba() { N(V()) }

    function ca(a, b, c) {
        if (0 == c || void 0 === c) return c = void 0 === c, -K(V(), a, b, c);
        var d = window.setTimeout(function() {
            var c = K(V(), a, b);
            S[d] = c
        }, c);
        return d
    }

    function da(a) { I(V(), a) }

    function ea(a) {
        var b = V();
        if (0 > a) delete b.c[-a];
        else {
            var c = S[a];
            c ? (delete b.c[c], delete S[a]) : window.clearTimeout(a)
        }
    }

    function W(a) {
        var b = p("ytcsi.tick");
        b && b(a)
    }

    function fa() {
        W("jse");
        X()
    }

    function X() {
        window.clearTimeout(T);
        V().start()
    }

    function ha() {
        var a = V();
        M(a);
        a.u = !0;
        window.clearTimeout(T);
        T = window.setTimeout(fa, B())
    }

    function Y() {
        window.clearTimeout(U);
        U = window.setTimeout(function() {
            W("jset");
            Z(0)
        }, B())
    }

    function Z(a) {
        Y();
        var b = V();
        b.f = a;
        b.start()
    }

    function ia(a) {
        Y();
        var b = V();
        b.f > a && (b.f = a, b.start())
    }

    function ja() {
        window.clearTimeout(U);
        var a = V();
        a.f = 0;
        a.start()
    };
    p("yt.scheduler.initialized") || (w("yt.scheduler.instance.dispose", aa), w("yt.scheduler.instance.addJob", ca), w("yt.scheduler.instance.addImmediateJob", da), w("yt.scheduler.instance.cancelJob", ea), w("yt.scheduler.instance.cancelAllJobs", ba), w("yt.scheduler.instance.start", X), w("yt.scheduler.instance.pause", ha), w("yt.scheduler.instance.setPriorityThreshold", Z), w("yt.scheduler.instance.enablePriorityThreshold", ia), w("yt.scheduler.instance.clearPriorityThreshold", ja), w("yt.scheduler.initialized", !0));
}).call(this);