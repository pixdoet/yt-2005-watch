(function(g) {
    var window = this;
    var coa = function(a, b) { return g.sc(a, b) },
        a4 = function() {},
        doa = function(a) {
            if (a.tc && "function" == typeof a.tc) return a.tc();
            if (g.t(a)) return a.split("");
            if (g.Na(a)) { for (var b = [], c = a.length, d = 0; d < c; d++) b.push(a[d]); return b }
            return g.oc(a)
        },
        eoa = function(a, b) {
            if (a.forEach && "function" == typeof a.forEach) a.forEach(b, void 0);
            else if (g.Na(a) || g.t(a))(0, g.A)(a, b, void 0);
            else {
                if (a.zd && "function" == typeof a.zd) var c = a.zd();
                else if (a.tc && "function" == typeof a.tc) c = void 0;
                else if (g.Na(a) || g.t(a)) { c = []; for (var d = a.length, e = 0; e < d; e++) c.push(e) } else c = g.pc(a);
                d = doa(a);
                e = d.length;
                for (var f = 0; f < e; f++) b.call(void 0, d[f], c && c[f], a)
            }
        },
        b4 = function(a) {
            g.Jn(a, "zx", g.Yb());
            return a
        },
        c4 = function(a, b, c) {
            g.Ma(c) || (c = [String(c)]);
            g.On(a.o, b, c)
        },
        d4 = function(a) { return (a = g.ep(a)) ? new ActiveXObject(a) : new XMLHttpRequest },
        e4 = function(a, b) { return b + " [" + a.Y + " " + a.G + " " + a.getStatus() + "]" },
        foa = function(a) { return "content-type" == a.toLowerCase() },
        f4 = function(a) {
            a.g && a.O && (a.g.ontimeout = null);
            a.D && (g.v.clearTimeout(a.D), a.D = null)
        },
        goa = function(a) { return g.me && g.Sc(9) && g.Ha(a.timeout) && g.Fa(a.ontimeout) },
        g4 = function(a) { a.T || (a.T = !0, a.dispatchEvent("complete"), a.dispatchEvent("error")) },
        h4 = function(a, b) {
            if (a.g) {
                f4(a);
                var c = a.g,
                    d = a.L[0] ? g.Ja : null;
                a.g = null;
                a.L = null;
                b || a.dispatchEvent("ready");
                try { c.onreadystatechange = d } catch (e) {}
            }
        },
        i4 = function(a, b) {
            a.l = !1;
            a.g && (a.u = !0, a.g.abort(), a.u = !1);
            a.o = b;
            a.A = 5;
            g4(a);
            h4(a)
        },
        j4 = function(a) { return a.g ? a.g.readyState : 0 },
        k4 = function(a) {
            if (a.l && "undefined" != typeof g.KX)
                if (a.L[1] && 4 == j4(a) && 2 == a.getStatus()) e4(a, "Local request error detected and ignored");
                else if (a.F && 4 == j4(a)) g.sh(a.kv, 0, a);
            else if (a.dispatchEvent("readystatechange"), 4 == j4(a)) {
                e4(a, "Request complete");
                a.l = !1;
                try {
                    var b = a.getStatus();
                    a: switch (b) {
                        case 200:
                        case 201:
                        case 202:
                        case 204:
                        case 206:
                        case 304:
                        case 1223:
                            var c = !0;
                            break a;
                        default:
                            c = !1
                    }
                    var d;
                    if (!(d = c)) {
                        var e;
                        if (e = 0 === b) {
                            var f = g.Gh(String(a.G))[1] || null;
                            if (!f && g.v.self && g.v.self.location) {
                                var k = g.v.self.location.protocol;
                                f = k.substr(0, k.length - 1)
                            }
                            e = !hoa.test(f ? f.toLowerCase() : "")
                        }
                        d = e
                    }
                    if (d) a.dispatchEvent("complete"), a.dispatchEvent("success");
                    else {
                        a.A = 6;
                        try { var l = 2 < j4(a) ? a.g.statusText : "" } catch (m) { l = "" }
                        a.o = l + " [" + a.getStatus() + "]";
                        g4(a)
                    }
                } finally { h4(a) }
            }
        },
        l4 = function(a) {
            g.Bg.call(this);
            this.headers = new g.yn;
            this.P = a || null;
            this.l = !1;
            this.L = this.g = null;
            this.Y = this.G = "";
            this.A = 0;
            this.o = "";
            this.u = this.aa = this.F = this.T = !1;
            this.B = 0;
            this.D = null;
            this.X = "";
            this.O = this.R = !1
        },
        m4 = function(a) { try { return a.g ? a.g.responseText : "" } catch (b) { return "" } },
        ioa = function(a, b) {
            var c = [];
            g.wl(b, function(a) {
                try { var b = g.tp.prototype.l.call(this, a, !0) } catch (f) { if ("Storage: Invalid value was encountered" == f) return; throw f; }
                g.Fa(b) ? g.sp(b) && c.push(a) : c.push(a)
            }, a);
            return c
        },
        joa = function(a, b) {
            var c = ioa(a, b);
            (0, g.A)(c, function(a) { g.tp.prototype.remove.call(this, a) }, a)
        },
        n4 = function(a) {
            if (a.Tc) {
                if (a.Tc.locationOverrideToken) return { locationOverrideToken: a.Tc.locationOverrideToken };
                if (null != a.Tc.latitudeE7 && null != a.Tc.longitudeE7) return { latitudeE7: a.Tc.latitudeE7, longitudeE7: a.Tc.longitudeE7 }
            }
            return null
        },
        koa = function(a, b) { g.fb(a, b) || a.push(b) },
        o4 = function(a) {
            var b = 0,
                c;
            for (c in a) b++;
            return b
        },
        loa = function(a, b, c, d) {
            var e = new g.Bn(null, void 0);
            a && g.Cn(e, a);
            b && g.Dn(e, b);
            c && g.En(e, c);
            d && (e.l = d);
            return e
        },
        p4 = function() {
            this.g = [];
            this.l = []
        },
        q4 = function(a, b) {
            g.xq[a] = !0;
            var c = g.vq();
            c && c.publish.apply(c, arguments);
            g.xq[a] = !1
        },
        r4 = function(a) {
            this.app = this.name = this.id = "";
            this.type = "REMOTE_CONTROL";
            this.obfuscatedGaiaId = this.avatar = this.username = "";
            this.o = !1;
            this.capabilities = new Set;
            this.experiments = new Set;
            this.theme = "u";
            new g.yn;
            this.g = this.l = "";
            a && (this.id = a.id || a.name, this.name = a.name, this.app = a.app, this.type = a.type || "REMOTE_CONTROL", this.username = a.user || "", this.avatar = a.userAvatarUri || "", this.obfuscatedGaiaId = a.obfuscatedGaiaId || "", this.theme = a.theme || "u", moa(this, a.capabilities || ""), noa(this, a.experiments || ""), this.l = a.remoteControllerUrl || "", this.g = a.localChannelEncryptionKey ||
                "")
        },
        moa = function(a, b) {
            a.capabilities.clear();
            (0, g.Be)(b.split(","), g.Va(coa, ooa)).forEach(function(b) { a.capabilities.add(b) })
        },
        noa = function(a, b) {
            a.experiments.clear();
            b.split(",").forEach(function(b) { a.experiments.add(b) })
        },
        s4 = function(a) {
            a = a || {};
            this.name = a.name || "";
            this.id = a.id || a.screenId || "";
            this.token = a.token || a.loungeToken || "";
            this.uuid = a.uuid || a.dialId || ""
        },
        t4 = function(a, b) { return !!b && (a.id == b || a.uuid == b) },
        u4 = function(a) {
            return {
                name: a.name,
                screenId: a.id,
                loungeToken: a.token,
                dialId: a.uuid
            }
        },
        poa = function(a) { return new s4(a) },
        v4 = function(a) { return g.Ma(a) ? (0, g.D)(a, poa) : [] },
        w4 = function(a) { return a ? '{name:"' + a.name + '",id:' + a.id.substr(0, 6) + "..,token:" + (a.token ? ".." + a.token.slice(-6) : "-") + ",uuid:" + (a.uuid ? ".." + a.uuid.slice(-6) : "-") + "}" : "null" },
        x4 = function(a) { return g.Ma(a) ? "[" + (0, g.D)(a, w4).join(",") + "]" : "null" },
        y4 = function() {
            return "xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx".replace(/[xy]/g, function(a) {
                var b = 16 * Math.random() | 0;
                return ("x" == a ? b : b & 3 | 8).toString(16)
            })
        },
        qoa = function(a) {
            return (0, g.D)(a, function(a) {
                return {
                    key: a.id,
                    name: a.name
                }
            })
        },
        z4 = function(a, b) { return g.bb(a, function(a) { return a || b ? !a != !b ? !1 : a.id == b.id : !0 }) },
        A4 = function(a, b) { return g.bb(a, function(a) { return t4(a, b) }) },
        roa = function() {
            var a = (0, g.It)();
            a && joa(a, a.g.Ye(!0))
        },
        B4 = function() {
            var a = g.Lt("yt-remote-connected-devices") || [];
            g.yb(a);
            return a
        },
        soa = function(a) {
            if (0 == a.length) return [];
            var b = a[0].indexOf("#"),
                c = -1 == b ? a[0] : a[0].substring(0, b);
            return (0, g.D)(a, function(a, b) { return 0 == b ? a : a.substring(c.length) })
        },
        C4 = function(a) { g.Kt("yt-remote-connected-devices", a, 86400) },
        E4 = function() {
            if (D4) return D4;
            var a = g.Lt("yt-remote-device-id");
            a || (a = y4(), g.Kt("yt-remote-device-id", a, 31536E3));
            for (var b = B4(), c = 1, d = a; g.fb(b, d);) c++, d = a + "#" + c;
            return D4 = d
        },
        F4 = function() {
            var a = B4(),
                b = E4();
            g.fb(a, b);
            g.Nt() && g.Cb(a, b);
            a = soa(a);
            if (0 == a.length) try { g.ft("remote_sid") } catch (c) {} else try { g.et("remote_sid", a.join(","), -1) } catch (c) {}
        },
        G4 = function() { return g.Lt("yt-remote-session-browser-channel") },
        H4 = function() { return g.Lt("yt-remote-local-screens") || [] },
        I4 = function() { g.Kt("yt-remote-lounge-token-expiration", !0, 86400) },
        toa = function(a) {
            5 < a.length && (a = a.slice(a.length - 5));
            var b = (0, g.D)(H4(), function(a) { return a.loungeToken }),
                c = (0, g.D)(a, function(a) { return a.loungeToken });
            (0, g.kn)(c, function(a) { return !g.fb(b, a) }) && I4();
            g.Kt("yt-remote-local-screens", a, 31536E3)
        },
        uoa = function(a, b) {
            g.Kt("yt-remote-session-browser-channel", a);
            g.Kt("yt-remote-session-screen-id", b);
            var c = B4(),
                d = E4();
            g.fb(c, d) || c.push(d);
            C4(c);
            F4()
        },
        J4 = function(a) {
            a || (g.Mt("yt-remote-session-screen-id"), g.Mt("yt-remote-session-video-id"));
            F4();
            a = B4();
            g.jb(a, E4());
            C4(a)
        },
        L4 = function() {
            if (!K4) {
                var a = g.Dp();
                a && (K4 = new g.np(a))
            }
            return K4 ? !!K4.get("yt-remote-use-staging-server") : !1
        },
        M4 = function(a) { return !!document.currentScript && (-1 != document.currentScript.src.indexOf("?" + a) || -1 != document.currentScript.src.indexOf("&" + a)) },
        N4 = function() { return "function" == typeof window.__onGCastApiAvailable ? window.__onGCastApiAvailable : null },
        P4 = function(a) { a.length ? O4(a.shift(), function() { P4(a) }) : Q4() },
        voa = function(a) { return "chrome-extension://" + a + R4 },
        O4 = function(a, b, c) {
            var d = document.createElement("script");
            d.onerror = b;
            c && (d.onload = c);
            d.src = a;
            (document.head || document.documentElement).appendChild(d)
        },
        Q4 = function() {
            var a = N4();
            a && a(!1, "No cast extension found")
        },
        S4 = function() {
            if (woa) {
                var a = 2,
                    b = N4(),
                    c = function() {
                        a--;
                        0 == a && b && b(!0)
                    };
                window.__onGCastApiAvailable = c;
                O4("//www.gstatic.com/cast/sdk/libs/sender/1.0/cast_framework.js", Q4, c)
            }
        },
        xoa = function() {
            S4();
            var a = window.navigator.userAgent.match(/Chrome\/([0-9]+)/);
            P4(["//www.gstatic.com/eureka/clank/" + (a ? parseInt(a[1], 10) : 0) + R4, "//www.gstatic.com/eureka/clank" + R4])
        },
        T4 = function(a, b, c) {
            g.F.call(this);
            this.B = null != c ? (0, g.y)(a, c) : a;
            this.Mc = b;
            this.A = (0, g.y)(this.YB, this);
            this.g = !1;
            this.l = 0;
            this.o = this.Ca = null;
            this.u = []
        },
        U4 = function() {},
        V4 = function(a, b, c, d) {
            this.g = a;
            this.o = b;
            this.D = c;
            this.B = d || 1;
            this.u = 45E3;
            this.ba = new g.Pn(this);
            this.l = new g.rh;
            this.l.setInterval(250)
        },
        X4 = function(a, b, c) {
            a.wh = 1;
            a.Wf = b4(b.clone());
            a.Ug = c;
            a.A = !0;
            W4(a, null)
        },
        Y4 = function(a, b, c, d, e) {
            a.wh = 1;
            a.Wf = b4(b.clone());
            a.Ug = null;
            a.A = c;
            e && (a.bz = !1);
            W4(a, d)
        },
        W4 = function(a, b) {
            a.ai = (0, g.C)();
            Z4(a);
            a.lg = a.Wf.clone();
            c4(a.lg, "t", a.B);
            a.rk = 0;
            a.jc = a.g.Bo(a.g.hk() ? b : null);
            0 < a.fp && (a.Lm = new g.em((0, g.y)(a.gA, a, a.jc), a.fp));
            a.ba.da(a.jc, "readystatechange", a.LK);
            var c = a.Dg ? g.Ac(a.Dg) : {};
            a.Ug ? (a.zn = "POST", c["Content-Type"] = "application/x-www-form-urlencoded", a.jc.send(a.lg, a.zn, a.Ug, c)) : (a.zn = "GET", a.bz && !g.oe && (c.Connection = "close"), a.jc.send(a.lg, a.zn, null, c));
            a.g.ie(1)
        },
        f5 = function(a, b, c) {
            for (var d = !0; !a.vg && a.rk < c.length;) {
                var e = yoa(a, c);
                if (e == $4) { 4 == b && (a.Xf = 4, a5(15), d = !1); break } else if (e == b5) {
                    a.Xf = 4;
                    a5(16);
                    d = !1;
                    break
                } else c5(a, e)
            }
            4 == b && 0 == c.length && (a.Xf = 1, a5(17), d = !1);
            a.pe = a.pe && d;
            d || (d5(a), e5(a))
        },
        yoa = function(a, b) {
            var c = a.rk,
                d = b.indexOf("\n", c);
            if (-1 == d) return $4;
            c = Number(b.substring(c, d));
            if (isNaN(c)) return b5;
            d += 1;
            if (d + c > b.length) return $4;
            var e = b.substr(d, c);
            a.rk = d + c;
            return e
        },
        i5 = function(a, b) {
            a.ai = (0, g.C)();
            Z4(a);
            var c = b ? window.location.hostname : "";
            a.lg = a.Wf.clone();
            g.Jn(a.lg, "DOMAIN", c);
            g.Jn(a.lg, "t", a.B);
            try { a.re = new ActiveXObject("htmlfile") } catch (n) {
                d5(a);
                a.Xf = 7;
                a5(22);
                e5(a);
                return
            }
            var d = "<html><body>";
            if (b) {
                for (var e = "", f = 0; f < c.length; f++) {
                    var k = c.charAt(f);
                    if ("<" == k) e += "\\x3c";
                    else if (">" == k) e += "\\x3e";
                    else {
                        var l = k;
                        if (l in g5) k = g5[l];
                        else if (l in h5) k = g5[l] = h5[l];
                        else {
                            var m = l.charCodeAt(0);
                            if (31 < m && 127 > m) k = l;
                            else {
                                if (256 > m) { if (k = "\\x", 16 > m || 256 < m) k += "0" } else k = "\\u", 4096 > m && (k += "0");
                                k += m.toString(16).toUpperCase()
                            }
                            k =
                                g5[l] = k
                        }
                        e += k
                    }
                }
                d += '<script>document.domain="' + e + '"\x3c/script>'
            }
            c = g.Qd(g.dd("b/12014412"), d + "</body></html>");
            a.re.open();
            a.re.write(g.Gd(c));
            a.re.close();
            a.re.parentWindow.m = (0, g.y)(a.cK, a);
            a.re.parentWindow.d = (0, g.y)(a.ky, a, !0);
            a.re.parentWindow.rpcClose = (0, g.y)(a.ky, a, !1);
            c = a.re.createElement("DIV");
            a.re.parentWindow.document.body.appendChild(c);
            d = g.rd(a.lg.toString());
            d = g.Sb(g.od(d));
            d = g.Qd(g.dd("b/12014412"), '<iframe src="' + d + '"></iframe>');
            g.Ld(c, g.Gd(d));
            a.g.ie(1)
        },
        Z4 = function(a) {
            a.rs = (0, g.C)() +
                a.u;
            j5(a, a.u)
        },
        j5 = function(a, b) {
            if (null != a.oi) throw Error("WatchDog timer not null");
            a.oi = k5((0, g.y)(a.mK, a), b)
        },
        l5 = function(a) { a.oi && (g.v.clearTimeout(a.oi), a.oi = null) },
        e5 = function(a) { a.g.hv() || a.vg || a.g.xm(a) },
        d5 = function(a) {
            l5(a);
            g.Wf(a.Lm);
            a.Lm = null;
            a.l.stop();
            g.Rn(a.ba);
            if (a.jc) {
                var b = a.jc;
                a.jc = null;
                b.abort();
                b.dispose()
            }
            a.re && (a.re = null)
        },
        c5 = function(a, b) { try { a.g.ey(a, b), a.g.ie(4) } catch (c) {} },
        n5 = function(a, b, c, d, e) {
            if (0 == d) c(!1);
            else {
                var f = e || 0;
                d--;
                m5(a, b, function(e) { e ? c(!0) : g.v.setTimeout(function() { n5(a, b, c, d, f) }, f) })
            }
        },
        m5 = function(a, b, c) {
            var d = new Image;
            d.onload = function() { try { o5(d), c(!0) } catch (e) {} };
            d.onerror = function() { try { o5(d), c(!1) } catch (e) {} };
            d.onabort = function() { try { o5(d), c(!1) } catch (e) {} };
            d.ontimeout = function() { try { o5(d), c(!1) } catch (e) {} };
            g.v.setTimeout(function() { if (d.ontimeout) d.ontimeout() }, b);
            d.src = a
        },
        o5 = function(a) {
            a.onload = null;
            a.onerror = null;
            a.onabort = null;
            a.ontimeout = null
        },
        p5 = function(a) {
            this.g = a;
            this.l = new U4
        },
        r5 = function(a) {
            var b = q5(a.g, a.Gi, "/mail/images/cleardot.gif");
            b4(b);
            n5(b.toString(), 5E3, (0, g.y)(a.rB, a), 3, 2E3);
            a.ie(1)
        },
        t5 = function(a) {
            var b = a.g.G;
            if (null != b) a5(5), b ? (a5(11), s5(a.g, a, !1)) : (a5(12), s5(a.g, a, !0));
            else if (a.Fd = new V4(a, void 0, void 0, void 0), a.Fd.Dg = a.cp, b = a.g, b = q5(b, b.hk() ? a.mj : null, a.ep), a5(5), !g.me || g.Uc(10)) c4(b, "TYPE", "xmlhttp"), Y4(a.Fd, b, !1, a.mj, !1);
            else {
                c4(b, "TYPE", "html");
                var c = a.Fd;
                a = !!a.mj;
                c.wh = 3;
                c.Wf = b4(b.clone());
                i5(c, a)
            }
        },
        u5 = function(a, b, c) {
            this.g = 1;
            this.l = [];
            this.u = [];
            this.A = new U4;
            this.F = a || null;
            this.G = null != b ? b : null;
            this.B = c || !1
        },
        zoa = function(a, b) {
            this.g = a;
            this.map = b;
            this.context = null
        },
        v5 = function(a) { g.Yf.call(this, "statevent", a) },
        w5 = function(a, b) {
            g.Yf.call(this, "timingevent", a);
            this.size = b
        },
        x5 = function(a) { g.Yf.call(this, "serverreachability", a) },
        B5 = function(a) {
            y5(a);
            if (3 == a.g) {
                var b = a.Uj++,
                    c = a.il.clone();
                g.Jn(c, "SID", a.o);
                g.Jn(c, "RID", b);
                g.Jn(c, "TYPE", "terminate");
                z5(a, c);
                b = new V4(a, a.o, b, void 0);
                b.wh = 2;
                b.Wf = b4(c.clone());
                (new Image).src = b.Wf;
                b.ai = (0, g.C)();
                Z4(b)
            }
            A5(a)
        },
        D5 = function(a) {
            a.FB(1, 0);
            a.il = q5(a, null, a.bp);
            C5(a)
        },
        y5 = function(a) {
            a.Mf && (a.Mf.abort(), a.Mf = null);
            a.Ob && (a.Ob.cancel(), a.Ob = null);
            a.bf && (g.v.clearTimeout(a.bf), a.bf = null);
            E5(a);
            a.qd && (a.qd.cancel(), a.qd = null);
            a.Tf && (g.v.clearTimeout(a.Tf), a.Tf = null)
        },
        F5 = function(a, b) {
            if (0 == a.g) throw Error("Invalid operation: sending map when state is closed");
            a.l.push(new zoa(a.lG++, b));
            2 != a.g && 3 != a.g || C5(a)
        },
        C5 = function(a) { a.qd || a.Tf || (a.Tf = k5((0, g.y)(a.jy, a), 0), a.rh = 0) },
        I5 = function(a, b) {
            if (1 == a.g) {
                if (!b) {
                    a.Uj = Math.floor(1E5 * Math.random());
                    var c = a.Uj++,
                        d = new V4(a, "", c, void 0);
                    d.Dg = null;
                    var e = G5(a),
                        f = a.il.clone();
                    g.Jn(f, "RID", c);
                    g.Jn(f, "CVER", "1");
                    z5(a, f);
                    X4(d, f, e);
                    a.qd = d;
                    a.g = 2
                }
            } else 3 == a.g && (b ? H5(a, b) : 0 == a.l.length || a.qd || H5(a))
        },
        H5 = function(a, b) {
            if (b)
                if (6 < a.wg) {
                    a.l = a.u.concat(a.l);
                    a.u.length = 0;
                    var c = a.Uj - 1;
                    var d = G5(a)
                } else c = b.D, d = b.Ug;
            else c = a.Uj++, d = G5(a);
            var e = a.il.clone();
            g.Jn(e, "SID", a.o);
            g.Jn(e, "RID", c);
            g.Jn(e, "AID", a.Ih);
            z5(a, e);
            c = new V4(a, a.o, c, a.rh + 1);
            c.Dg = null;
            c.setTimeout(1E4 + Math.round(1E4 * Math.random()));
            a.qd = c;
            X4(c, e, d)
        },
        z5 = function(a, b) {
            if (a.Kc) {
                var c = a.Kc.Nu();
                c && g.ic(c, function(a, c) { g.Jn(b, c, a) })
            }
        },
        G5 = function(a) {
            var b = Math.min(a.l.length, 1E3),
                c = ["count=" + b];
            if (6 < a.wg && 0 < b) {
                var d = a.l[0].g;
                c.push("ofs=" + d)
            } else d = 0;
            for (var e = 0; e < b; e++) {
                var f = a.l[e].g,
                    k = a.l[e].map;
                f = 6 >= a.wg ? e : f - d;
                try { g.ic(k, function(a, b) { c.push("req" + f + "_" + b + "=" + encodeURIComponent(a)) }) } catch (l) { c.push("req" + f + "_type=" + encodeURIComponent("_badmap")) }
            }
            a.u = a.u.concat(a.l.splice(0, b));
            return c.join("&")
        },
        J5 = function(a) { a.Ob || a.bf || (a.D = 1, a.bf = k5((0, g.y)(a.iy, a), 0), a.oh = 0) },
        L5 = function(a) {
            if (a.Ob || a.bf || 3 <= a.oh) return !1;
            a.D++;
            a.bf = k5((0, g.y)(a.iy, a), K5(a, a.oh));
            a.oh++;
            return !0
        },
        s5 = function(a, b, c) {
            a.wn = c;
            a.ze = b.pf;
            a.B || D5(a)
        },
        E5 = function(a) { null != a.zg && (g.v.clearTimeout(a.zg), a.zg = null) },
        K5 = function(a, b) {
            var c = 5E3 + Math.floor(1E4 * Math.random());
            a.isActive() || (c *= 2);
            return c * b
        },
        N5 = function(a, b) {
            if (2 == b || 9 == b) {
                var c = null;
                a.Kc && (c = null);
                var d = (0, g.y)(a.nL, a);
                c || (c = new g.Bn("//www.google.com/images/cleardot.gif"), b4(c));
                m5(c.toString(), 1E4, d)
            } else a5(2);
            M5(a, b)
        },
        M5 = function(a, b) {
            a.g = 0;
            a.Kc && a.Kc.Qt(b);
            A5(a);
            y5(a)
        },
        A5 = function(a) {
            a.g = 0;
            a.ze = -1;
            if (a.Kc)
                if (0 == a.u.length && 0 == a.l.length) a.Kc.qo();
                else {
                    g.ob(a.u);
                    var b = g.ob(a.l);
                    a.u.length = 0;
                    a.l.length = 0;
                    a.Kc.qo(b)
                }
        },
        q5 = function(a, b, c) {
            var d = g.Kn(c);
            if ("" != d.g) b && g.Dn(d, b + "." + d.g), g.En(d, d.A);
            else {
                var e = window.location;
                d = loa(e.protocol, b ? b + "." + e.hostname : e.hostname, +e.port, c)
            }
            a.Ti && g.ic(a.Ti, function(a, b) { g.Jn(d, b, a) });
            g.Jn(d, "VER", a.wg);
            z5(a, d);
            return d
        },
        k5 = function(a, b) {
            if (!g.Oa(a)) throw Error("Fn must not be null and must be a function");
            return g.v.setTimeout(function() { a() }, b)
        },
        a5 = function(a) { O5.dispatchEvent(new v5(O5, a)) },
        P5 = function() {},
        Aoa = function(a, b) {
            this.action = a;
            this.params = b || {}
        },
        Q5 = function(a, b) {
            g.F.call(this);
            this.g = new g.L(this.UJ, 0, this);
            g.H(this, this.g);
            this.Mc = 5E3;
            this.l = 0;
            if (g.Oa(a)) b && (a = (0, g.y)(a, b));
            else if (a && g.Oa(a.handleEvent)) a = (0, g.y)(a.handleEvent, a);
            else throw Error("Invalid listener argument");
            this.o = a
        },
        R5 = function(a, b, c) {
            this.I = a;
            this.B = b;
            this.o = new g.mp;
            this.l = new Q5(this.IL, this);
            this.g = null;
            this.Za = !1;
            this.A = null;
            this.G = "";
            this.F = this.u = 0;
            this.D = [];
            this.O = c || !1
        },
        Boa = function(a) {
            return {
                firstTestResults: [""],
                secondTestResults: !a.g.wn,
                sessionId: a.g.o,
                arrayId: a.g.Ih
            }
        },
        S5 = function(a, b) {
            a.F = b || 0;
            a.l.stop();
            a.g && (3 == a.g.g && I5(a.g), B5(a.g));
            a.F = 0
        },
        T5 = function(a) { return !!a.g && 3 == a.g.g },
        Coa = function(a, b) {
            (a.B.loungeIdToken = b) || a.l.stop()
        },
        U5 = function(a) {
            this.port = this.domain = "";
            this.g = "/api/lounge";
            this.l = !0;
            a = a || document.location.href;
            var b = g.Jh(a) || "";
            b && (this.port = ":" + b);
            this.domain = g.Ih(a) || "";
            a = g.gc;
            0 <= a.search("MSIE") && (a = a.match(/MSIE ([\d.]+)/)[1], 0 > g.ac(a, "10.0") && (this.l = !1))
        },
        V5 = function(a, b) {
            var c = a.g;
            if (g.Fa(void 0) ? 0 : a.l) c = "https://" + a.domain + a.port + a.g;
            return g.Sh(c + b, {})
        },
        W5 = function(a, b, c, d, e) {
            a = {
                format: "JSON",
                method: "POST",
                context: a,
                timeout: 5E3,
                withCredentials: !1,
                onSuccess: g.Va(a.u, d, !0),
                onError: g.Va(a.o, e),
                fd: g.Va(a.A, e)
            };
            c && (a.rb = c, a.headers = { "Content-Type": "application/x-www-form-urlencoded" });
            return g.gr(b, a)
        },
        Doa = function() {
            var a = X5;
            Y5();
            Z5.push(a);
            $5(Z5)
        },
        a6 = function(a, b) {
            Y5();
            var c = Z5,
                d = Eoa(a, String(b));
            0 == c.length ? Foa(d) : ($5(c), (0, g.A)(c, function(a) { a(d) }))
        },
        Y5 = function() { Z5 || (Z5 = g.w("yt.mdx.remote.debug.handlers_") || [], g.Ia("yt.mdx.remote.debug.handlers_", Z5, void 0)) },
        Foa = function(a) {
            var b = (b6 + 1) % 50;
            b6 = b;
            c6[b] = a;
            d6 || (d6 = 49 == b)
        },
        $5 = function(a) {
            var b = c6;
            if (b[0]) {
                var c = b6,
                    d = d6 ? c : -1;
                do {
                    d = (d + 1) % 50;
                    var e = b[d];
                    (0, g.A)(a, function(a) { a(e) })
                } while (d != c);
                c6 = Array(50);
                b6 = -1;
                d6 = !1
            }
        },
        Eoa = function(a, b) {
            var c = ((0, g.C)() - Goa) / 1E3;
            c.toFixed && (c = c.toFixed(3));
            var d = [];
            d.push("[", c + "s", "] ");
            d.push("[", "yt.mdx.remote", "] ");
            d.push(a + ": " + b, "\n");
            return d.join("")
        },
        e6 = function(a) {
            g.N.call(this);
            this.D = a;
            this.g = []
        },
        f6 = function(a, b) {
            var c = a.get(b.uuid) || a.get(b.id);
            if (c) {
                var d = c.name;
                c.id = b.id || c.id;
                c.name = b.name;
                c.token = b.token;
                c.uuid = b.uuid || c.uuid;
                return c.name != d
            }
            a.g.push(b);
            return !0
        },
        Hoa = function(a, b) {
            var c = a.g.length != b.length;
            a.g = (0, g.Be)(a.g, function(a) { return !!z4(b, a) });
            for (var d = 0, e = b.length; d < e; d++) c = f6(a, b[d]) || c;
            return c
        },
        Ioa = function(a, b) {
            var c = a.g.length;
            a.g = (0, g.Be)(a.g, function(a) { return !(a || b ? !a != !b ? 0 : a.id == b.id : 1) });
            return a.g.length < c
        },
        g6 = function(a, b, c, d) {
            g.N.call(this);
            this.B = a;
            this.A = b;
            this.o = c;
            this.u = d;
            this.l = 0;
            this.g = null;
            this.Ca = NaN
        },
        i6 = function(a) {
            e6.call(this, "LocalScreenService");
            this.o = a;
            this.l = NaN;
            h6(this);
            this.info("Initializing with " + x4(this.g))
        },
        j6 = function(a) {
            if (a.g.length) {
                var b = (0, g.D)(a.g, function(a) { return a.id }),
                    c = V5(a.o, "/pairing/get_lounge_token_batch");
                W5(a.o, c, { screen_ids: b.join(",") }, (0, g.y)(a.hC, a), (0, g.y)(a.gC, a))
            }
        },
        h6 = function(a) {
            var b = v4(H4());
            b = (0, g.Be)(b, function(a) { return !a.uuid });
            return Hoa(a, b)
        },
        k6 = function(a, b) {
            toa((0, g.D)(a.g, u4));
            b && I4()
        },
        m6 = function(a, b) {
            g.N.call(this);
            this.B = b;
            var c = g.Lt("yt-remote-online-screen-ids") || "";
            c = c ? c.split(",") : [];
            for (var d = {}, e = this.B(), f = 0, k = e.length; f < k; ++f) {
                var l = e[f].id;
                d[l] = g.fb(c, l)
            }
            this.g = d;
            this.A = a;
            this.o = this.u = NaN;
            this.l = null;
            l6("Initialized with " + g.zh(this.g))
        },
        n6 = function(a, b, c) {
            var d = V5(a.A, "/pairing/get_screen_availability");
            W5(a.A, d, { lounge_token: b.token }, (0, g.y)(function(a) {
                a = a.screens || [];
                for (var d = 0, e = a.length; d < e; ++d)
                    if (a[d].loungeToken == b.token) { c("online" == a[d].status); return }
                c(!1)
            }, a), (0, g.y)(function() { c(!1) }, a))
        },
        o6 = function(a, b) {
            a: if (o4(b) != o4(a.g)) var c = !1;
                else {
                    c = g.pc(b);
                    for (var d = 0, e = c.length; d < e; ++d)
                        if (!a.g[c[d]]) { c = !1; break a }
                    c = !0
                }c || (l6("Updated online screens: " + g.zh(a.g)), a.g = b, a.N("screenChange"));Joa(a)
        },
        p6 = function(a) {
            isNaN(a.o) || g.uq(a.o);
            a.o = g.sq((0, g.y)(a.ur, a), 0 < a.u && a.u < (0, g.C)() ? 2E4 : 1E4)
        },
        l6 = function(a) { a6("OnlineScreenService", a) },
        q6 = function(a) {
            var b = {};
            (0, g.A)(a.B(), function(a) { a.token ? b[a.token] = a.id : this.Gb("Requesting availability of screen w/o lounge token.") });
            return b
        },
        Joa = function(a) {
            a = g.pc(g.jc(a.g, function(a) { return a }));
            g.yb(a);
            a.length ? g.Kt("yt-remote-online-screen-ids", a.join(","), 60) : g.Mt("yt-remote-online-screen-ids")
        },
        r6 = function(a) {
            e6.call(this, "ScreenService");
            this.B = a;
            this.l = this.o = null;
            this.u = [];
            this.A = {};
            Koa(this)
        },
        t6 = function(a, b, c, d, e, f) {
            a.info("getAutomaticScreenByIds " + c + " / " + b);
            c || (c = a.A[b]);
            var k = a.Ad();
            if (k = (c ? A4(k, c) : null) || A4(k, b)) {
                k.uuid = b;
                var l = s6(a, k);
                n6(a.l, l, function(a) { e(a ? l : null) })
            } else c ? Loa(a, c, (0, g.y)(function(a) {
                var f = s6(this, new s4({
                    name: d,
                    screenId: c,
                    loungeToken: a,
                    dialId: b || ""
                }));
                n6(this.l, f, function(a) { e(a ? f : null) })
            }, a), f) : e(null)
        },
        u6 = function(a, b) {
            for (var c = 0, d = a.g.length; c < d; ++c)
                if (a.g[c].name == b) return a.g[c];
            return null
        },
        Loa = function(a, b, c, d) {
            a.info("requestLoungeToken_ for " + b);
            var e = {
                rb: { screen_ids: b },
                method: "POST",
                context: a,
                onSuccess: function(a, e) {
                    var f = e && e.screens || [];
                    f[0] && f[0].screenId == b ? c(f[0].loungeToken) : d(Error("Missing lounge token in token response"))
                },
                onError: function() { d(Error("Request screen lounge token failed")) }
            };
            g.gr(V5(a.B, "/pairing/get_lounge_token_batch"), e)
        },
        v6 = function(a) {
            a.g = a.o.Ad();
            var b = a.A,
                c = {},
                d;
            for (d in b) c[b[d]] = d;
            b = 0;
            for (d = a.g.length; b < d; ++b) {
                var e = a.g[b];
                e.uuid = c[e.id] || ""
            }
            a.info("Updated manual screens: " + x4(a.g))
        },
        Koa = function(a) {
            w6(a);
            a.o = new i6(a.B);
            a.o.subscribe("screenChange", (0, g.y)(a.qC, a));
            v6(a);
            a.u = v4(g.Lt("yt-remote-automatic-screen-cache") || []);
            w6(a);
            a.info("Initializing automatic screens: " + x4(a.u));
            a.l = new m6(a.B, (0, g.y)(a.Ad, a, !0));
            a.l.subscribe("screenChange", (0, g.y)(function() { this.N("onlineScreenChange") }, a))
        },
        s6 = function(a, b) {
            var c = a.get(b.id);
            c ? (c.uuid = b.uuid, b = c) : ((c = A4(a.u, b.uuid)) ? (c.id = b.id, c.token = b.token, b = c) : a.u.push(b), g.Kt("yt-remote-automatic-screen-cache", (0, g.D)(a.u, u4)));
            w6(a);
            a.A[b.uuid] = b.id;
            g.Kt("yt-remote-device-id-map", a.A, 31536E3);
            return b
        },
        w6 = function(a) { a.A = g.Lt("yt-remote-device-id-map") || {} },
        x6 = function(a, b, c) {
            g.N.call(this);
            this.L = c;
            this.G = a;
            this.l = b;
            this.o = null
        },
        y6 = function(a, b) { a6(a.L, b) },
        A6 = function(a, b) {
            x6.call(this, a, b, "CastSession");
            this.g = null;
            this.u = 0;
            this.B = (0, g.y)(this.PL, this);
            this.A = (0, g.y)(this.xK, this);
            this.u = g.sq((0, g.y)(function() { z6(this, null) }, this), 12E4)
        },
        Moa = function(a) {
            a.info("sendYoutubeMessage_: getMdxSessionStatus " + g.zh(void 0));
            var b = { type: "getMdxSessionStatus" };
            a.g ? a.g.sendMessage("urn:x-cast:com.google.youtube.mdx", b, g.Ja, (0, g.y)(function() { y6(this, "Failed to send message: getMdxSessionStatus.") }, a)) : y6(a, "Sending yt message without session: " + g.zh(b))
        },
        z6 = function(a, b) {
            g.uq(a.u);
            if (b) {
                if (a.info("onConnectedScreenId_: Received screenId: " + b), !a.o || a.o.id != b) {
                    var c = (0, g.y)(a.ym, a),
                        d = (0, g.y)(a.Dd, a);
                    a.Zu(b, c, d, 5)
                }
            } else a.Dd(Error("Waiting for session status timed out."))
        },
        B6 = function(a, b, c) {
            x6.call(this, a, b, "DialSession");
            this.u = this.F = null;
            this.I = "";
            this.P = c;
            this.A = null;
            this.D = g.Ja;
            this.B = NaN;
            this.O = (0, g.y)(this.SL, this);
            this.g = g.Ja
        },
        C6 = function(a) {
            a.g = a.G.lA(a.I, a.l.label, a.l.friendlyName, (0, g.y)(function(a) {
                this.g = g.Ja;
                this.ym(a)
            }, a), (0, g.y)(function(a) {
                this.g = g.Ja;
                this.Dd(a)
            }, a))
        },
        D6 = function(a) {
            var b = {};
            b.pairingCode = a.I;
            b.theme = a.P;
            if (a.A) {
                var c = a.A.currentTime || 0;
                b.v = a.A.videoId;
                b.t = c
            }
            L4() && (b.env_useStageMdx = 1);
            return g.Qh(b)
        },
        E6 = function(a, b) {
            x6.call(this, a, b, "ManualSession");
            this.g = g.sq((0, g.y)(this.Kh, this, null), 150)
        },
        F6 = function(a, b, c, d) {
            g.N.call(this);
            this.l = a;
            this.D = b || "233637DE";
            this.B = c || "cl";
            this.F = d || !1;
            this.g = null;
            this.A = !1;
            this.o = [];
            this.u = (0, g.y)(this.gJ, this)
        },
        G6 = function(a, b) { return b ? g.bb(a.o, function(a) { return t4(b, a.label) }, a) : null },
        H6 = function(a) { a6("Controller", a) },
        X5 = function(a) { window.chrome && chrome.cast && chrome.cast.logMessage && chrome.cast.logMessage(a) },
        I6 = function(a) { return a.A || !!a.o.length || !!a.g },
        J6 = function(a, b, c) {
            b != a.g && (g.Wf(a.g), (a.g = b) ? (c ? a.N("yt-remote-cast2-receiver-resumed", b.l) : a.N("yt-remote-cast2-receiver-selected",
                b.l), b.subscribe("sessionScreen", (0, g.y)(a.hy, a, b)), b.o ? a.N("yt-remote-cast2-session-change", b.o) : c && a.g.Kh(null)) : a.N("yt-remote-cast2-session-change", null))
        },
        K6 = function(a) {
            var b = a.l.kA(),
                c = a.g && a.g.l;
            a = (0, g.D)(b, function(a) {
                c && t4(a, c.label) && (c = null);
                var b = a.uuid ? a.uuid : a.id,
                    d = G6(this, a);
                d ? (d.label = b, d.friendlyName = a.name) : (d = new chrome.cast.Receiver(b, a.name), d.receiverType = chrome.cast.ReceiverType.CUSTOM);
                return d
            }, a);
            c && (c.receiverType != chrome.cast.ReceiverType.CUSTOM && (c = new chrome.cast.Receiver(c.label, c.friendlyName), c.receiverType = chrome.cast.ReceiverType.CUSTOM), a.push(c));
            return a
        },
        Qoa = function(a, b, c, d, e, f, k) {
            Noa() ? Ooa(b, e, f, k) && (M6(!0), window.chrome && chrome.cast && chrome.cast.isAvailable ? N6(a, c) : (window.__onGCastApiAvailable = function(b, d) { b ? N6(a, c) : (O6("Failed to load cast API: " + d), P6(!1), M6(!1), g.Mt("yt-remote-cast-available"), g.Mt("yt-remote-cast-receiver"), Q6(), c(!1)) }, d ? g.Fq("https://www.gstatic.com/cv/js/sender/v1/cast_sender.js") :
                0 <= window.navigator.userAgent.indexOf("Android") && 0 <= window.navigator.userAgent.indexOf("Chrome/") && window.navigator.presentation ? xoa() : !window.chrome || !window.navigator.presentation || 0 <= window.navigator.userAgent.indexOf("Edge") ? Q4() : (S4(), P4(Poa.map(voa))))) : L6("Cannot initialize because not running Chrome")
        },
        Q6 = function() {
            L6("dispose");
            var a = R6();
            a && a.dispose();
            g.Ia("yt.mdx.remote.cloudview.instance_", null, void 0);
            S6(!1);
            g.Aq(T6);
            T6.length = 0
        },
        U6 = function() { return !!g.Lt("yt-remote-cast-installed") },
        V6 = function() {
            var a = g.Lt("yt-remote-cast-receiver");
            return a ? a.friendlyName : null
        },
        W6 = function() {
            L6("clearCurrentReceiver");
            g.Mt("yt-remote-cast-receiver")
        },
        X6 = function() { return U6() ? R6() ? R6().getCastSession() : (O6("getCastSelector: Cast is not initialized."), null) : (O6("getCastSelector: Cast API is not installed!"), null) },
        Z6 = function() { U6() ? R6() ? Y6() ? (L6("Requesting cast selector."), R6().requestSession()) : (L6("Wait for cast API to be ready to request the session."), T6.push(g.zq("yt-remote-cast2-api-ready", Z6))) : O6("requestCastSelector: Cast is not initialized.") : O6("requestCastSelector: Cast API is not installed!") },
        $6 =
        function(a, b) { Y6() ? R6().setConnectedScreenStatus(a, b) : O6("setConnectedScreenStatus called before ready.") },
        Noa = function() {
            var a = 0 <= g.gc.search(/ (CrMo|Chrome|CriOS)\//);
            return g.mx || a
        },
        Roa = function(a, b) { R6().init(a, b) },
        Ooa = function(a, b, c, d) {
            var e = !1;
            R6() || (a = new F6(a, b, c, d), a.subscribe("yt-remote-cast2-availability-change", function(a) {
                g.Kt("yt-remote-cast-available", a);
                q4("yt-remote-cast2-availability-change", a)
            }), a.subscribe("yt-remote-cast2-receiver-selected", function(a) {
                L6("onReceiverSelected: " + a.friendlyName);
                g.Kt("yt-remote-cast-receiver", a);
                q4("yt-remote-cast2-receiver-selected", a)
            }), a.subscribe("yt-remote-cast2-receiver-resumed", function(a) {
                L6("onReceiverResumed: " + a.friendlyName);
                g.Kt("yt-remote-cast-receiver", a)
            }), a.subscribe("yt-remote-cast2-session-change", function(a) {
                L6("onSessionChange: " + w4(a));
                a || g.Mt("yt-remote-cast-receiver");
                q4("yt-remote-cast2-session-change", a)
            }), g.Ia("yt.mdx.remote.cloudview.instance_", a, void 0), e = !0);
            L6("cloudview.createSingleton_: " + e);
            return e
        },
        R6 = function() { return g.w("yt.mdx.remote.cloudview.instance_") },
        N6 = function(a, b) {
            P6(!0);
            M6(!1);
            Roa(a, function(a) {
                a ? (S6(!0), g.Cq("yt-remote-cast2-api-ready")) : (O6("Failed to initialize cast API."), P6(!1), g.Mt("yt-remote-cast-available"), g.Mt("yt-remote-cast-receiver"), Q6());
                b(a)
            })
        },
        L6 = function(a) { a6("cloudview", a) },
        O6 = function(a) { a6("cloudview", a) },
        P6 = function(a) {
            L6("setCastInstalled_ " + a);
            g.Kt("yt-remote-cast-installed", a)
        },
        Y6 = function() { return !!g.w("yt.mdx.remote.cloudview.apiReady_") },
        S6 = function(a) {
            L6("setApiReady_ " + a);
            g.Ia("yt.mdx.remote.cloudview.apiReady_", a, void 0)
        },
        M6 = function(a) { g.Ia("yt.mdx.remote.cloudview.initializing_", a, void 0) },
        a7 = function(a) {
            this.index = -1;
            this.videoId = this.listId = "";
            this.volume = this.playerState = -1;
            this.muted = !1;
            this.audioTrackId = null;
            this.B = this.D = 0;
            this.g = null;
            this.hasNext = this.Be = !1;
            this.G = this.F = this.l = this.u = 0;
            this.o = NaN;
            this.A = !1;
            this.reset(a)
        },
        b7 = function(a) {
            a.audioTrackId = null;
            a.g = null;
            a.playerState = -1;
            a.Be = !1;
            a.hasNext = !1;
            a.D = 0;
            a.B = (0, g.C)();
            a.u = 0;
            a.l = 0;
            a.F = 0;
            a.G = 0;
            a.o = NaN;
            a.A = !1
        },
        c7 = function(a) { return 1 == a.playerState ? ((0, g.C)() - a.B) / 1E3 : 0 },
        d7 = function(a, b) {
            a.D = b;
            a.B = (0, g.C)()
        },
        e7 = function(a) {
            switch (a.playerState) {
                case 1:
                case 1081:
                    return ((0, g.C)() - a.B) / 1E3 + a.D;
                case -1E3:
                    return 0
            }
            return a.D
        },
        f7 = function(a, b, c) {
            var d = a.videoId;
            a.videoId = b;
            a.index = c;
            b != d && b7(a)
        },
        g7 = function(a) {
            var b = {};
            b.index = a.index;
            b.listId = a.listId;
            b.videoId = a.videoId;
            b.playerState = a.playerState;
            b.volume = a.volume;
            b.muted = a.muted;
            b.audioTrackId = a.audioTrackId;
            b.trackData = g.Bc(a.g);
            b.hasPrevious = a.Be;
            b.hasNext = a.hasNext;
            b.playerTime = a.D;
            b.playerTimeAt = a.B;
            b.seekableStart = a.u;
            b.seekableEnd = a.l;
            b.duration = a.F;
            b.loadedTime = a.G;
            b.liveIngestionTime = a.o;
            return b
        },
        j7 = function(a, b) {
            g.N.call(this);
            this.g = 0;
            this.u = a;
            this.B = [];
            this.A = new p4;
            this.o = this.l = null;
            this.G = (0, g.y)(this.VG, this);
            this.D = (0, g.y)(this.Vj, this);
            this.F = (0, g.y)(this.UG, this);
            this.I = (0, g.y)(this.hH, this);
            var c = 0;
            a ? (c = a.getProxyState(), 3 != c && (a.subscribe("proxyStateChange", this.ws, this), h7(this))) : c = 3;
            0 != c && (b ? this.ws(c) : g.sq((0, g.y)(function() { this.ws(c) }, this), 0));
            var d = X6();
            d && i7(this, d);
            this.subscribe("yt-remote-cast2-session-change", this.I)
        },
        k7 = function(a) { return new a7(a.u.getPlayerContextData()) },
        h7 = function(a) {
            (0, g.A)("nowAutoplaying autoplayDismissed remotePlayerChange remoteQueueChange autoplayModeChange autoplayUpNext previousNextChange".split(" "), function(a) { this.B.push(this.u.subscribe(a, g.Va(this.cJ, a), this)) }, a)
        },
        l7 = function(a) {
            (0, g.A)(a.B, function(a) { this.u.unsubscribeByKey(a) }, a);
            a.B.length = 0
        },
        m7 = function(a, b) {
            var c = a.A;
            50 > c.g.length + c.l.length && a.A.l.push(b)
        },
        o7 = function(a, b, c) {
            var d = k7(a);
            d7(d, c); - 1E3 != d.playerState && (d.playerState = b);
            n7(a, d)
        },
        p7 = function(a, b, c) { a.u.sendMessage(b, c) },
        n7 = function(a, b) {
            l7(a);
            a.u.setPlayerContextData(g7(b));
            h7(a)
        },
        i7 = function(a, b) {
            a.o && (a.o.removeUpdateListener(a.G), a.o.removeMediaListener(a.D), a.Vj(null));
            a.o = b;
            a.o && (a6("CP", "Setting cast session: " + a.o.sessionId), a.o.addUpdateListener(a.G), a.o.addMediaListener(a.D), a.o.media.length && a.Vj(a.o.media[0]))
        },
        q7 = function(a) {
            var b = a.l.media,
                c = a.l.customData;
            if (b && c) {
                var d = k7(a);
                b.contentId != d.videoId && a6("CP", "Cast changing video to: " + b.contentId);
                d.videoId = b.contentId;
                d.playerState = c.playerState;
                d7(d, a.l.getEstimatedTime());
                n7(a, d)
            } else a6("CP", "No cast media video. Ignoring state update.")
        },
        r7 = function(a, b, c) {
            return (0, g.y)(function(a) {
                this.Gb("Failed to " + b + " with cast v2 channel. Error code: " + a.code);
                a.code != chrome.cast.ErrorCode.TIMEOUT && (this.Gb("Retrying " + b + " using MDx browser channel."), p7(this, b, c))
            }, a)
        },
        s7 = function(a, b, c) {
            g.N.call(this);
            this.A = NaN;
            this.P = !1;
            this.I = this.G = this.O = this.L = NaN;
            this.T = [];
            this.u = this.D = this.o = this.Qa = this.g = null;
            this.oa = a;
            this.T.push(g.fs(window, "beforeunload", (0, g.y)(this.aC, this)));
            this.l = [];
            this.Qa = new a7;
            this.aa = b.id;
            this.g = Soa(this, c);
            this.g.subscribe("handlerOpened", this.ZG, this);
            this.g.subscribe("handlerClosed", this.WG, this);
            this.g.subscribe("handlerError", this.XG, this);
            this.g.subscribe("handlerMessage", this.YG, this);
            Coa(this.g, b.token);
            this.subscribe("remoteQueueChange", function() {
                var a = this.Qa.videoId;
                g.Nt() && g.Kt("yt-remote-session-video-id", a)
            }, this)
        },
        t7 = function(a) { a6("conn", a) },
        Soa = function(a, b) { return new R5(V5(a.oa, "/bc"), b) },
        u7 = function(a, b) { a.N("proxyStateChange", b) },
        Toa = function(a) {
            a.A = g.sq((0, g.y)(function() {
                t7("Connecting timeout");
                this.B(1)
            }, a), 2E4)
        },
        v7 = function(a) {
            g.uq(a.A);
            a.A = NaN
        },
        w7 = function(a) {
            g.uq(a.L);
            a.L = NaN
        },
        Uoa = function(a) {
            x7(a);
            a.O = g.sq((0, g.y)(function() { y7(this, "getNowPlaying") }, a), 2E4)
        },
        x7 = function(a) {
            g.uq(a.O);
            a.O = NaN
        },
        A7 = function(a, b) {
            b && (v7(a), w7(a));
            b == (T5(a.g) && isNaN(a.A)) ? b && (u7(a, 1), y7(a, "getSubtitlesTrack")) : b ? (a.R() && a.Qa.reset(), u7(a, 1), y7(a, "getNowPlaying"), z7(a)) : a.B(1)
        },
        Voa = function(a, b) {
            var c = b.params.videoId;
            delete b.params.videoId;
            c == a.Qa.videoId && (g.vc(b.params) ? a.Qa.g = null : a.Qa.g = b.params, a.N("remotePlayerChange"))
        },
        B7 = function(a, b) {
            var c = b.params.videoId || b.params.video_id,
                d = parseInt(b.params.currentIndex, 10);
            a.Qa.listId = b.params.listId || a.Qa.listId;
            f7(a.Qa, c, d);
            a.N("remoteQueueChange")
        },
        Woa = function(a, b) {
            b.params = b.params || {};
            B7(a, b);
            C7(a, b);
            a.N("autoplayDismissed")
        },
        C7 = function(a, b) {
            var c = parseInt(b.params.currentTime || b.params.current_time, 10);
            d7(a.Qa, isNaN(c) ? 0 : c);
            c = parseInt(b.params.state, 10);
            c = isNaN(c) ? -1 : c; - 1 == c && -1E3 == a.Qa.playerState && (c = -1E3);
            a.Qa.playerState = c;
            c = Number(b.params.loadedTime);
            a.Qa.G = isNaN(c) ? 0 : c;
            c = Number(b.params.duration);
            a.Qa.F = isNaN(c) ? 0 : c;
            c = a.Qa;
            var d = Number(b.params.liveIngestionTime);
            c.o = d;
            c.A = isNaN(d) ? !1 : !0;
            c = a.Qa;
            d = Number(b.params.seekableStartTime);
            var e = Number(b.params.seekableEndTime);
            c.u = isNaN(d) ? 0 : d;
            c.l = isNaN(e) ? 0 : e;
            1 == a.Qa.playerState ? Uoa(a) : x7(a);
            a.N("remotePlayerChange")
        },
        Xoa = function(a, b) {
            if (-1E3 !=
                a.Qa.playerState) {
                var c = 1085;
                switch (parseInt(b.params.adState, 10)) {
                    case 1:
                        c = 1081;
                        break;
                    case 2:
                        c = 1084;
                        break;
                    case 0:
                        c = 1083
                }
                a.Qa.playerState = c;
                c = parseInt(b.params.currentTime, 10);
                d7(a.Qa, isNaN(c) ? 0 : c);
                a.N("remotePlayerChange")
            }
        },
        Yoa = function(a, b) {
            var c = "true" == b.params.muted;
            a.Qa.volume = parseInt(b.params.volume, 10);
            a.Qa.muted = c;
            a.N("remotePlayerChange")
        },
        Zoa = function(a, b) {
            a.D = b.params.videoId;
            a.N("nowAutoplaying", parseInt(b.params.timeout, 10))
        },
        $oa = function(a, b) {
            var c = "true" == b.params.hasNext;
            a.Qa.Be = "true" == b.params.hasPrevious;
            a.Qa.hasNext = c;
            a.N("previousNextChange")
        },
        z7 = function(a) {
            g.uq(a.I);
            a.I = g.sq((0, g.y)(a.B, a, 1), 864E5)
        },
        y7 = function(a, b, c) {
            c ? t7("Sending: action=" + b + ", params=" + g.zh(c)) : t7("Sending: action=" + b);
            a.g.sendMessage(b, c)
        },
        D7 = function(a) {
            e6.call(this, "ScreenServiceProxy");
            this.Ac = a;
            this.l = [];
            this.l.push(this.Ac.$_s("screenChange", (0, g.y)(this.NL, this)));
            this.l.push(this.Ac.$_s("onlineScreenChange", (0, g.y)(this.FI, this)))
        },
        epa = function(a) {
            var b = {
                device: "Desktop",
                app: "youtube-desktop"
            };
            b = g.lq("MDX_CONFIG") || b;
            roa();
            F4();
            E7 || (E7 = new U5(b ? b.loungeApiHost : void 0), L4() && (E7.g = "/api/loungedev"));
            F7 || (F7 = g.w("yt.mdx.remote.deferredProxies_") || [], g.Ia("yt.mdx.remote.deferredProxies_", F7, void 0));
            apa();
            var c = G7();
            if (!c) {
                var d = new r6(E7);
                g.Ia("yt.mdx.remote.screenService_", d, void 0);
                c = G7();
                var e = !1,
                    f = void 0,
                    k = void 0,
                    l = !1;
                b && (e = !!b.loadCastApiSetupScript, f = b.appId, k = b.theme, l = !!b.disableDial);
                Qoa(a, d, function(a) {
                    a ? H7() && $6(H7(), "YouTube TV") : d.subscribe("onlineScreenChange",
                        function() { q4("yt-remote-receiver-availability-change") })
                }, e, f, k, l)
            }
            b && !g.w("yt.mdx.remote.initialized_") && (g.Ia("yt.mdx.remote.initialized_", !0, void 0), I7("Initializing: " + g.zh(b)), J7.push(g.zq("yt-remote-cast2-availability-change", function() { q4("yt-remote-receiver-availability-change") })), J7.push(g.zq("yt-remote-cast2-receiver-selected", function() {
                K7(null);
                q4("yt-remote-auto-connect", "cast-selector-receiver")
            })), J7.push(g.zq("yt-remote-cast2-receiver-resumed", function() { q4("yt-remote-receiver-resumed", "cast-selector-receiver") })), J7.push(g.zq("yt-remote-cast2-session-change", bpa)), J7.push(g.zq("yt-remote-connection-change", function(a) { a ? $6(H7(), "YouTube TV") : L7() || ($6(null, null), W6()) })), a = M7(), b.isAuto && (a.id += "#dial"), g.Nq("desktop_enable_autoplay") && (a.capabilities = ["atp"]), a.name = b.device, a.app = b.app, (k = b.theme) && (a.theme = k), I7(" -- with channel params: " +
                g.zh(a)), cpa(a), c.start(), H7() || dpa())
        },
        fpa = function() {
            var a = N7();
            U6() && g.Lt("yt-remote-cast-available") && a.push({ key: "cast-selector-receiver", name: "Cast..." });
            return a
        },
        N7 = function() {
            var a = G7().Ac.$_gos();
            var b = O7();
            b && P7() && (z4(a, b) || a.push(b));
            return qoa(a)
        },
        Q7 = function() {
            var a = gpa();
            !a && U6() && V6() && (a = { key: "cast-selector-receiver", name: V6() });
            return a
        },
        gpa = function() {
            var a = N7(),
                b = O7();
            b || (b = L7());
            return g.bb(a, function(a) { return b && t4(b, a.key) ? !0 : !1 })
        },
        O7 = function() {
            var a = H7();
            if (!a) return null;
            var b = G7().Ad();
            return A4(b, a)
        },
        bpa = function(a) {
            I7("remote.onCastSessionChange_: " + w4(a));
            if (a) {
                var b = O7();
                b && b.id == a.id ? $6(b.id, "YouTube TV") : (b && R7(), S7(a, 1))
            } else P7() && R7()
        },
        R7 = function() {
            Y6() ? R6().stopSession() : O6("stopSession called before API ready.");
            var a = P7();
            a && (a.disconnect(1), T7(null))
        },
        U7 = function() {
            var a = P7();
            return !!a && 3 != a.getProxyState()
        },
        I7 = function(a) { a6("remote", a) },
        G7 = function() {
            if (!V7) {
                var a = g.w("yt.mdx.remote.screenService_");
                V7 = a ? new D7(a) : null
            }
            return V7
        },
        H7 = function() { return g.w("yt.mdx.remote.currentScreenId_") },
        W7 = function(a) { g.Ia("yt.mdx.remote.currentScreenId_", a, void 0) },
        X7 = function() { return g.w("yt.mdx.remote.connectData_") },
        K7 = function(a) { g.Ia("yt.mdx.remote.connectData_", a, void 0) },
        P7 = function() { return g.w("yt.mdx.remote.connection_") },
        T7 = function(a) {
            var b = P7();
            K7(null);
            a || W7("");
            g.Ia("yt.mdx.remote.connection_", a, void 0);
            F7 && ((0, g.A)(F7, function(b) { b(a) }), F7.length = 0);
            b && !a ? q4("yt-remote-connection-change", !1) : !b && a && q4("yt-remote-connection-change", !0)
        },
        L7 = function() {
            var a = g.Nt();
            if (!a) return null;
            var b = G7().Ad();
            return A4(b, a)
        },
        S7 = function(a, b) {
            O7() && O7();
            W7(a.id);
            var c = new s7(E7, a, M7());
            c.connect(b, X7());
            c.subscribe("beforeDisconnect", function(a) { q4("yt-remote-before-disconnect", a) });
            c.subscribe("beforeDispose", function() { P7() && T7(null) });
            T7(c)
        },
        dpa = function() {
            var a = L7();
            a ? (I7("Resume connection to: " + w4(a)), S7(a, 0)) : (J4(), W6(), I7("Skipping connecting because no session screen found."))
        },
        apa = function() {
            var a = M7();
            if (g.vc(a)) {
                a = E4();
                var b = g.Lt("yt-remote-session-name") || "",
                    c = g.Lt("yt-remote-session-app") || "";
                a = { device: "REMOTE_CONTROL", id: a, name: b, app: c, mdxVersion: 3 };
                g.Ia("yt.mdx.remote.channelParams_", a, void 0)
            }
        },
        M7 = function() { return g.w("yt.mdx.remote.channelParams_") || {} },
        cpa = function(a) {
            a ? (g.Kt("yt-remote-session-app", a.app), g.Kt("yt-remote-session-name", a.name)) : (g.Mt("yt-remote-session-app"), g.Mt("yt-remote-session-name"));
            g.Ia("yt.mdx.remote.channelParams_", a, void 0)
        },
        Y7 = function(a, b, c) {
            g.F.call(this);
            this.A = a;
            this.l = b;
            this.o = new g.us(this);
            g.H(this, this.o);
            this.o.K(b, "onCaptionsTrackListChanged", this.WH);
            this.o.K(b, "captionschanged", this.TG);
            this.o.K(b, "captionssettingschanged", this.Az);
            this.o.K(b, "videoplayerreset", this.zm);
            this.o.K(b, "mdxautoplaycancel", this.qB);
            this.T = this.o.K(b, "onVolumeChange", this.Qx);
            this.F = !1;
            this.g = c;
            c.subscribe("proxyStateChange", this.by, this);
            c.subscribe("remotePlayerChange", this.Xj, this);
            c.subscribe("remoteQueueChange", this.zm, this);
            c.subscribe("autoplayUpNext", this.Fx,
                this);
            c.subscribe("previousNextChange", this.Yx, this);
            c.subscribe("nowAutoplaying", this.Ux, this);
            c.subscribe("autoplayDismissed", this.Ex, this);
            this.suggestion = null;
            this.G = new g.eD(64);
            this.u = new g.L(this.yz, 500, this);
            g.H(this, this.u);
            this.B = new g.L(this.zz, 1E3, this);
            g.H(this, this.B);
            this.O = new T4(this.vL, 0, this);
            g.H(this, this.O);
            this.D = {};
            this.L = new g.L(this.Zz, 1E3, this);
            g.H(this, this.L);
            this.I = new g.em(this.zE, 1E3, this);
            g.H(this, this.I);
            this.P = g.Ja;
            this.Az();
            this.zm();
            this.Xj()
        },
        Z7 = function(a, b) {
            a.A.hd(b,
                a.l.getVideoData().lengthSeconds)
        },
        a8 = function(a) {
            Z7(a, 0);
            a.u.stop();
            $7(a, new g.eD(64))
        },
        c8 = function(a, b) {
            if (b8(a) && !a.F) {
                var c = null;
                b && (c = { style: a.l.getSubtitlesUserSettings() }, g.Ec(c, b));
                a.g.nz(a.l.getVideoData(1).videoId, c);
                a.D = k7(a.g).g
            }
        },
        d8 = function(a, b) {
            var c = a.l.getPlaylist();
            if (c) { var d = c.Ua; var e = c.listId.toString() }
            c = a.l.getVideoData(1);
            a.g.playVideo(c.videoId, b, d, e, c.playerParams, c.Bh, n4(c));
            $7(a, new g.eD(1))
        },
        e8 = function(a, b) {
            if (b) {
                var c = a.l.getOption("captions", "tracklist", { fP: 1 });
                c && c.length ? (a.l.setOption("captions", "track", b), a.F = !1) : (a.l.loadModule("captions"), a.F = !0)
            } else a.l.setOption("captions", "track", {})
        },
        b8 = function(a) { return k7(a.g).videoId == a.l.getVideoData(1).videoId },
        $7 = function(a, b) {
            a.B.stop();
            var c = a.G;
            if (!g.kD(c, b)) {
                var d = g.V(b, 2);
                d != g.V(a.G, 2) && g.TJ(a.l, d);
                a.G = b;
                f8(a.A, c, b)
            }
        },
        h8 = function(a) {
            g.T.call(this, {
                C: "div",
                H: "ytp-remote",
                J: [{ C: "div", H: "ytp-remote-display-status", J: [{ C: "div", H: "ytp-remote-display-status-icon", J: [g.TO()] }, { C: "div", H: "ytp-remote-display-status-text", V: "{{statustext}}" }] }]
            });
            this.l = new g.DP(this, 250);
            g.H(this, this.l);
            this.o = a;
            this.K(a, "presentingplayerstatechange", this.u);
            g8(this, g.PJ(a))
        },
        g8 = function(a, b) {
            if (3 == a.o.getPresentingPlayerType()) {
                var c = { RECEIVER_NAME: a.o.getOption("remote", "currentReceiver").name };
                c = g.V(b, 128) ? g.LN("Error on $RECEIVER_NAME", c) : g.lD(b) || g.V(b, 4) ? g.LN("Playing on $RECEIVER_NAME", c) : g.LN("Connected to $RECEIVER_NAME", c);
                a.updateValue("statustext", c);
                a.l.show()
            } else a.l.hide()
        },
        i8 = function(a, b) {
            g.jT.call(this, "Play on", 0, a, b);
            this.l = a;
            this.F = {};
            this.K(a, "onMdxReceiversChange", this.I);
            this.K(a, "presentingplayerstatechange", this.I);
            this.I()
        },
        j8 = function(a) {
            g.rK.call(this, a);
            this.l = { key: y4(), name: "This computer" };
            this.u = null;
            this.A = [];
            this.D = this.g = null;
            this.B = [this.l];
            this.o = this.l;
            this.Jj = new g.eD(64);
            this.F = 0;
            this.Kl = -1;
            if (!g.kz(g.W(this.player))) {
                a = this.player;
                var b = g.DC(a);
                b && (b = b.fm()) && (b = new i8(a, b), g.H(this, b));
                b = new h8(a);
                g.H(this, b);
                g.fK(a, b.element, 4)
            }
        },
        f8 = function(a, b, c) {
            a.Jj = c;
            a.player.N("presentingplayerstatechange", new g.qD(c, b))
        },
        k8 = function(a, b) {
            if (b.key != a.o.key)
                if (b.key == a.l.key) R7();
                else {
                    a.o = b;
                    var c = a.player.getPlaylistId();
                    var d = a.player.getVideoData(1);
                    var e = d.videoId;
                    if (c || e) {
                        var f = a.player.getPlaylist();
                        if (f) { var k = []; for (var l = 0; l < f.getLength(); l++) k[l] = f.va(l).videoId } else k = [e];
                        f = a.player.getCurrentTime(1);
                        c = { videoIds: k, listId: c, videoId: e, playerParams: d.playerParams, clickTrackingParams: d.Bh, index: Math.max(a.player.getPlaylistIndex(), 0), currentTime: 0 == f ? void 0 : f };
                        (d = n4(d)) && (c.locationInfo = d);
                        d = c
                    } else d = null;
                    I7("Connecting to: " + g.zh(b));
                    "cast-selector-receiver" == b.key ?
                        (K7(d || null), Y6() ? R6().setLaunchParams(d || null) : O6("setLaunchParams called before ready.")) : !d && U7() && H7() == b.key ? q4("yt-remote-connection-change", !0) : (R7(), K7(d || null), d = G7().Ad(), (d = A4(d, b.key)) && S7(d, 1))
                }
        },
        hoa = /^https?$/i,
        hpa = ["POST",
            "PUT"
        ];
    g.z(l4, g.Bg);
    g.h = l4.prototype;
    g.h.send = function(a, b, c, d) {
        if (this.g) throw Error("[goog.net.XhrIo] Object is active with another request=" + this.G + "; newUri=" + a);
        b = b ? b.toUpperCase() : "GET";
        this.G = a;
        this.o = "";
        this.A = 0;
        this.Y = b;
        this.T = !1;
        this.l = !0;
        this.g = this.P ? d4(this.P) : d4(g.eY);
        this.L = this.P ? this.P.getOptions() : g.eY.getOptions();
        this.g.onreadystatechange = (0, g.y)(this.kv, this);
        try { a4(e4(this, "Opening Xhr")), this.aa = !0, this.g.open(b, String(a), !0), this.aa = !1 } catch (f) {
            a4(e4(this, "Error opening Xhr: " + f.message));
            i4(this, f);
            return
        }
        a =
            c || "";
        var e = this.headers.clone();
        d && eoa(d, function(a, b) { e.set(b, a) });
        d = g.bb(e.zd(), foa);
        c = g.v.FormData && a instanceof g.v.FormData;
        !g.fb(hpa, b) || d || c || e.set("Content-Type", "application/x-www-form-urlencoded;charset=utf-8");
        e.forEach(function(a, b) { this.g.setRequestHeader(b, a) }, this);
        this.X && (this.g.responseType = this.X);
        "withCredentials" in this.g && this.g.withCredentials !== this.R && (this.g.withCredentials = this.R);
        try { f4(this), 0 < this.B && (this.O = goa(this.g), a4(e4(this, "Will abort after " + this.B + "ms if incomplete, xhr2 " + this.O)), this.O ? (this.g.timeout = this.B, this.g.ontimeout = (0, g.y)(this.lv, this)) : this.D = g.sh(this.lv, this.B, this)), a4(e4(this, "Sending request")), this.F = !0, this.g.send(a), this.F = !1 } catch (f) { a4(e4(this, "Send error: " + f.message)), i4(this, f) }
    };
    g.h.lv = function() { "undefined" != typeof g.KX && this.g && (this.o = "Timed out after " + this.B + "ms, aborting", this.A = 8, e4(this, this.o), this.dispatchEvent("timeout"), this.abort(8)) };
    g.h.abort = function(a) { this.g && this.l && (e4(this, "Aborting"), this.l = !1, this.u = !0, this.g.abort(), this.u = !1, this.A = a || 7, this.dispatchEvent("complete"), this.dispatchEvent("abort"), h4(this)) };
    g.h.U = function() {
        this.g && (this.l && (this.l = !1, this.u = !0, this.g.abort(), this.u = !1), h4(this, !0));
        l4.Ha.U.call(this)
    };
    g.h.kv = function() { this.ea() || (this.aa || this.F || this.u ? k4(this) : this.fJ()) };
    g.h.fJ = function() { k4(this) };
    g.h.isActive = function() { return !!this.g };
    g.h.getStatus = function() { try { return 2 < j4(this) ? this.g.status : -1 } catch (a) { return -1 } };
    g.h.getLastError = function() { return g.t(this.o) ? this.o : String(this.o) };
    var h5 = { "\x00": "\\0", "\b": "\\b", "\f": "\\f", "\n": "\\n", "\r": "\\r", "\t": "\\t", "\x0B": "\\x0B", '"': '\\"', "\\": "\\\\", "<": "<" },
        g5 = { "'": "\\'" },
        ipa = {};
    g.h = p4.prototype;
    g.h.isEmpty = function() { return 0 == this.g.length && 0 == this.l.length };
    g.h.clear = function() {
        this.g = [];
        this.l = []
    };
    g.h.contains = function(a) { return g.fb(this.g, a) || g.fb(this.l, a) };
    g.h.remove = function(a) {
        var b = this.g;
        var c = (0, g.Mka)(b, a);
        0 <= c ? (g.ib(b, c), b = !0) : b = !1;
        return b || g.jb(this.l, a)
    };
    g.h.tc = function() { for (var a = [], b = this.g.length - 1; 0 <= b; --b) a.push(this.g[b]); var c = this.l.length; for (b = 0; b < c; ++b) a.push(this.l[b]); return a };
    var ooa = { lM: "atp", wO: "ska", mO: "que", NN: "mus", vO: "sus", eN: "dsp", sO: "seq" };
    r4.prototype.Nf = function() {
        var a = new r4({ id: this.id, name: this.name, app: this.app, type: this.type, user: this.username, userAvatarUri: this.avatar, obfuscatedGaiaId: this.obfuscatedGaiaId, theme: this.theme, capabilities: Array.from(this.capabilities.values()).join(","), experiments: Array.from(this.experiments.values()).join(",") });
        a.o = this.o;
        a.l = this.l;
        a.g = this.g
    };
    var K4, D4 = "",
        R4 = M4("loadGamesSDK") ? "/cast_game_sender.js" : "/cast_sender.js",
        woa = M4("loadCastFramework") || M4("loadCastApplicationFramework"),
        Poa = ["pkedcjkdefgpdelpbcmbmeomcjbeemfm", "enhhojjnijigcajfphajepfemndkmdlo"];
    g.z(T4, g.F);
    g.h = T4.prototype;
    g.h.XB = function(a) {
        this.u = arguments;
        this.g = !1;
        this.Ca ? this.o = (0, g.C)() + this.Mc : this.Ca = g.sh(this.A, this.Mc)
    };
    g.h.stop = function() {
        this.Ca && (g.v.clearTimeout(this.Ca), this.Ca = null);
        this.o = null;
        this.g = !1;
        this.u = []
    };
    g.h.pause = function() {++this.l };
    g.h.resume = function() { this.l && (--this.l, !this.l && this.g && (this.g = !1, this.B.apply(null, this.u))) };
    g.h.U = function() {
        this.stop();
        T4.Ha.U.call(this)
    };
    g.h.YB = function() { this.o ? (this.Ca = g.sh(this.A, this.o - (0, g.C)()), this.o = null) : (this.Ca = null, this.l ? this.g = !0 : (this.g = !1, this.B.apply(null, this.u))) };
    U4.prototype.stringify = function(a) { return g.v.JSON.stringify(a, void 0) };
    U4.prototype.parse = function(a) { return g.v.JSON.parse(a, void 0) };
    g.h = V4.prototype;
    g.h.Dg = null;
    g.h.pe = !1;
    g.h.oi = null;
    g.h.rs = null;
    g.h.ai = null;
    g.h.wh = null;
    g.h.Wf = null;
    g.h.lg = null;
    g.h.Ug = null;
    g.h.jc = null;
    g.h.rk = 0;
    g.h.re = null;
    g.h.zn = null;
    g.h.Xf = null;
    g.h.nj = -1;
    g.h.bz = !0;
    g.h.vg = !1;
    g.h.fp = 0;
    g.h.Lm = null;
    var b5 = {},
        $4 = {};
    g.h = V4.prototype;
    g.h.setTimeout = function(a) { this.u = a };
    g.h.LK = function(a) {
        a = a.target;
        var b = this.Lm;
        b && 3 == j4(a) ? b.jj() : this.gA(a)
    };
    g.h.gA = function(a) {
        try {
            if (a == this.jc) a: {
                var b = j4(this.jc),
                    c = this.jc.A,
                    d = this.jc.getStatus();
                if (g.me && !g.Uc(10) || g.oe && !g.Sc("420+")) { if (4 > b) break a } else if (3 > b || 3 == b && !g.ri && !m4(this.jc)) break a;this.vg || 4 != b || 7 == c || (8 == c || 0 >= d ? this.g.ie(3) : this.g.ie(2));l5(this);
                var e = this.jc.getStatus();this.nj = e;
                var f = m4(this.jc);
                (this.pe = 200 == e) ? (4 == b && d5(this), this.A ? (f5(this, b, f), g.ri && this.pe && 3 == b && (this.ba.da(this.l, "tick", this.HK), this.l.start())) : c5(this, f), this.pe && !this.vg && (4 == b ? this.g.xm(this) : (this.pe = !1, Z4(this)))) : (400 == e && 0 < f.indexOf("Unknown SID") ? (this.Xf = 3, a5(13)) : (this.Xf = 0, a5(14)), d5(this), e5(this))
            }
        } catch (k) { this.jc && m4(this.jc) } finally {}
    };
    g.h.HK = function() {
        var a = j4(this.jc),
            b = m4(this.jc);
        this.rk < b.length && (l5(this), f5(this, a, b), this.pe && 4 != a && Z4(this))
    };
    g.h.cK = function(a) { k5((0, g.y)(this.bK, this, a), 0) };
    g.h.bK = function(a) { this.vg || (l5(this), c5(this, a), Z4(this)) };
    g.h.ky = function(a) { k5((0, g.y)(this.aK, this, a), 0) };
    g.h.aK = function(a) { this.vg || (d5(this), this.pe = a, this.g.xm(this), this.g.ie(4)) };
    g.h.cancel = function() {
        this.vg = !0;
        d5(this)
    };
    g.h.mK = function() {
        this.oi = null;
        var a = (0, g.C)();
        0 <= a - this.rs ? (2 != this.wh && this.g.ie(3), d5(this), this.Xf = 2, a5(18), e5(this)) : j5(this, this.rs - a)
    };
    g.h.getLastError = function() { return this.Xf };
    g.h = p5.prototype;
    g.h.cp = null;
    g.h.Fd = null;
    g.h.Mm = !1;
    g.h.jv = null;
    g.h.dl = null;
    g.h.Tp = null;
    g.h.ep = null;
    g.h.Sd = null;
    g.h.pf = -1;
    g.h.mj = null;
    g.h.Gi = null;
    g.h.connect = function(a) {
        this.ep = a;
        a = q5(this.g, null, this.ep);
        a5(3);
        this.jv = (0, g.C)();
        var b = this.g.F;
        null != b ? (this.mj = b[0], (this.Gi = b[1]) ? (this.Sd = 1, r5(this)) : (this.Sd = 2, t5(this))) : (c4(a, "MODE", "init"), this.Fd = new V4(this, void 0, void 0, void 0), this.Fd.Dg = this.cp, Y4(this.Fd, a, !1, null, !0), this.Sd = 0)
    };
    g.h.rB = function(a) {
        if (a) this.Sd = 2, t5(this);
        else {
            a5(4);
            var b = this.g;
            b.ze = b.Mf.pf;
            N5(b, 9)
        }
        a && this.ie(2)
    };
    g.h.Bo = function(a) { return this.g.Bo(a) };
    g.h.abort = function() {
        this.Fd && (this.Fd.cancel(), this.Fd = null);
        this.pf = -1
    };
    g.h.hv = function() { return !1 };
    g.h.ey = function(a, b) {
        this.pf = a.nj;
        if (0 == this.Sd)
            if (b) {
                try { var c = this.l.parse(b) } catch (d) {
                    c = this.g;
                    c.ze = this.pf;
                    N5(c, 2);
                    return
                }
                this.mj = c[0];
                this.Gi = c[1]
            } else c = this.g, c.ze = this.pf, N5(c, 2);
        else if (2 == this.Sd)
            if (this.Mm) a5(7), this.Tp = (0, g.C)();
            else if ("11111" == b) { if (a5(6), this.Mm = !0, this.dl = (0, g.C)(), c = this.dl - this.jv, !g.me || g.Uc(10) || 500 > c) this.pf = 200, this.Fd.cancel(), a5(12), s5(this.g, this, !0) } else a5(8), this.dl = this.Tp = (0, g.C)(), this.Mm = !1
    };
    g.h.xm = function() {
        this.pf = this.Fd.nj;
        if (this.Fd.pe) 0 == this.Sd ? this.Gi ? (this.Sd = 1, r5(this)) : (this.Sd = 2, t5(this)) : 2 == this.Sd && ((!g.me || g.Uc(10) ? !this.Mm : 200 > this.Tp - this.dl) ? (a5(11), s5(this.g, this, !1)) : (a5(12), s5(this.g, this, !0)));
        else {
            0 == this.Sd ? a5(9) : 2 == this.Sd && a5(10);
            var a = this.g;
            a.ze = this.pf;
            N5(a, 2)
        }
    };
    g.h.hk = function() { return this.g.hk() };
    g.h.isActive = function() { return this.g.isActive() };
    g.h.ie = function(a) { this.g.ie(a) };
    g.h = u5.prototype;
    g.h.Ti = null;
    g.h.qd = null;
    g.h.Ob = null;
    g.h.bp = null;
    g.h.il = null;
    g.h.It = null;
    g.h.sl = null;
    g.h.Uj = 0;
    g.h.lG = 0;
    g.h.Kc = null;
    g.h.Tf = null;
    g.h.bf = null;
    g.h.zg = null;
    g.h.Mf = null;
    g.h.wn = null;
    g.h.Ih = -1;
    g.h.Ov = -1;
    g.h.ze = -1;
    g.h.rh = 0;
    g.h.oh = 0;
    g.h.wg = 8;
    var O5 = new g.Bg;
    g.z(v5, g.Yf);
    g.z(w5, g.Yf);
    g.z(x5, g.Yf);
    g.h = u5.prototype;
    g.h.connect = function(a, b, c, d, e) {
        a5(0);
        this.bp = b;
        this.Ti = c || {};
        d && g.Fa(e) && (this.Ti.OSID = d, this.Ti.OAID = e);
        this.B ? (k5((0, g.y)(this.Zt, this, a), 100), D5(this)) : this.Zt(a)
    };
    g.h.Zt = function(a) {
        this.Mf = new p5(this);
        this.Mf.cp = null;
        this.Mf.l = this.A;
        this.Mf.connect(a)
    };
    g.h.hv = function() { return 0 == this.g };
    g.h.jy = function(a) {
        this.Tf = null;
        I5(this, a)
    };
    g.h.iy = function() {
        this.bf = null;
        this.Ob = new V4(this, this.o, "rpc", this.D);
        this.Ob.Dg = null;
        this.Ob.fp = 0;
        var a = this.It.clone();
        g.Jn(a, "RID", "rpc");
        g.Jn(a, "SID", this.o);
        g.Jn(a, "CI", this.wn ? "0" : "1");
        g.Jn(a, "AID", this.Ih);
        z5(this, a);
        if (!g.me || g.Uc(10)) g.Jn(a, "TYPE", "xmlhttp"), Y4(this.Ob, a, !0, this.sl, !1);
        else {
            g.Jn(a, "TYPE", "html");
            var b = this.Ob,
                c = !!this.sl;
            b.wh = 3;
            b.Wf = b4(a.clone());
            i5(b, c)
        }
    };
    g.h.ey = function(a, b) {
        if (0 != this.g && (this.Ob == a || this.qd == a))
            if (this.ze = a.nj, this.qd == a && 3 == this.g)
                if (7 < this.wg) {
                    try { var c = this.A.parse(b) } catch (f) { c = null }
                    if (g.Ma(c) && 3 == c.length)
                        if (0 == c[0]) a: {
                            if (!this.bf) {
                                if (this.Ob)
                                    if (this.Ob.ai + 3E3 < this.qd.ai) E5(this), this.Ob.cancel(), this.Ob = null;
                                    else break a;
                                L5(this);
                                a5(19)
                            }
                        }
                        else this.Ov = c[1], 0 < this.Ov - this.Ih && 37500 > c[2] && this.wn && 0 == this.oh && !this.zg && (this.zg = k5((0, g.y)(this.OG, this), 6E3));
                    else N5(this, 11)
                } else b != ipa.JM.g && N5(this, 11);
        else if (this.Ob == a &&
            E5(this), !g.Ib(b)) {
            c = this.A.parse(b);
            g.Ma(c);
            for (var d = 0; d < c.length; d++) {
                var e = c[d];
                this.Ih = e[0];
                e = e[1];
                2 == this.g ? "c" == e[0] ? (this.o = e[1], this.sl = e[2], e = e[3], null != e ? this.wg = e : this.wg = 6, this.g = 3, this.Kc && this.Kc.St(), this.It = q5(this, this.hk() ? this.sl : null, this.bp), J5(this)) : "stop" == e[0] && N5(this, 7) : 3 == this.g && ("stop" == e[0] ? N5(this, 7) : "noop" != e[0] && this.Kc && this.Kc.Rt(e), this.oh = 0)
            }
        }
    };
    g.h.OG = function() { null != this.zg && (this.zg = null, this.Ob.cancel(), this.Ob = null, L5(this), a5(20)) };
    g.h.xm = function(a) {
        if (this.Ob == a) {
            E5(this);
            this.Ob = null;
            var b = 2
        } else if (this.qd == a) this.qd = null, b = 1;
        else return;
        this.ze = a.nj;
        if (0 != this.g)
            if (a.pe) 1 == b ? (b = (0, g.C)() - a.ai, O5.dispatchEvent(new w5(O5, a.Ug ? a.Ug.length : 0, b, this.rh)), C5(this), this.u.length = 0) : J5(this);
            else {
                var c = a.getLastError(),
                    d;
                if (!(d = 3 == c || 7 == c || 0 == c && 0 < this.ze)) {
                    if (d = 1 == b) this.qd || this.Tf || 1 == this.g || 2 <= this.rh ? d = !1 : (this.Tf = k5((0, g.y)(this.jy, this, a), K5(this, this.rh)), this.rh++, d = !0);
                    d = !(d || 2 == b && L5(this))
                }
                if (d) switch (c) {
                    case 1:
                        N5(this,
                            5);
                        break;
                    case 4:
                        N5(this, 10);
                        break;
                    case 3:
                        N5(this, 6);
                        break;
                    case 7:
                        N5(this, 12);
                        break;
                    default:
                        N5(this, 2)
                }
            }
    };
    g.h.FB = function(a) { if (!g.fb(arguments, this.g)) throw Error("Unexpected channel state: " + this.g); };
    g.h.nL = function(a) { a ? a5(2) : (a5(1), M5(this, 8)) };
    g.h.Bo = function(a) {
        if (a) throw Error("Can't create secondary domain capable XhrIo object.");
        a = new l4;
        a.R = !1;
        return a
    };
    g.h.isActive = function() { return !!this.Kc && this.Kc.isActive(this) };
    g.h.ie = function(a) { O5.dispatchEvent(new x5(O5, a)) };
    g.h.hk = function() { return !(!g.me || g.Uc(10)) };
    g.h = P5.prototype;
    g.h.St = function() {};
    g.h.Rt = function() {};
    g.h.Qt = function() {};
    g.h.qo = function() {};
    g.h.Nu = function() { return {} };
    g.h.isActive = function() { return !0 };
    g.z(Q5, g.F);
    g.h = Q5.prototype;
    g.h.UJ = function() {
        this.Mc = Math.min(3E5, 2 * this.Mc);
        this.o();
        this.l && this.start()
    };
    g.h.start = function() {
        var a = this.Mc + 15E3 * Math.random();
        g.Ro(this.g, a);
        this.l = (0, g.C)() + a
    };
    g.h.stop = function() {
        this.g.stop();
        this.l = 0
    };
    g.h.isActive = function() { return this.g.isActive() };
    g.h.reset = function() {
        this.g.stop();
        this.Mc = 5E3
    };
    g.z(R5, P5);
    g.h = R5.prototype;
    g.h.subscribe = function(a, b, c) { return this.o.subscribe(a, b, c) };
    g.h.unsubscribe = function(a, b, c) { return this.o.unsubscribe(a, b, c) };
    g.h.wf = function(a) { return this.o.Eg(a) };
    g.h.N = function(a, b) { return this.o.N.apply(this.o, arguments) };
    g.h.dispose = function() { this.Za || (this.Za = !0, g.Wf(this.o), S5(this), g.Wf(this.l), this.l = null) };
    g.h.ea = function() { return this.Za };
    g.h.connect = function(a, b, c) {
        if (!this.g || 2 != this.g.g) {
            this.G = "";
            this.l.stop();
            this.A = a || null;
            this.u = b || 0;
            a = this.I + "/test";
            b = this.I + "/bind";
            var d = new u5(c ? c.firstTestResults : null, c ? c.secondTestResults : null, this.O),
                e = this.g;
            e && (e.Kc = null);
            d.Kc = this;
            this.g = d;
            e ? this.g.connect(a, b, this.B, e.o, e.Ih) : c ? this.g.connect(a, b, this.B, c.sessionId, c.arrayId) : this.g.connect(a, b, this.B)
        }
    };
    g.h.sendMessage = function(a, b) {
        var c = { _sc: a };
        b && g.Ec(c, b);
        this.l.isActive() || 2 == (this.g ? this.g.g : 0) ? this.D.push(c) : T5(this) && F5(this.g, c)
    };
    g.h.St = function() {
        this.l.reset();
        this.A = null;
        this.u = 0;
        if (this.D.length) {
            var a = this.D;
            this.D = [];
            for (var b = 0, c = a.length; b < c; ++b) F5(this.g, a[b])
        }
        this.N("handlerOpened")
    };
    g.h.Qt = function(a) {
        var b = 2 == a && 401 == this.g.ze;
        4 == a || b || this.l.start();
        this.N("handlerError", a)
    };
    g.h.qo = function(a) {
        if (!this.l.isActive()) this.N("handlerClosed");
        else if (a)
            for (var b = 0, c = a.length; b < c; ++b) {
                var d = a[b].map;
                d && this.D.push(d)
            }
    };
    g.h.Nu = function() {
        var a = { v: 2 };
        this.G && (a.gsessionid = this.G);
        0 != this.u && (a.ui = "" + this.u);
        0 != this.F && (a.ui = "" + this.F);
        this.A && g.Ec(a, this.A);
        return a
    };
    g.h.Rt = function(a) { "S" == a[0] ? this.G = a[1] : "gracefulReconnect" == a[0] ? (this.l.start(), B5(this.g)) : this.N("handlerMessage", new Aoa(a[0], a[1])) };
    g.h.IL = function() {
        this.l.isActive();
        var a = this.g,
            b = 0;
        a.Ob && b++;
        a.qd && b++;
        0 != b || this.connect(this.A, this.u)
    };
    U5.prototype.u = function(a, b, c, d) { b ? a(d) : a({ text: c.responseText }) };
    U5.prototype.o = function(a, b) { a(Error("Request error: " + b.status)) };
    U5.prototype.A = function(a) { a(Error("request timed out")) };
    var Goa = (0, g.C)(),
        Z5 = null,
        c6 = Array(50),
        b6 = -1,
        d6 = !1;
    g.z(e6, g.N);
    e6.prototype.Ad = function() { return this.g };
    e6.prototype.contains = function(a) { return !!z4(this.g, a) };
    e6.prototype.get = function(a) { return a ? A4(this.g, a) : null };
    e6.prototype.info = function(a) { a6(this.D, a) };
    g.z(g6, g.N);
    var l8 = [2E3, 2E3, 1E3, 1E3, 1E3, 2E3, 2E3, 5E3, 5E3, 1E4];
    g.h = g6.prototype;
    g.h.start = function() {!this.g && isNaN(this.Ca) && this.jA() };
    g.h.stop = function() {
        this.g && (this.g.abort(), this.g = null);
        isNaN(this.Ca) || (g.uq(this.Ca), this.Ca = NaN)
    };
    g.h.U = function() {
        this.stop();
        g6.Ha.U.call(this)
    };
    g.h.jA = function() {
        this.Ca = NaN;
        this.g = g.gr(V5(this.B, "/pairing/get_screen"), { method: "POST", rb: { pairing_code: this.A }, timeout: 5E3, onSuccess: (0, g.y)(this.LL, this), onError: (0, g.y)(this.JL, this), fd: (0, g.y)(this.ML, this) })
    };
    g.h.LL = function(a, b) {
        this.g = null;
        var c = b.screen || {};
        c.dialId = this.o;
        c.name = this.u;
        this.N("pairingComplete", new s4(c))
    };
    g.h.JL = function(a) {
        this.g = null;
        a.status && 404 == a.status ? this.l >= l8.length ? this.N("pairingFailed", Error("DIAL polling timed out")) : (a = l8[this.l], this.Ca = g.sq((0, g.y)(this.jA, this), a), this.l++) : this.N("pairingFailed", Error("Server error " + a.status))
    };
    g.h.ML = function() {
        this.g = null;
        this.N("pairingFailed", Error("Server not responding"))
    };
    g.z(i6, e6);
    g.h = i6.prototype;
    g.h.start = function() {
        h6(this) && this.N("screenChange");
        !g.Lt("yt-remote-lounge-token-expiration") && j6(this);
        g.uq(this.l);
        this.l = g.sq((0, g.y)(this.start, this), 1E4)
    };
    g.h.add = function(a, b) {
        h6(this);
        f6(this, a);
        k6(this, !1);
        this.N("screenChange");
        b(a);
        a.token || j6(this)
    };
    g.h.remove = function(a, b) {
        var c = h6(this);
        Ioa(this, a) && (k6(this, !1), c = !0);
        b(a);
        c && this.N("screenChange")
    };
    g.h.qn = function(a, b, c, d) {
        var e = h6(this),
            f = this.get(a.id);
        f ? (f.name != b && (f.name = b, k6(this, !1), e = !0), c(a)) : d(Error("no such local screen."));
        e && this.N("screenChange")
    };
    g.h.U = function() {
        g.uq(this.l);
        i6.Ha.U.call(this)
    };
    g.h.hC = function(a) {
        h6(this);
        var b = this.g.length;
        a = a && a.screens || [];
        for (var c = 0, d = a.length; c < d; ++c) {
            var e = a[c],
                f = this.get(e.screenId);
            f && (f.token = e.loungeToken, --b)
        }
        k6(this, !b);
        b && a6(this.D, "Missed " + b + " lounge tokens.")
    };
    g.h.gC = function(a) { a6(this.D, "Requesting lounge tokens failed: " + a) };
    g.z(m6, g.N);
    g.h = m6.prototype;
    g.h.start = function() {
        var a = parseInt(g.Lt("yt-remote-fast-check-period") || "0", 10);
        (this.u = (0, g.C)() - 144E5 < a ? 0 : a) ? p6(this): (this.u = (0, g.C)() + 3E5, g.Kt("yt-remote-fast-check-period", this.u), this.ur())
    };
    g.h.isEmpty = function() { return g.vc(this.g) };
    g.h.update = function() {
        l6("Updating availability on schedule.");
        var a = this.B(),
            b = g.jc(this.g, function(b, d) { return b && !!A4(a, d) }, this);
        o6(this, b)
    };
    g.h.U = function() {
        g.uq(this.o);
        this.o = NaN;
        this.l && (this.l.abort(), this.l = null);
        m6.Ha.U.call(this)
    };
    g.h.ur = function() {
        g.uq(this.o);
        this.o = NaN;
        this.l && this.l.abort();
        var a = q6(this);
        if (o4(a)) {
            var b = V5(this.A, "/pairing/get_screen_availability");
            this.l = W5(this.A, b, { lounge_token: g.pc(a).join(",") }, (0, g.y)(this.BJ, this, a), (0, g.y)(this.AJ, this))
        } else o6(this, {}), p6(this)
    };
    g.h.BJ = function(a, b) {
        this.l = null;
        var c = g.pc(q6(this));
        if (g.Bb(c, g.pc(a))) {
            c = b.screens || [];
            for (var d = {}, e = 0, f = c.length; e < f; ++e) d[a[c[e].loungeToken]] = "online" == c[e].status;
            o6(this, d);
            p6(this)
        } else this.Gb("Changing Screen set during request."), this.ur()
    };
    g.h.AJ = function(a) {
        this.Gb("Screen availability failed: " + a);
        this.l = null;
        p6(this)
    };
    g.h.Gb = function(a) { a6("OnlineScreenService", a) };
    g.z(r6, e6);
    g.h = r6.prototype;
    g.h.start = function() {
        this.o.start();
        this.l.start();
        this.g.length && (this.N("screenChange"), this.l.isEmpty() || this.N("onlineScreenChange"))
    };
    g.h.add = function(a, b, c) { this.o.add(a, b, c) };
    g.h.remove = function(a, b, c) {
        this.o.remove(a, b, c);
        this.l.update()
    };
    g.h.qn = function(a, b, c, d) { this.o.contains(a) ? this.o.qn(a, b, c, d) : (a = "Updating name of unknown screen: " + a.name, a6(this.D, a), d(Error(a))) };
    g.h.Ad = function(a) { return a ? this.g : g.nb(this.g, (0, g.Be)(this.u, function(a) { return !this.contains(a) }, this)) };
    g.h.kA = function() { return (0, g.Be)(this.Ad(!0), function(a) { return !!this.l.g[a.id] }, this) };
    g.h.lA = function(a, b, c, d, e) {
        this.info("getDialScreenByPairingCode " + a + " / " + b);
        var f = new g6(this.B, a, b, c);
        f.subscribe("pairingComplete", (0, g.y)(function(a) {
            g.Wf(f);
            d(s6(this, a))
        }, this));
        f.subscribe("pairingFailed", function(a) {
            g.Wf(f);
            e(a)
        });
        f.start();
        return (0, g.y)(f.stop, f)
    };
    g.h.OL = function(a, b, c, d) {
        g.gr(V5(this.B, "/pairing/get_screen"), {
            method: "POST",
            rb: { pairing_code: a },
            timeout: 5E3,
            onSuccess: (0, g.y)(function(a, d) {
                var e = new s4(d.screen || {});
                if (!e.name || u6(this, e.name)) {
                    a: {
                        var f = e.name;
                        for (var m = 2, n = b(f, m); u6(this, n);) {
                            m++;
                            if (20 < m) break a;
                            n = b(f, m)
                        }
                        f = n
                    }
                    e.name = f
                }
                c(s6(this, e))
            }, this),
            onError: (0, g.y)(function(a) { d(Error("pairing request failed: " + a.status)) }, this),
            fd: (0, g.y)(function() { d(Error("pairing request timed out.")) }, this)
        })
    };
    g.h.U = function() {
        g.Wf(this.o);
        g.Wf(this.l);
        r6.Ha.U.call(this)
    };
    g.h.qC = function() {
        v6(this);
        this.N("screenChange");
        this.l.update()
    };
    r6.prototype.dispose = r6.prototype.dispose;
    g.z(x6, g.N);
    g.h = x6.prototype;
    g.h.ym = function(a) {
        this.o = a;
        this.N("sessionScreen", this.o)
    };
    g.h.Dd = function(a) { this.ea() || (a && y6(this, "" + a), this.o = null, this.N("sessionScreen", null)) };
    g.h.info = function(a) { a6(this.L, a) };
    g.h.nA = function() { return null };
    g.h.Gr = function(a) {
        var b = this.l;
        a ? (b.displayStatus = new chrome.cast.ReceiverDisplayStatus(a, []), b.displayStatus.showStop = !0) : b.displayStatus = null;
        chrome.cast.setReceiverDisplayStatus(b, (0, g.y)(function() { this.info("Updated receiver status for " + b.friendlyName + ": " + a) }, this), (0, g.y)(function() { y6(this, "Failed to update receiver status for: " + b.friendlyName) }, this))
    };
    g.h.U = function() {
        this.Gr("");
        x6.Ha.U.call(this)
    };
    g.z(A6, x6);
    g.h = A6.prototype;
    g.h.Er = function(a) {
        if (this.g) {
            if (this.g == a) return;
            y6(this, "Overriding cast sesison with new session object");
            this.g.removeUpdateListener(this.B);
            this.g.removeMessageListener("urn:x-cast:com.google.youtube.mdx", this.A)
        }
        this.g = a;
        this.g.addUpdateListener(this.B);
        this.g.addMessageListener("urn:x-cast:com.google.youtube.mdx", this.A);
        Moa(this)
    };
    g.h.Kh = function(a) { this.info("launchWithParams no-op for Cast: " + g.zh(a)) };
    g.h.stop = function() { this.g ? this.g.stop((0, g.y)(function() { this.Dd() }, this), (0, g.y)(function() { this.Dd(Error("Failed to stop receiver app.")) }, this)) : this.Dd(Error("Stopping cast device witout session.")) };
    g.h.Gr = g.Ja;
    g.h.U = function() {
        this.info("disposeInternal");
        g.uq(this.u);
        this.u = 0;
        this.g && (this.g.removeUpdateListener(this.B), this.g.removeMessageListener("urn:x-cast:com.google.youtube.mdx", this.A));
        this.g = null;
        A6.Ha.U.call(this)
    };
    g.h.xK = function(a, b) {
        if (!this.ea())
            if (b) {
                var c = g.bp(b);
                if (g.Pa(c)) {
                    var d = "" + c.type;
                    c = c.data || {};
                    this.info("onYoutubeMessage_: " + d + " " + g.zh(c));
                    switch (d) {
                        case "mdxSessionStatus":
                            z6(this, c.screenId);
                            break;
                        default:
                            y6(this, "Unknown youtube message: " + d)
                    }
                } else y6(this, "Unable to parse message.")
            } else y6(this, "No data in message.")
    };
    g.h.Zu = function(a, b, c, d) { t6(this.G, this.l.label, a, this.l.friendlyName, (0, g.y)(function(e) { e ? b(e) : 0 <= d ? (y6(this, "Screen " + a + " appears to be offline. " + d + " retries left."), g.sq((0, g.y)(this.Zu, this, a, b, c, d - 1), 300)) : c(Error("Unable to fetch screen.")) }, this), c) };
    g.h.nA = function() { return this.g };
    g.h.PL = function(a) { this.ea() || a || (y6(this, "Cast session died."), this.Dd()) };
    g.z(B6, x6);
    g.h = B6.prototype;
    g.h.Er = function(a) {
        this.u = a;
        this.u.addUpdateListener(this.O)
    };
    g.h.Kh = function(a) {
        this.A = a;
        this.D()
    };
    g.h.stop = function() {
        this.g();
        this.g = g.Ja;
        g.uq(this.B);
        this.u ? this.u.stop((0, g.y)(this.Dd, this, null), (0, g.y)(this.Dd, this, "Failed to stop DIAL device.")) : this.Dd()
    };
    g.h.U = function() {
        this.g();
        this.g = g.Ja;
        g.uq(this.B);
        this.u && this.u.removeUpdateListener(this.O);
        this.u = null;
        B6.Ha.U.call(this)
    };
    g.h.SL = function(a) { this.ea() || a || (y6(this, "DIAL session died."), this.g(), this.g = g.Ja, this.Dd()) };
    g.h.xp = function(a) {
        this.I = y4();
        if (this.A) {
            var b = new chrome.cast.DialLaunchResponse(!0, D6(this));
            a(b);
            C6(this)
        } else this.D = (0, g.y)(function() {
            g.uq(this.B);
            this.D = g.Ja;
            this.B = NaN;
            var b = new chrome.cast.DialLaunchResponse(!0, D6(this));
            a(b);
            C6(this)
        }, this), this.B = g.sq((0, g.y)(function() { this.D() }, this), 100)
    };
    g.h.NC = function(a, b, c) {
        t6(this.G, this.F.receiver.label, a, this.l.friendlyName, (0, g.y)(function(a) { a && a.token ? (this.ym(a), b(new chrome.cast.DialLaunchResponse(!1))) : this.xp(b, c) }, this), (0, g.y)(function(a) {
            y6(this, "Failed to get DIAL screen: " + a);
            this.xp(b, c)
        }, this))
    };
    g.z(E6, x6);
    E6.prototype.stop = function() { this.Dd() };
    E6.prototype.Er = g.Ja;
    E6.prototype.Kh = function() {
        g.uq(this.g);
        this.g = NaN;
        var a = A4(this.G.Ad(), this.l.label);
        a ? this.ym(a) : this.Dd(Error("No such screen"))
    };
    E6.prototype.U = function() {
        g.uq(this.g);
        this.g = NaN;
        E6.Ha.U.call(this)
    };
    g.z(F6, g.N);
    g.h = F6.prototype;
    g.h.init = function(a, b) {
        chrome.cast.timeout.requestSession = 3E4;
        var c = new chrome.cast.SessionRequest(this.D);
        this.F || (c.dialRequest = new chrome.cast.DialRequest("YouTube"));
        var d = chrome.cast.AutoJoinPolicy.TAB_AND_ORIGIN_SCOPED,
            e = a ? chrome.cast.DefaultActionPolicy.CAST_THIS_TAB : chrome.cast.DefaultActionPolicy.CREATE_SESSION;
        c = new chrome.cast.ApiConfig(c, (0, g.y)(this.gy, this), (0, g.y)(this.kJ, this), d, e);
        c.customDialLaunchCallback = (0, g.y)(this.qH, this);
        chrome.cast.initialize(c, (0, g.y)(function() {
            this.ea() ||
                (chrome.cast.addReceiverActionListener(this.u), Doa(), this.l.subscribe("onlineScreenChange", (0, g.y)(this.mA, this)), this.o = K6(this), chrome.cast.setCustomReceivers(this.o, g.Ja, (0, g.y)(function(a) { this.Gb("Failed to set initial custom receivers: " + g.zh(a)) }, this)), this.N("yt-remote-cast2-availability-change", I6(this)), b(!0))
        }, this), (0, g.y)(function(a) {
            this.Gb("Failed to initialize API: " + g.zh(a));
            b(!1)
        }, this))
    };
    g.h.dL = function(a, b) {
        H6("Setting connected screen ID: " + a + " -> " + b);
        if (this.g) { var c = this.g.o; if (!a || c && c.id != a) H6("Unsetting old screen status: " + this.g.l.friendlyName), J6(this, null) }
        if (a && b) {
            if (!this.g) {
                c = A4(this.l.Ad(), a);
                if (!c) { H6("setConnectedScreenStatus: Unknown screen."); return }
                var d = G6(this, c);
                d || (H6("setConnectedScreenStatus: Connected receiver not custom..."), d = new chrome.cast.Receiver(c.uuid ? c.uuid : c.id, c.name), d.receiverType = chrome.cast.ReceiverType.CUSTOM, this.o.push(d), chrome.cast.setCustomReceivers(this.o,
                    g.Ja, (0, g.y)(function(a) { this.Gb("Failed to set initial custom receivers: " + g.zh(a)) }, this)));
                H6("setConnectedScreenStatus: new active receiver: " + d.friendlyName);
                J6(this, new E6(this.l, d), !0)
            }
            this.g.Gr(b)
        } else H6("setConnectedScreenStatus: no screen.")
    };
    g.h.eL = function(a) { this.ea() ? this.Gb("Setting connection data on disposed cast v2") : this.g ? this.g.Kh(a) : this.Gb("Setting connection data without a session") };
    g.h.RL = function() { this.ea() ? this.Gb("Stopping session on disposed cast v2") : this.g ? (this.g.stop(), J6(this, null)) : H6("Stopping non-existing session") };
    g.h.requestSession = function() { chrome.cast.requestSession((0, g.y)(this.gy, this), (0, g.y)(this.GJ, this)) };
    g.h.U = function() {
        this.l.unsubscribe("onlineScreenChange", (0, g.y)(this.mA, this));
        window.chrome && chrome.cast && chrome.cast.removeReceiverActionListener(this.u);
        g.jb(g.w("yt.mdx.remote.debug.handlers_") || [], X5);
        g.Wf(this.g);
        F6.Ha.U.call(this)
    };
    g.h.Gb = function(a) { a6("Controller", a) };
    g.h.hy = function(a, b) { this.g == a && (b || J6(this, null), this.N("yt-remote-cast2-session-change", b)) };
    g.h.gJ = function(a, b) {
        if (!this.ea())
            if (a) switch (a.friendlyName = chrome.cast.unescape(a.friendlyName), H6("onReceiverAction_ " + a.label + " / " + a.friendlyName + "-- " + b), b) {
                case chrome.cast.ReceiverAction.CAST:
                    if (this.g)
                        if (this.g.l.label != a.label) H6("onReceiverAction_: Stopping active receiver: " + this.g.l.friendlyName), this.g.stop();
                        else {
                            H6("onReceiverAction_: Casting to active receiver.");
                            this.g.o && this.N("yt-remote-cast2-session-change", this.g.o);
                            break
                        }
                    switch (a.receiverType) {
                        case chrome.cast.ReceiverType.CUSTOM:
                            J6(this,
                                new E6(this.l, a));
                            break;
                        case chrome.cast.ReceiverType.DIAL:
                            J6(this, new B6(this.l, a, this.B));
                            break;
                        case chrome.cast.ReceiverType.CAST:
                            J6(this, new A6(this.l, a));
                            break;
                        default:
                            this.Gb("Unknown receiver type: " + a.receiverType)
                    }
                    break;
                case chrome.cast.ReceiverAction.STOP:
                    this.g && this.g.l.label == a.label ? this.g.stop() : this.Gb("Stopping receiver w/o session: " + a.friendlyName)
            } else this.Gb("onReceiverAction_ called without receiver.")
    };
    g.h.qH = function(a) {
        if (this.ea()) return Promise.reject(Error("disposed"));
        var b = a.receiver;
        b.receiverType != chrome.cast.ReceiverType.DIAL && (this.Gb("Not DIAL receiver: " + b.friendlyName), b.receiverType = chrome.cast.ReceiverType.DIAL);
        var c = this.g ? this.g.l : null;
        if (!c || c.label != b.label) return this.Gb("Receiving DIAL launch request for non-clicked DIAL receiver: " + b.friendlyName), Promise.reject(Error("illegal DIAL launch"));
        if (c && c.label == b.label && c.receiverType != chrome.cast.ReceiverType.DIAL) {
            if (this.g.o) return H6("Reselecting dial screen."),
                this.N("yt-remote-cast2-session-change", this.g.o), Promise.resolve(new chrome.cast.DialLaunchResponse(!1));
            this.Gb('Changing CAST intent from "' + c.receiverType + '" to "dial" for ' + b.friendlyName);
            J6(this, new B6(this.l, b, this.B))
        }
        b = this.g;
        b.F = a;
        return b.F.appState == chrome.cast.DialAppState.RUNNING ? new Promise((0, g.y)(b.NC, b, (b.F.extraData || {}).screenId || null)) : new Promise((0, g.y)(b.xp, b))
    };
    g.h.gy = function(a) {
        if (!this.ea()) {
            H6("New cast session ID: " + a.sessionId);
            var b = a.receiver;
            if (b.receiverType != chrome.cast.ReceiverType.CUSTOM) {
                if (!this.g)
                    if (b.receiverType == chrome.cast.ReceiverType.CAST) H6("Got resumed cast session before resumed mdx connection."), b.friendlyName = chrome.cast.unescape(b.friendlyName), J6(this, new A6(this.l, b), !0);
                    else { this.Gb("Got non-cast session without previous mdx receiver event, or mdx resume."); return }
                var c = this.g.l,
                    d = A4(this.l.Ad(), c.label);
                d && t4(d, b.label) &&
                    c.receiverType != chrome.cast.ReceiverType.CAST && b.receiverType == chrome.cast.ReceiverType.CAST && (H6("onSessionEstablished_: manual to cast session change " + b.friendlyName), g.Wf(this.g), this.g = new A6(this.l, b), this.g.subscribe("sessionScreen", (0, g.y)(this.hy, this, this.g)), this.g.Kh(null));
                this.g.Er(a)
            }
        }
    };
    g.h.QL = function() { return this.g ? this.g.nA() : null };
    g.h.GJ = function(a) { this.ea() || (this.Gb("Failed to estabilish a session: " + g.zh(a)), a.code != chrome.cast.ErrorCode.CANCEL && J6(this, null)) };
    g.h.kJ = function(a) {
        H6("Receiver availability updated: " + a);
        if (!this.ea()) {
            var b = I6(this);
            this.A = a == chrome.cast.ReceiverAvailability.AVAILABLE;
            I6(this) != b && this.N("yt-remote-cast2-availability-change", I6(this))
        }
    };
    g.h.mA = function() { this.ea() || (this.o = K6(this), H6("Updating custom receivers: " + g.zh(this.o)), chrome.cast.setCustomReceivers(this.o, g.Ja, (0, g.y)(function() { this.Gb("Failed to set custom receivers.") }, this)), this.N("yt-remote-cast2-availability-change", I6(this))) };
    F6.prototype.setLaunchParams = F6.prototype.eL;
    F6.prototype.setConnectedScreenStatus = F6.prototype.dL;
    F6.prototype.stopSession = F6.prototype.RL;
    F6.prototype.getCastSession = F6.prototype.QL;
    F6.prototype.requestSession = F6.prototype.requestSession;
    F6.prototype.init = F6.prototype.init;
    F6.prototype.dispose = F6.prototype.dispose;
    var T6 = [];
    a7.prototype.reset = function(a) {
        this.listId = "";
        this.index = -1;
        this.videoId = "";
        b7(this);
        this.volume = -1;
        this.muted = !1;
        a && (this.index = a.index, this.listId = a.listId, this.videoId = a.videoId, this.playerState = a.playerState, this.volume = a.volume, this.muted = a.muted, this.audioTrackId = a.audioTrackId, this.g = a.trackData, this.Be = a.hasPrevious, this.hasNext = a.hasNext, this.D = a.playerTime, this.B = a.playerTimeAt, this.u = a.seekableStart, this.l = a.seekableEnd, this.F = a.duration, this.G = a.loadedTime, this.o = a.liveIngestionTime, this.A = !isNaN(this.o))
    };
    a7.prototype.isAdPlaying = function() { return 1081 == this.playerState };
    a7.prototype.getDuration = function() { return this.A ? this.F + c7(this) : this.F };
    a7.prototype.clone = function() { return new a7(g7(this)) };
    g.z(j7, g.N);
    g.h = j7.prototype;
    g.h.play = function() { 1 == this.g ? (this.l ? this.l.play(null, g.Ja, r7(this, "play")) : p7(this, "play"), o7(this, 1, e7(k7(this))), this.N("remotePlayerChange")) : m7(this, this.play) };
    g.h.pause = function() { 1 == this.g ? (this.l ? this.l.pause(null, g.Ja, r7(this, "pause")) : p7(this, "pause"), o7(this, 2, e7(k7(this))), this.N("remotePlayerChange")) : m7(this, this.pause) };
    g.h.seekTo = function(a) {
        if (1 == this.g) {
            if (this.l) {
                var b = k7(this),
                    c = new chrome.cast.media.SeekRequest;
                c.currentTime = a;
                c.resumeState = 1 == b.playerState || 3 == b.playerState ? chrome.cast.media.ResumeState.PLAYBACK_START : chrome.cast.media.ResumeState.PLAYBACK_PAUSE;
                this.l.seek(c, g.Ja, r7(this, "seekTo", { newTime: a }))
            } else p7(this, "seekTo", { newTime: a });
            o7(this, 3, a);
            this.N("remotePlayerChange")
        } else m7(this, g.Va(this.seekTo, a))
    };
    g.h.stop = function() {
        if (1 == this.g) {
            this.l ? this.l.stop(null, g.Ja, r7(this, "stopVideo")) : p7(this, "stopVideo");
            var a = k7(this);
            a.index = -1;
            a.videoId = "";
            b7(a);
            n7(this, a);
            this.N("remotePlayerChange")
        } else m7(this, this.stop)
    };
    g.h.setVolume = function(a, b) {
        if (1 == this.g) {
            var c = k7(this);
            if (this.o) {
                if (c.volume != a) {
                    var d = Math.round(a) / 100;
                    this.o.setReceiverVolumeLevel(d, (0, g.y)(function() { a6("CP", "set receiver volume: " + d) }, this), (0, g.y)(function() { this.Gb("failed to set receiver volume.") }, this))
                }
                c.muted != b && this.o.setReceiverMuted(b, (0, g.y)(function() { a6("CP", "set receiver muted: " + b) }, this), (0, g.y)(function() { this.Gb("failed to set receiver muted.") }, this))
            } else {
                var e = {
                    volume: a,
                    muted: b
                }; - 1 != c.volume && (e.delta = a - c.volume);
                p7(this, "setVolume", e)
            }
            c.muted = b;
            c.volume = a;
            n7(this, c)
        } else m7(this, g.Va(this.setVolume, a, b))
    };
    g.h.nz = function(a, b) {
        if (1 == this.g) {
            var c = k7(this),
                d = { videoId: a };
            b && (c.g = { trackName: b.name, languageCode: b.languageCode, sourceLanguageCode: b.translationLanguage ? b.translationLanguage.languageCode : "", languageName: b.languageName, format: b.format, kind: b.kind }, d.style = g.zh(b.style), g.Ec(d, c.g));
            p7(this, "setSubtitlesTrack", d);
            n7(this, c)
        } else m7(this, g.Va(this.nz, a, b))
    };
    g.h.setAudioTrack = function(a, b) {
        if (1 == this.g) {
            p7(this, "setAudioTrack", { videoId: a, audioTrackId: b.nb.id });
            var c = k7(this);
            c.audioTrackId = b.nb.id;
            n7(this, c)
        } else m7(this, g.Va(this.setAudioTrack, a, b))
    };
    g.h.playVideo = function(a, b, c, d, e, f, k) {
        var l = k7(this);
        c = c || 0;
        var m = { videoId: a, currentIndex: c };
        f7(l, a, c);
        g.Fa(b) && (d7(l, b), m.currentTime = b);
        g.Fa(d) && (m.listId = d);
        null != e && (m.playerParams = e);
        null != f && (m.clickTrackingParams = f);
        null != k && (m.locationInfo = g.zh(k));
        p7(this, "setPlaylist", m);
        d || n7(this, l)
    };
    g.h.Fm = function(a, b) {
        if (1 == this.g) {
            if (a && b) {
                var c = k7(this);
                f7(c, a, b);
                n7(this, c)
            }
            p7(this, "previous")
        } else m7(this, g.Va(this.Fm, a, b))
    };
    g.h.nextVideo = function(a, b) {
        if (1 == this.g) {
            if (a && b) {
                var c = k7(this);
                f7(c, a, b);
                n7(this, c)
            }
            p7(this, "next")
        } else m7(this, g.Va(this.nextVideo, a, b))
    };
    g.h.ru = function() { 1 == this.g ? p7(this, "dismissAutoplay") : m7(this, this.ru) };
    g.h.dispose = function() {
        if (3 != this.g) {
            var a = this.g;
            this.g = 3;
            this.N("proxyStateChange", a, this.g)
        }
        j7.Ha.dispose.call(this)
    };
    g.h.U = function() {
        l7(this);
        this.u = null;
        this.A.clear();
        i7(this, null);
        j7.Ha.U.call(this)
    };
    g.h.ws = function(a) {
        if ((a != this.g || 2 == a) && 3 != this.g && 0 != a) {
            var b = this.g;
            this.g = a;
            this.N("proxyStateChange", b, a);
            if (1 == a)
                for (; !this.A.isEmpty();) b = a = this.A, 0 == b.g.length && (b.g = b.l, b.g.reverse(), b.l = []), a.g.pop().apply(this);
            else 3 == a && this.dispose()
        }
    };
    g.h.cJ = function(a, b) { this.N(a, b) };
    g.h.VG = function(a) {
        if (!a) this.Vj(null), i7(this, null);
        else if (this.o.receiver.volume) {
            a = this.o.receiver.volume;
            var b = k7(this),
                c = Math.round(100 * a.level || 0);
            if (b.volume != c || b.muted != a.muted) a6("CP", "Cast volume update: " + a.level + (a.muted ? " muted" : "")), b.volume = c, b.muted = !!a.muted, n7(this, b)
        }
    };
    g.h.Vj = function(a) {
        a6("CP", "Cast media: " + !!a);
        this.l && this.l.removeUpdateListener(this.F);
        if (this.l = a) this.l.addUpdateListener(this.F), q7(this), this.N("remotePlayerChange")
    };
    g.h.UG = function(a) { a ? (q7(this), this.N("remotePlayerChange")) : this.Vj(null) };
    g.h.Vr = function() { p7(this, "sendDebugCommand", { debugCommand: "stats4nerds " }) };
    g.h.hH = function() {
        var a = X6();
        a && i7(this, a)
    };
    g.h.Gb = function(a) { a6("CP", a) };
    g.z(s7, g.N);
    g.h = s7.prototype;
    g.h.connect = function(a, b) {
        if (b) {
            var c = b.listId,
                d = b.videoId,
                e = b.playerParams,
                f = b.clickTrackingParams,
                k = b.index,
                l = { videoId: d },
                m = b.currentTime,
                n = b.locationInfo;
            g.Fa(m) && (l.currentTime = 5 >= m ? 0 : m);
            e && (l.playerParams = e);
            n && (l.locationInfo = n);
            f && (l.clickTrackingParams = f);
            c && (l.listId = c);
            g.Fa(k) && (l.currentIndex = k);
            c && (this.Qa.listId = c);
            this.Qa.videoId = d;
            this.Qa.index = k || 0;
            this.Qa.state = 3;
            d7(this.Qa, m);
            this.u = "UNSUPPORTED";
            t7("Connecting with setPlaylist and params: " + g.zh(l));
            this.g.connect({
                method: "setPlaylist",
                params: g.zh(l)
            }, a, G4())
        } else t7("Connecting without params"), this.g.connect({}, a, G4());
        Toa(this)
    };
    g.h.dispose = function() {
        this.ea() || (this.N("beforeDispose"), u7(this, 3));
        s7.Ha.dispose.call(this)
    };
    g.h.U = function() {
        v7(this);
        x7(this);
        w7(this);
        g.uq(this.G);
        this.G = NaN;
        g.uq(this.I);
        this.I = NaN;
        this.o = null;
        g.gs(this.T);
        this.T.length = 0;
        this.g.dispose();
        s7.Ha.U.call(this);
        this.u = this.D = this.l = this.Qa = this.g = null
    };
    g.h.aC = function() { this.B(2) };
    g.h.ZG = function() {
        t7("Channel opened");
        this.P && (this.P = !1, w7(this), this.L = g.sq((0, g.y)(function() {
            t7("Timing out waiting for a screen.");
            this.B(1)
        }, this), 15E3));
        uoa(Boa(this.g), this.aa)
    };
    g.h.WG = function() {
        t7("Channel closed");
        isNaN(this.A) ? J4(!0) : J4();
        this.dispose()
    };
    g.h.XG = function(a) {
        J4();
        isNaN(this.F()) ? (t7("Channel error: " + a + " without reconnection"), this.dispose()) : (this.P = !0, t7("Channel error: " + a + " with reconnection in " + this.F() + " ms"), u7(this, 2))
    };
    g.h.YG = function(a) {
        a.params ? t7("Received: action=" + a.action + ", params=" + g.zh(a.params)) : t7("Received: action=" + a.action + " {}");
        switch (a.action) {
            case "loungeStatus":
                a = g.bp(a.params.devices);
                this.l = (0, g.D)(a, function(a) { return new r4(a) });
                a = !!g.bb(this.l, function(a) { return "LOUNGE_SCREEN" == a.type });
                A7(this, a);
                break;
            case "loungeScreenDisconnected":
                g.kb(this.l, function(a) { return "LOUNGE_SCREEN" == a.type });
                A7(this, !1);
                break;
            case "remoteConnected":
                var b = new r4(g.bp(a.params.device));
                g.bb(this.l, function(a) { return b ? a.id == b.id : !1 }) || koa(this.l, b);
                break;
            case "remoteDisconnected":
                b = new r4(g.bp(a.params.device));
                g.kb(this.l, function(a) { return b ? a.id == b.id : !1 });
                break;
            case "gracefulDisconnect":
                break;
            case "playlistModified":
                B7(this, a);
                break;
            case "nowPlaying":
                Woa(this, a);
                break;
            case "onStateChange":
                C7(this, a);
                break;
            case "onAdStateChange":
                Xoa(this, a);
                break;
            case "onVolumeChanged":
                Yoa(this, a);
                break;
            case "onSubtitlesTrackChanged":
                Voa(this, a);
                break;
            case "nowAutoplaying":
                Zoa(this, a);
                break;
            case "autoplayDismissed":
                this.N("autoplayDismissed");
                break;
            case "autoplayUpNext":
                this.D = a.params.videoId || null;
                this.N("autoplayUpNext", this.D);
                break;
            case "onAutoplayModeChanged":
                this.u =
                    a.params.autoplayMode;
                this.N("autoplayModeChange", this.u);
                "DISABLED" == this.u && this.N("autoplayDismissed");
                break;
            case "onHasPreviousNextChanged":
                $oa(this, a);
                break;
            case "requestAssistedSignIn":
                this.N("assistedSignInRequested", a.params.authCode);
                break;
            default:
                t7("Unrecognized action: " + a.action)
        }
    };
    g.h.RK = function() {
        if (this.o) {
            var a = this.o;
            this.o = null;
            this.Qa.videoId != a && y7(this, "getNowPlaying")
        }
    };
    s7.prototype.subscribe = s7.prototype.subscribe;
    s7.prototype.unsubscribeByKey = s7.prototype.wf;
    s7.prototype.ca = function() {
        var a = 3;
        this.ea() || (a = 0, isNaN(this.F()) ? T5(this.g) && isNaN(this.A) && (a = 1) : a = 2);
        return a
    };
    s7.prototype.getProxyState = s7.prototype.ca;
    s7.prototype.B = function(a) {
        t7("Disconnecting with " + a);
        v7(this);
        this.N("beforeDisconnect", a);
        1 == a && J4();
        S5(this.g, a);
        this.dispose()
    };
    s7.prototype.disconnect = s7.prototype.B;
    s7.prototype.ga = function() {
        var a = this.Qa;
        this.o && (a = this.Qa.clone(), f7(a, this.o, a.index));
        return g7(a)
    };
    s7.prototype.getPlayerContextData = s7.prototype.ga;
    s7.prototype.ma = function(a) {
        var b = new a7(a);
        b.videoId && b.videoId != this.Qa.videoId && (this.o = b.videoId, g.uq(this.G), this.G = g.sq((0, g.y)(this.RK, this), 5E3));
        var c = [];
        this.Qa.listId == b.listId && this.Qa.videoId == b.videoId && this.Qa.index == b.index || c.push("remoteQueueChange");
        this.Qa.playerState == b.playerState && this.Qa.volume == b.volume && this.Qa.muted == b.muted && e7(this.Qa) == e7(b) && g.zh(this.Qa.g) == g.zh(b.g) || c.push("remotePlayerChange");
        this.Qa.reset(a);
        (0, g.A)(c, function(a) { this.N(a) }, this)
    };
    s7.prototype.setPlayerContextData = s7.prototype.ma;
    s7.prototype.R = function() {
        var a = this.g.B.id,
            b = g.bb(this.l, function(b) { return "REMOTE_CONTROL" == b.type && b.id != a });
        return b ? b.id : ""
    };
    s7.prototype.getOtherConnectedRemoteId = s7.prototype.R;
    s7.prototype.F = function() { var a = this.g; return a.l.isActive() ? a.l.l - (0, g.C)() : NaN };
    s7.prototype.getReconnectTimeout = s7.prototype.F;
    s7.prototype.Y = function() { return this.u || "UNSUPPORTED" };
    s7.prototype.getAutoplayMode = s7.prototype.Y;
    s7.prototype.X = function() { return this.D || "" };
    s7.prototype.getAutoplayVideoId = s7.prototype.X;
    s7.prototype.ua = function() {
        if (!isNaN(this.F())) {
            var a = this.g.l;
            g.So(a.g);
            a.start()
        }
    };
    s7.prototype.reconnect = s7.prototype.ua;
    s7.prototype.ka = function(a, b) {
        y7(this, a, b);
        z7(this)
    };
    s7.prototype.sendMessage = s7.prototype.ka;
    g.z(D7, e6);
    g.h = D7.prototype;
    g.h.Ad = function(a) { return this.Ac.$_gs(a) };
    g.h.contains = function(a) { return !!this.Ac.$_c(a) };
    g.h.get = function(a) { return this.Ac.$_g(a) };
    g.h.start = function() { this.Ac.$_st() };
    g.h.add = function(a, b, c) { this.Ac.$_a(a, b, c) };
    g.h.remove = function(a, b, c) { this.Ac.$_r(a, b, c) };
    g.h.qn = function(a, b, c, d) { this.Ac.$_un(a, b, c, d) };
    g.h.U = function() {
        for (var a = 0, b = this.l.length; a < b; ++a) this.Ac.$_ubk(this.l[a]);
        this.l.length = 0;
        this.Ac = null;
        D7.Ha.U.call(this)
    };
    g.h.NL = function() { this.N("screenChange") };
    g.h.FI = function() { this.N("onlineScreenChange") };
    r6.prototype.$_st = r6.prototype.start;
    r6.prototype.$_gspc = r6.prototype.OL;
    r6.prototype.$_gsppc = r6.prototype.lA;
    r6.prototype.$_c = r6.prototype.contains;
    r6.prototype.$_g = r6.prototype.get;
    r6.prototype.$_a = r6.prototype.add;
    r6.prototype.$_un = r6.prototype.qn;
    r6.prototype.$_r = r6.prototype.remove;
    r6.prototype.$_gs = r6.prototype.Ad;
    r6.prototype.$_gos = r6.prototype.kA;
    r6.prototype.$_s = r6.prototype.subscribe;
    r6.prototype.$_ubk = r6.prototype.wf;
    var E7 = null,
        F7 = null,
        V7 = null,
        J7 = [];
    g.r(Y7, g.F);
    g.h = Y7.prototype;
    g.h.U = function() {
        g.F.prototype.U.call(this);
        this.u.stop();
        this.B.stop();
        this.O.stop();
        this.P();
        this.g.unsubscribe("proxyStateChange", this.by, this);
        this.g.unsubscribe("remotePlayerChange", this.Xj, this);
        this.g.unsubscribe("remoteQueueChange", this.zm, this);
        this.g.unsubscribe("autoplayUpNext", this.Fx, this);
        this.g.unsubscribe("previousNextChange", this.Yx, this);
        this.g.unsubscribe("nowAutoplaying", this.Ux, this);
        this.g.unsubscribe("autoplayDismissed", this.Ex, this);
        this.g = this.A = null
    };
    g.h.Cw = function(a, b) {
        for (var c = [], d = 1; d < arguments.length; ++d) c[d - 1] = arguments[d];
        if (2 != this.g.g)
            if (b8(this)) {
                if (!k7(this.g).isAdPlaying() || "control_seek" != a) switch (a) {
                    case "control_toggle_play_pause":
                        1 == k7(this.g).playerState ? this.g.pause() : this.g.play();
                        break;
                    case "control_play":
                        this.g.play();
                        break;
                    case "control_pause":
                        this.g.pause();
                        break;
                    case "control_seek":
                        this.I.jj(c[0], c[1]);
                        break;
                    case "control_subtitles_set_track":
                        c8(this, c[0]);
                        break;
                    case "control_set_audio_track":
                        c = c[0], b8(this) && this.g.setAudioTrack(this.l.getVideoData(1).videoId,
                            c)
                }
            } else switch (a) {
                case "control_toggle_play_pause":
                case "control_play":
                case "control_pause":
                    c = this.l.getCurrentTime();
                    d8(this, 0 == c ? void 0 : c);
                    break;
                case "control_seek":
                    d8(this, c[0]);
                    break;
                case "control_subtitles_set_track":
                    c8(this, c[0]);
                    break;
                case "control_set_audio_track":
                    c = c[0], b8(this) && this.g.setAudioTrack(this.l.getVideoData(1).videoId, c)
            }
    };
    g.h.TG = function(a) { this.O.XB(a) };
    g.h.vL = function(a) { this.Cw("control_subtitles_set_track", g.vc(a) ? null : a) };
    g.h.Az = function() {
        var a = this.l.getOption("captions", "track");
        g.vc(a) || c8(this, a)
    };
    g.h.Qx = function(a) {
        if (b8(this)) {
            this.g.unsubscribe("remotePlayerChange", this.Xj, this);
            var b = Math.round(a.volume);
            a = !!a.muted;
            var c = k7(this.g);
            if (b != c.volume || a != c.muted) this.g.setVolume(b, a), this.L.start();
            this.g.subscribe("remotePlayerChange", this.Xj, this)
        }
    };
    g.h.WH = function() {
        g.vc(this.D) || e8(this, this.D);
        this.F = !1
    };
    g.h.by = function(a, b) {
        this.B.stop();
        2 == b && this.zz()
    };
    g.h.Xj = function() {
        if (b8(this)) {
            this.u.stop();
            var a = k7(this.g);
            switch (a.playerState) {
                case 1080:
                case 1081:
                case 1084:
                case 1085:
                    this.A.Kl = 1;
                    break;
                case 1082:
                case 1083:
                    this.A.Kl = 0;
                    break;
                default:
                    this.A.Kl = -1
            }
            switch (a.playerState) {
                case 1081:
                case 1:
                    $7(this, new g.eD(8));
                    this.yz();
                    break;
                case 1085:
                case 3:
                    $7(this, new g.eD(9));
                    break;
                case 1083:
                case 0:
                    $7(this, new g.eD(2));
                    this.I.stop();
                    Z7(this, this.l.getVideoData().lengthSeconds);
                    break;
                case 1084:
                    $7(this, new g.eD(4));
                    break;
                case 2:
                    $7(this, new g.eD(4));
                    Z7(this, e7(a));
                    break;
                case -1:
                    $7(this, new g.eD(64));
                    break;
                case -1E3:
                    $7(this, new g.eD(128, { errorCode: "mdx.remoteerror", message: "This video is not available for remote playback." }))
            }
            a = k7(this.g).g;
            var b = this.D;
            (a || b ? a && b && a.trackName == b.trackName && a.languageCode == b.languageCode && a.languageName == b.languageName && a.format == b.format && a.kind == b.kind : 1) || (this.D = a, e8(this, a));
            a = k7(this.g); - 1 == a.volume || Math.round(this.l.getVolume()) == a.volume && this.l.isMuted() == a.muted || this.L.isActive() || this.Zz()
        } else a8(this)
    };
    g.h.Yx = function() { this.l.N("mdxpreviousnextchange") };
    g.h.zm = function() { b8(this) || a8(this) };
    g.h.qB = function() { this.g.ru() };
    g.h.Fx = function(a) { a && (a = g.gr("/watch_queue_ajax", { method: "GET", xc: { action_get_watch_queue_item: 1, video_id: a }, onSuccess: (0, g.y)(this.fK, this) })) && (this.P = (0, g.y)(a.abort, a)) };
    g.h.fK = function(a, b) {
        var c = new g.lB(g.W(this.l), { videoId: b.videoId, title: b.title, author: b.author, murlmq_webp: b.url });
        this.suggestion = c;
        this.l.N("mdxautoplayupnext", c)
    };
    g.h.Ux = function(a) { isNaN(a) || this.l.N("mdxnowautoplaying", a) };
    g.h.Ex = function() { this.l.N("mdxautoplaycanceled") };
    g.h.zE = function(a, b) {-1 == k7(this.g).playerState ? d8(this, a) : b && this.g.seekTo(a) };
    g.h.Zz = function() {
        if (b8(this)) {
            var a = k7(this.g);
            this.o.Ma(this.T);
            a.muted ? this.l.mute() : this.l.unMute();
            this.l.setVolume(a.volume);
            this.T = this.o.K(this.l, "onVolumeChange", this.Qx)
        }
    };
    g.h.yz = function() {
        this.u.stop();
        if (!this.g.ea()) {
            var a = k7(this.g);
            1 == a.playerState && $7(this, new g.eD(8));
            Z7(this, e7(a));
            this.u.start()
        }
    };
    g.h.zz = function() {
        this.B.stop();
        this.u.stop();
        var a = this.g.u.getReconnectTimeout();
        2 == this.g.g && !isNaN(a) && this.B.start()
    };
    g.r(h8, g.T);
    h8.prototype.u = function(a) { g8(this, a.state) };
    g.r(i8, g.jT);
    i8.prototype.I = function() {
        var a = this.l.getOption("remote", "receivers");
        a && 1 < a.length && !this.l.getOption("remote", "quickCast") ? (this.F = g.Db(a, this.A, this), g.lT(this, (0, g.D)(a, this.A)), a = this.l.getOption("remote", "currentReceiver"), this.Me(this.A(a)), this.enable(!0)) : this.enable(!1)
    };
    i8.prototype.A = function(a) { return a.key };
    i8.prototype.Xd = function(a) { return "cast-selector-receiver" == a ? "Cast..." : this.F[a].name };
    i8.prototype.Qc = function(a) {
        g.jT.prototype.Qc.call(this, a);
        this.l.setOption("remote", "currentReceiver", this.F[a]);
        this.o.gb()
    };
    g.r(j8, g.rK);
    g.h = j8.prototype;
    g.h.create = function() {
        epa(g.cz(g.W(this.player)));
        this.A.push(g.zq("yt-remote-before-disconnect", this.PG, this));
        this.A.push(g.zq("yt-remote-connection-change", this.lJ, this));
        this.A.push(g.zq("yt-remote-receiver-availability-change", this.Zx, this));
        this.A.push(g.zq("yt-remote-auto-connect", this.jJ, this));
        this.A.push(g.zq("yt-remote-receiver-resumed", this.iJ, this));
        this.Zx()
    };
    g.h.load = function() {
        this.player.cancelPlayback();
        g.rK.prototype.load.call(this);
        this.u = new Y7(this, this.player, this.g);
        var a = (a = X7()) ? a.currentTime : 0;
        var b = U7() ? new j7(P7(), void 0) : null;
        0 == a && b && (a = e7(k7(b)));
        0 != a && this.hd(a);
        f8(this, this.Jj, this.Jj);
        g.fX(this.player.app, 6)
    };
    g.h.unload = function() {
        this.player.N("mdxautoplaycanceled");
        this.o = this.l;
        g.Xf(this.u, this.g);
        this.g = this.u = null;
        g.rK.prototype.unload.call(this);
        g.fX(this.player.app, 5)
    };
    g.h.U = function() {
        g.Aq(this.A);
        g.rK.prototype.U.call(this)
    };
    g.h.Oe = function(a, b) {
        for (var c = [], d = 1; d < arguments.length; ++d) c[d - 1] = arguments[d];
        this.loaded && this.u.Cw.apply(this.u, [a].concat(g.ea(c)))
    };
    g.h.getAdState = function() { return this.Kl };
    g.h.UB = function() { return this.loaded ? this.u.suggestion : null };
    g.h.Be = function() { return this.g ? k7(this.g).Be : !1 };
    g.h.hasNext = function() { return this.g ? k7(this.g).hasNext : !1 };
    g.h.hd = function(a, b) {
        this.F = a || 0;
        this.player.N("progresssync", a, b)
    };
    g.h.getCurrentTime = function() { return this.F };
    g.h.getProgressState = function() {
        var a = k7(this.g),
            b = this.player.getVideoData();
        return {
            allowSeeking: g.P(g.W(this.player).experiments, "web_player_mdx_allow_seeking_change_killswitch") ? this.player.ac() : !a.isAdPlaying() && this.player.ac(),
            clipEnd: b.clipEnd,
            clipStart: b.clipStart,
            current: this.getCurrentTime(),
            displayedStart: -1,
            duration: a.getDuration(),
            ingestionTime: a.A ? a.o + c7(a) : a.o,
            isPeggedToLive: 1 >= (a.A ? a.l + c7(a) : a.l) - this.getCurrentTime(),
            loaded: a.G,
            seekableEnd: a.A ? a.l + c7(a) : a.l,
            seekableStart: 0 < a.u ? a.u +
                c7(a) : a.u
        }
    };
    g.h.nextVideo = function() { this.g && this.g.nextVideo() };
    g.h.Fm = function() { this.g && this.g.Fm() };
    g.h.PG = function(a) { 1 == a && (this.D = this.g ? k7(this.g) : null) };
    g.h.lJ = function() {
        var a = U7() ? new j7(P7(), void 0) : null;
        if (a) {
            var b = this.o;
            this.loaded && this.unload();
            this.g = a;
            this.D = null;
            b.key != this.l.key && (this.o = b, this.load())
        } else g.Wf(this.g), this.g = null, this.loaded && (this.unload(), (a = this.D) && a.videoId == this.player.getVideoData().videoId && this.player.cueVideoById(a.videoId, e7(a)));
        this.player.N("videodatachange", "newdata", this.player.getVideoData(), 3)
    };
    g.h.Zx = function() {
        this.B = [this.l].concat(fpa());
        var a = Q7() || this.l;
        k8(this, a);
        this.player.na("onMdxReceiversChange")
    };
    g.h.jJ = function() {
        var a = Q7();
        k8(this, a)
    };
    g.h.iJ = function() { this.o = Q7() };
    g.h.Xb = function(a, b) {
        switch (a) {
            case "casting":
                return this.loaded;
            case "receivers":
                return this.B;
            case "currentReceiver":
                return b && ("cast-selector-receiver" == b.key ? Z6() : k8(this, b)), this.loaded ? this.o : this.l;
            case "quickCast":
                return 2 == this.B.length && "cast-selector-receiver" == this.B[1].key ? (b && Z6(), !0) : !1
        }
    };
    g.h.Vr = function() { this.g.Vr() };
    g.h.Lb = function() { return !1 };
    g.h.getOptions = function() { return ["casting", "receivers", "currentReceiver", "quickCast"] };
    g.vU.remote = j8;
})(_yt_player);