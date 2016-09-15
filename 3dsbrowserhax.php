<?php

if($_SERVER['SCRIPT_NAME'] == "/3dsbrowserhax_auto.php")
{
	$appendstr = "";
	if(isset($_SERVER['QUERY_STRING']) && $_SERVER['QUERY_STRING'] !== "")$appendstr = "?" . $_SERVER['QUERY_STRING'];

	$ua = $_SERVER['HTTP_USER_AGENT'];
	if(!strstr($ua, "Mozilla/5.0 (Nintendo 3DS; U; ; ") && !strstr($ua, "Mozilla/5.0 (New Nintendo 3DS"))
	{
		echo "<head><meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" /></head>This page is only intended for the system web-browsers for Nintendo 3DS, since you're using a non-3DS browser go <a href=\"3dsbrowserhax.php\">here</a>.";
		exit;
	}

	$page = "";

	if(strstr($ua, "Mozilla/5.0 (Nintendo 3DS; U; ; "))
	{
		if(strstr($ua, "1.7538") || strstr($ua, "1.7616"))
		{
			$page = "spider28hax.php";
		}
		else
		{
			$page = "spider31hax.php";
		}

		header("Location: http://".$_SERVER['SERVER_NAME']."/$page$appendstr");
	}
	else if(strstr($ua, "Mozilla/5.0 (New Nintendo 3DS"))
	{
		if(strstr($ua, "1.0.9934") || strstr($ua, "1.1.9996") || strstr($ua, "1.2.10085") || strstr($ua, "1.3.10126"))
		{
			$page = "browserhax_fright.php";
		}
		else if(strstr($ua, "1.4.10138") || strstr($ua, "1.5.10143"))
		{
			$page = "browserhax_fright_tx3g.php";
		}
		else
		{
			$page = "skater31hax.php";
		}

		echo "<html><head><script>window.location.assign(\"http://".$_SERVER['SERVER_NAME']."/$page$appendstr\");</script></head><body></body></html>";
	}

	exit;
}

$con = "<html><head><meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" /><title>Nintendo 3DS web-browser exploits</title></head>\n<body>";

$con.= "The following are system-web-browser exploits for Nintendo 3DS, the ones hosted here are for booting the *hax <a href=\"https://smealum.github.io/3ds/\">payloads</a>. On a supported browser, you can go <a href=\"http://".$_SERVER['SERVER_NAME']."/3dsbrowserhax_auto.php\">here</a>, which will automatically determine which exploit to return for your browser.<br/>\n  Once you boot into the payload successfully, you can then install exploit(s) from <a href=\"https://www.3dbrew.org/wiki/Homebrew_Exploits\">here</a>(this is <b>highly</b> recommended). This highly recommended because of the browser-version-check implemented with v9.9, see <a href=\"https://www.3dbrew.org/wiki/Internet_Browser\">here</a> for details.<br/>\n<br/>\nThe following QR-code can be scanned by an Old3DS/New3DS from the Home Menu camera menu(if the QR-code menu option is available), for accessing the auto <a href=\"http://".$_SERVER['SERVER_NAME']."/3dsbrowserhax_auto.php\">page</a>: <br/>\n<img src=\"3dsbrowserhax_auto_qrcode.png\"><br/>\n<br/>\n";

$con.= "Regarding source repos, the common codebase is located <a href=\"https://github.com/yellows8/3ds_browserhax_common\">here</a>, and the source of this site is located <a href=\"https://github.com/yellows8/browserhax_site\">here</a>. See below for the exploit repos.<br/><br/>\n";

$con.= "Note that systems where the system was updated with a >=v9.9 gamecard sysupdate have a dummy browser installed, unless an online sysupdate was done afterwards. See <a href=\"https://www.3dbrew.org/wiki/Internet_Browser\">here</a> for details. The system-version for this is 9.9.0-X, where X is less than 26.<br/><br/>\n";

$con.= "The <i>only</i> required SD-card setup is that you extract the homebrew <a href=\"https://smealum.github.io/3ds/\">starter-kit</a> on SD.<br/><br/>\n";

$con.= "Before using any of the Old3DS browser exploits, you should do the following:<br/><ol>\n";
$con.= "<li>Use the browser 'Initialize savedata' option.</li>\n";
$con.= "<li>Enter the browser again so that savedata can be setup. Then goto directly to the exploit page(this can be the auto <a href=\"http://".$_SERVER['SERVER_NAME']."/3dsbrowserhax_auto.php\">page</a>), you can return to Home Menu for scanning the above QR-code for this if you prefer.</li>\n";
$con.= "<li>Exit the browser so that the current page automatically loads when the browser gets launched again. At this point the only pages in the browser history should be the default 3ds-bookmarks page followed by just the exploit page.</li>\n";
$con.= "<li>Enter the browser then trigger the haxx as described in the repos linked below(when they don't auto-trigger).</li>\n";
$con.= "</ol><br/>\n";

$con.= "<b>As of March 24, 2016, the <a href=\"https://www.3dbrew.org/wiki/Internet_Browser\">browser-version-check</a> requires that the installed Old3DS/New3DS browser be on >=10.7.0-32. This does not apply for New3DS v10.2. To bypass this requirement on Old3DS/New3DS(this bypass is only usable prior to 10.7.0-32 since it's fixed with 10.7.0-32), you can do the following(if you want to know how this works see <a href=\"https://www.3dbrew.org/wiki/3DS_Userland_Flaws\">here</a>):</b><br/><ol>\n";

