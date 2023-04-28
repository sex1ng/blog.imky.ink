"use strict";

if (typeof _w_ripple == "undefined") {
    window._w_ripple = "_w_podium";
}

if (document.querySelector("input#" + window._w_ripple) == null && typeof chrome != "undefined" && typeof chrome.runtime != "undefined" && typeof chrome.runtime.id != "undefined" && typeof chrome.runtime.getURL != "undefined") {
    let _w_leeway = document.createElement("input");
    _w_leeway.type = "hidden";
    _w_leeway.id = _w_ripple;
    (document.head || document.documentElement).appendChild(_w_leeway);
    let _w_rout = document.createElement("script");
    _w_rout.type = "text/javascript";
    _w_rout.src = chrome.runtime.getURL("/scripts/inspector.js");
    (document.head || document.documentElement).appendChild(_w_rout);
} else if (!window._w_ken) {
    window._w_ken = function() {
        let _w_defect = [];
        let _w_clot = {};
        let _w_snare = /(['"\s\n\r])[^'"\s\n\r]*?\.(apng|bmp|gif|ico|cur|jpg|jpeg|jfif|pjpeg|pjp|png|svg|tif|tiff|webp)(\?[^'"\s\n\r]*)?(?=\1)/gi;
        let _w_deluge = function(_w_limb) {
            _w_limb && _w_limb.forEach((function(item) {
                let _w_geyser = item.replace(/[\\'"\s\n\r]+/gi, "");
                if (!_w_clot[_w_geyser]) {
                    _w_clot[_w_geyser] = true;
                    _w_defect.push(_w_geyser);
                }
            }));
        };
        XMLHttpRequest.prototype.realSend = XMLHttpRequest.prototype.send;
        XMLHttpRequest.prototype.send = function(value) {
            this.addEventListener("load", (function() {
                if (!this.responseType || this.responseType === "text") {
                    let _w_limb = this.responseText.match(_w_snare);
                    _w_deluge(_w_limb);
                }
            }), false);
            this.realSend(value);
        };
        const _w_harbor = window.fetch;
        window.fetch = function() {
            return new Promise(((resolve, reject) => {
                _w_harbor.apply(this, arguments).then((function(response) {
                    response.clone && response.clone().text().then((function(_w_solo) {
                        let _w_limb = _w_solo.match(_w_snare);
                        _w_deluge(_w_limb);
                    }));
                    resolve(response);
                })).catch((function(response) {
                    reject(response);
                }));
            }));
        };
        let _w_limb = document.documentElement.innerHTML.match(_w_snare);
        _w_deluge(_w_limb);
        setInterval((function() {
            let _w_leeway = document.getElementById(_w_ripple);
            if (_w_leeway && _w_leeway.value.length > 0 && _w_leeway.value == _w_ripple && _w_defect.length > 0) {
                _w_leeway.value = JSON.stringify(_w_defect);
                _w_defect = [];
            }
        }), 512);
        return {
            _w_lathe: function() {
                return _w_defect.length;
            }
        };
    }();
}