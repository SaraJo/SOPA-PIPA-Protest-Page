(function() {
    var body=null,isIE=(/msie/i.test(navigator.userAgent) && !/opera/i.test(navigator.userAgent));

    function makeA(elem,attrs) {
        var e = document.createElement(elem);
        for(var a in attrs) {
            if(a === "content") {
                e.innerText = attrs[a];
            } else {
                e.setAttribute(a,attrs[a]);
            }
        }
        return e;
    };

    function sopa() {
        var stintCondensedCSS = makeA("link",{
            href: 'http://fonts.googleapis.com/css?family=Stint+Ultra+Condensed',
            rel: 'stylesheet',
            type: 'text/css'
        });

        var banner = makeA("div", {
           style: "marginL:0;padding:0;font-family: 'Stint Ultra Condensed';height: 50px;width: 100%;background-color: #000; position: absolute;top: 0;"
        });
        var inner = makeA("div", {
           style: "width: 840px;margin: 0 auto;"
        });

        var couldDisappear = makeA("p", {
            style: "float:left;color:#fff;font-family: 'Arial';letter-spacing:5px;margin-top: 13px!important;",
            content: "This site could disappear forever."
        });

        var link = makeA("a", {
           href: "http://www.tumblr.com/protect-the-net",
           style: "font-size: 40px;text-decoration: underline;color:#bb7711;float: left;margin: 0;padding: 0 15px 0 0;",
           content: "ACT NOW."
        });

        var saveInternet = makeA("p", {
           style: "color:#fff;font-size: 40px;float: left;margin: 0;padding: 0 15px 0 0;",
           content: "SAVE THE INTERNET."
        });

        inner.appendChild(couldDisappear);
        inner.appendChild(link);
        inner.appendChild(saveInternet);
        banner.appendChild(inner);

        document.head.appendChild(stintCondensedCSS);
        body.appendChild(banner);
    };

    (window.addEventListener || window.attachEvent)(isIE?"onload":"load",function(){
        body=document.body;
        sopa();
    }, false);
})();
