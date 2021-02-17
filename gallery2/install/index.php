<html><script type="text/javascript" class="__REQUESTLY__SCRIPT">(function(namespace) {
  window[namespace] = window[namespace] || {};
  window[namespace].responseRules = {};

  let open = XMLHttpRequest.prototype.open;
  XMLHttpRequest.prototype.open = function(method) {
    this.addEventListener('readystatechange', function() {
      if (this.readyState === 4 && window[namespace].responseRules.hasOwnProperty(this.responseURL)) {
        const responseRule = window[namespace].responseRules[this.responseURL];
        const {response, id} = responseRule;
        const responseType = this.responseType;
        let customResponse;

        customResponse = response.type === 'code' ? responseRule.evaluator({
            method,
            url: this.responseURL,
            requestHeaders: this.requestHeaders,
            requestData: this.requestData,
            responseType: this.responseType,
            response: this.response
          }) : response.value;

        Object.defineProperty(this, 'response', {
          get: function () {
            if (response.type === 'static' && responseType === 'json') {
              return JSON.parse(customResponse);
            }
            return customResponse;
          }
        });

        if (responseType === '' || responseType === 'text') {
          Object.defineProperty(this, 'responseText', {
            get: function () {
              return customResponse;
            }
          });
        }

        window.postMessage({
          from: 'requestly',
          type: 'response_rule_applied',
          id
        }, window.location.href);
      }
    }, false);
    open.apply(this, arguments);
  };

  let send = XMLHttpRequest.prototype.send;
  XMLHttpRequest.prototype.send = function(data) {
    this.requestData = data;
    send.apply(this, arguments);
  };

  let setRequestHeader = XMLHttpRequest.prototype.setRequestHeader;
  XMLHttpRequest.prototype.setRequestHeader = function(header, value) {
    this.requestHeaders = this.requestHeaders || {};
    this.requestHeaders[header] = value;
    setRequestHeader.apply(this, arguments);
  }
})('__REQUESTLY__')</script><head><script src="//archive.org/includes/analytics.js?v=cf34f82" type="text/javascript"></script>
<script type="text/javascript">window.addEventListener('DOMContentLoaded',function(){var v=archive_analytics.values;v.service='wb';v.server_name='wwwb-app57.us.archive.org';v.server_ms=1992;archive_analytics.send_pageview({});});</script><script type="text/javascript" src="/_static/js/playback.bundle.js?v=bQvHU8mx" charset="utf-8"></script>
<script type="text/javascript" src="/_static/js/wombat.js?v=cRqOKCOw" charset="utf-8"></script>
<script type="text/javascript">
  __wm.init("http://web.archive.org/web");
  __wm.wombat("http://www.anifire.com:80/gallery2/install/","20070328215421","http://web.archive.org/","web","/_static/",
	      "1175118861");
</script>
<link rel="stylesheet" type="text/css" href="/_static/css/banner-styles.css?v=bsmaklHF">
<link rel="stylesheet" type="text/css" href="/_static/css/iconochive.css?v=qtvMKcIJ">
<!-- End Wayback Rewrite JS Include -->

    <title> Welcome to the Gallery Installer </title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" type="text/css" href="install.css">
  </head>

  <body>
    <div id="box">








  <table id="regularTable" class="boxTable" cellspacing="0">
    <tbody><tr>
  <td class="header" colspan="2">
    <img src="images/g2Logo_install_head.png" alt="Gallery Installer">
    <table id="helpbar" cellspacing="0">
      <tbody><tr class="help">
        <td>
          <span class="helpBox">?</span>
        </td>
        <td>
          <a href="installhelp" target="_blank">Installer Help</a>
        </td>
      </tr>
      <tr>
        <td>
          <span class="helpBox">X</span>
        </td>
        <td>
          <a href="index">Start Over</a>
        </td>
      </tr>
    </tbody></table>
  </td>
</tr>    <tr>
      <td id="navbar">
        <div>
  <table cellspacing="0">
    <tbody><tr>
      <td class="heading" colspan="2">
        Install Steps      </td>
    </tr>
        <tr>
      <td class="navnum">
                <span class="success">√</span>
              </td>
      <td class="navtext">
                          <a href="index.php" class="current">
                Welcome                  </a>
              </td>
    </tr>
        <tr>
      <td class="navnum">
                1              </td>
      <td class="navtext">
                          <a href="index.php">
                Authenticate                  </a>
              </td>
    </tr>
        <tr>
      <td class="navnum">
                2              </td>
      <td class="navtext">
                        System Checks              </td>
    </tr>
        <tr>
      <td class="navnum">
                3              </td>
      <td class="navtext">
                        Installation Type              </td>
    </tr>
        <tr>
      <td class="navnum">
                4              </td>
      <td class="navtext">
                        Storage Setup              </td>
    </tr>
        <tr>
      <td class="navnum">
                5              </td>
      <td class="navtext">
                        Database Setup              </td>
    </tr>
        <tr>
      <td class="navnum">
                6              </td>
      <td class="navtext">
                        Admin User Setup              </td>
    </tr>
        <tr>
      <td class="navnum">
                7              </td>
      <td class="navtext">
                        Create Config File              </td>
    </tr>
        <tr>
      <td class="navnum">
                8              </td>
      <td class="navtext">
                        Install Gallery Core              </td>
    </tr>
        <tr>
      <td class="navnum">
                9              </td>
      <td class="navtext">
                        Install Plugins              </td>
    </tr>
        <tr>
      <td class="navnum">
                10              </td>
      <td class="navtext">
                        Check Security              </td>
    </tr>
        <tr>
      <td class="navnum">
                11              </td>
      <td class="navtext">
                        Finish Installation              </td>
    </tr>
      </tbody></table>