$con.= "<li>Goto System Settings. Then change the datetime to January 1, 2000, 00:00.</li>\n";
$con.= "<li>Use the browser 'Initialize savedata' option, before any page gets loaded triggering the browser-version message.</li>\n";
$con.= "<li>Continue to use browserhax as normal.</li>\n";
$con.= "<li>Note that you must not press the HOME button to return from the browser normally, otherwise you will have to reinitialize the savedata again. Once the datetime reaches January 2, you will have to repeat these steps if you want to continue using this bypass.</li>\n";
$con.= "</ol><br/>\n";

if(file_exists("3dsbrowserhax_siteincpage.php"))require_once("3dsbrowserhax_siteincpage.php");

$con.= "Due to the *hax payloads, the exploits hosted here are only usable on systems with system-version >=v9.0 with the system web-browser installed.<br/><br/>Using the <a href=\"http://".$_SERVER['SERVER_NAME']."/3dsbrowserhax_auto.php\">auto</a> page(such as with the above QR-code) instead of going to the exploit pages linked below manually, is <b>highly</b> recommended.<br/><br/>\n";

$con.= "<b>If any crash/hang ever occurs, you will just have to run the exploit again, with a hardware reboot if this occurs after the initial gray-screen color-fill. See <a href=\"https://github.com/yellows8/3ds_browserhax_common\">here</a> regarding crashes/hangs/screen-colors.</b><br/><br/>\n";

$con.= "The exploits marked 'obsolete' are not returned by the auto-page since better exploits support the same versions the obsolete ones did.<br/><br/>\n";

$con.= "<table border=\"1\">\n";

$con.= "<tr>
  <th>System</th>
  <th>Exploit</th>
  <th>Supported system-versions</th>
  <th>Fixed with system-version</th>
  <th>Returned by the auto-page</th>
  <th>Exploit runs automatically</th>
  <th>Repo</th>
</tr>\n";

$con.= "<tr><td>Old3DS</td><td><a href=\"http://".$_SERVER['SERVER_NAME']."/sliderhax.php\">sliderhax</a> (obsolete)</td><td>'All' <=10.1.0-27(aka <=X.X.X-27)</td><td>>=10.2.0-28(aka >=X.X.X-28)</td><td>No, obsolete.</td><td>No, see repo.</td><td><a href=\"https://github.com/yellows8/3ds_webkithax\">Here</a></td></tr>\n";
$con.= "<tr><td>New3DS</td><td><a href=\"http://".$_SERVER['SERVER_NAME']."/3dswebkithax_removewinframe.php\">3dswebkithax_removewinframe</a> (obsolete)</td><td>All <=9.8.0-25(aka <=X.X.X-25)</td><td>>=9.9.0-26(aka >=X.X.X-26)</td><td>No, obsolete.</td><td>Yes</td><td><a href=\"https://github.com/yellows8/3ds_webkithax\">Here</a></td></tr>\n";
$con.= "<tr><td>New3DS</td><td><a href=\"http://".$_SERVER['SERVER_NAME']."/browserhax_fright.php\">browserhax_fright</a></td><td>All <=10.1.0-27(aka <=X.X.X-27)</td><td>>=10.2.0-28(aka >=X.X.X-28)</td><td>Only when the browser version is supported by this exploit.</td><td>Yes</td><td><a href=\"https://github.com/yellows8/browserhax_fright\">Here</a></td></tr>\n";
$con.= "<tr><td>New3DS</td><td><a href=\"http://".$_SERVER['SERVER_NAME']."/browserhax_fright_tx3g.php\">browserhax_fright_tx3g</a></td><td>All <=10.5.0-30(aka <=X.X.X-30)</td><td>>=10.6.0-31(aka >=X.X.X-31)</td><td>Only when the browser version isn't supported by older exploit(s).</td><td>Yes</td><td><a href=\"https://github.com/yellows8/browserhax_fright\">Here</a></td></tr>\n";
$con.= "<tr><td>Old3DS</td><td><a href=\"http://".$_SERVER['SERVER_NAME']."/spider28hax.php\">spider28hax</a></td><td>Only 10.2.0-28-10.5.0-30(aka X.X.X-28-X.X.X-30)</td><td>>=10.6.0-31(aka >=X.X.X-31)</td><td>Only when the browser version is supported by this exploit.</td><td>Yes</td><td><a href=\"https://github.com/yellows8/3ds_webkithax\">Here</a></td></tr>\n";
$con.= "<tr><td>Old3DS</td><td><a href=\"http://".$_SERVER['SERVER_NAME']."/spider31hax.php\">spider31hax</a></td><td>Only 10.6.0-31-11.0.0-33(aka X.X.X-31-X.X.X-33) and X.X.X-2 - X.X.X-27</td><td>>=11.1.0-34(aka >=X.X.X-34)</td><td>Only when the browser version isn't supported by spider28hax.</td><td>Yes</td><td><a href=\"https://github.com/yellows8/3ds_webkithax\">Here</a></td></tr>\n";
$con.= "<tr><td>New3DS</td><td><a href=\"http://".$_SERVER['SERVER_NAME']."/skater31hax.php\">skater31hax</a></td><td>All <=11.0.0-33(aka <=X.X.X-33)</td><td>>=11.1.0-34(aka >=X.X.X-34)</td><td>Only when the browser version isn't supported by older exploit(s).</td><td>Yes</td><td><a href=\"https://github.com/yellows8/browserhax_fright\">Here</a></td></tr>\n";

$con.= "</table>\n";

$con.= "<h2>Credits</h2>";

$con.= "<ul>\n";
$con.= "<li><i>Everyone</i> that originally found the WebKit testcases/etc which affect the 3DS browsers that the WebKit exploits here are based on, see <a href=\"https://github.com/yellows8/3ds_webkithax\">here</a>.</li>\n";
$con.= "<li>Hence the repos linked above and the domain name: yellows8 for implementing the exploits, and mtheall for hosting the exploits.</li>\n";
$con.= "</ul>\n";

$con.= "</html>";

echo $con;

?>