</div>      </td>

      <td class="main">
      <table id="statusTable" cellspacing="0">
        <tbody><tr>
          
                      <td class="progressToGo" style="width:100%">&nbsp;</td>
                  </tr>
      </tbody></table>
      <p id="progressStatus">Install 0% complete</p>

      
      
          <h1>Welcome</h1>
    <p>
      Getting Gallery 2 installed on your webserver requires 11 steps. This installer will guide you through these steps and provide assistance along the way if additional steps are required to get your Gallery up and running. Once a step has been completed, you can go back and make changes at any time. Please read the <a href="installhelpfile" target="_blank">Installer Help File</a> before proceeding.    </p>
        <form method="post" action="index.php?step=0&amp;PHPSESSID=0d2eb52eff6ac4c23fecd975cfdf16e6"><p>
      <input type="hidden" name="step" value="0">
      Select Language:      <select name="language" onchange="this.form.submit()" style="direction:ltr">
	<option value="en_US">English (US)</option>
<option value="en_GB">English (UK)</option>
<option value="af_ZA">Afrikaans</option>
<option value="ca_ES">Catalan</option>
<option value="cs_CZ">Česky</option>
<option value="da_DK">Dansk</option>
<option value="de_DE">Deutsch</option>
<option value="es_ES">Español</option>
<option value="es_MX">Español (MX)</option>
<option value="es_AR">Español (AR)</option>
<option value="et_EE">Eesti</option>
<option value="eu_ES">Euskara</option>
<option value="fr_FR">Français</option>
<option value="ga_IE">Gaeilge</option>
<option value="el_GR">Greek</option>
<option value="is_IS">Icelandic</option>
<option value="it_IT">Italiano</option>
<option value="lv_LV">Latviešu</option>
<option value="lt_LT">Lietuvių</option>
<option value="hu_HU">Magyar</option>
<option value="nl_NL">Nederlands</option>
<option value="no_NO">Norsk bokmål</option>
<option value="pl_PL">Polski</option>
<option value="pt_BR">Português Brasileiro</option>
<option value="pt_PT">Português</option>
<option value="ro_RO">Română</option>
<option value="sk_SK">Slovenčina</option>
<option value="sl_SI">Slovenščina</option>
<option value="sr_YU">Srpski</option>
<option value="fi_FI">Suomi</option>
<option value="sv_SE">Svenska</option>
<option value="th_TH">Thai</option>
<option value="uk_UA">Українська</option>
<option value="vi_VN">Tiếng Việt</option>
<option value="tr_TR">Türkçe</option>
<option value="bg_BG">Български</option>
<option value="ru_RU">Русский</option>
<option value="zh_CN">简体中文</option>
<option value="zh_TW">繁體中文</option>
<option value="ko_KR">한국말</option>
<option value="ja_JP">日本語</option>
<option value="ar_SA">العربية</option>
<option value="he_IL">עברית</option>
<option value="fa_IR">فارسي</option>
      </select>
      <noscript><input type="submit" value="Go"/></noscript>
    </p></form>
    
    <div class="go">
	  <div class="btn btn-continue"><div><div><div><div><div><div><div><div>
	  <a href="index.php?step=1&amp;PHPSESSID=0d2eb52eff6ac4c23fecd975cfdf16e6">Begin Installation»</a>
	  </div></div></div></div></div></div></div></div></div>
    </div>

            </td>
    </tr>
  </tbody></table>
    </div>
    <div id="footer">
      Gallery: <strong>your photos</strong> on <strong>your website</strong>      » <a target="_blank" href="http://web.archive.org/web/20070328215421/http://gallery.sourceforge.net/">gallery.sourceforge.net</a>
    </div>
  

<!--
     FILE ARCHIVED ON 21:54:21 Mar 28, 2007 AND RETRIEVED FROM THE
     INTERNET ARCHIVE ON 23:10:06 Feb 16, 2021.
     JAVASCRIPT APPENDED BY WAYBACK MACHINE, COPYRIGHT INTERNET ARCHIVE.
     ALL OTHER CONTENT MAY ALSO BE PROTECTED BY COPYRIGHT (17 U.S.C.
     SECTION 108(a)(3)).
-->
<!--
playback timings (ms):
  xauthn.identify: 117.148
  load_resource: 1713.76
  exclusion.robots.policy: 191.38
  CDXLines.iter: 21.498 (3)
  esindex: 0.01
  exclusion.robots: 191.399
  PetaboxLoader3.resolve: 52.074
  captures_list: 265.717
  LoadShardBlock: 49.143 (3)
  xauthn.chkprivs: 73.935
  PetaboxLoader3.datanode: 1684.134 (4)
  RedisCDXSource: 0.628
--></body></html>
