<?php

if($_SERVER['SCRIPT_NAME'] == "/3dsbrowserhax_auto.php")
{
	$appendstr = "";
	if(isset($_SERVER['QUERY_STRING']) && $_SERVER['QUERY_STRING'] !== "")$appendstr = "?" . $_SERVER['QUERY_STRING'];

	$ua = $_SERVER['HTTP_USER_AGENT'];
	if(!strstr($ua, "Mozilla/5.0 (Nintendo 3DS; U; ; ") && !strstr($ua, "Mozilla/5.0 (New Nintendo 3DS"))
	{
		echo "<head><meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" /></head>This page is only intended for the system web-browsers for Nintendo 3DS, since you're using a non-3DS browser go here: <a href=\"http://yls8.mtheall.com/3dsbrowserhax.php\">http://yls8.mtheall.com/3dsbrowserhax.php</a>.";
		exit;
	}

	$page = "";

	if(strstr($ua, "Mozilla/5.0 (Nintendo 3DS; U; ; "))
	{
		if(strstr($ua, "1.7455") || strstr($ua, "1.7498") || strstr($ua, "1.7552") || strstr($ua, "1.7567") || strstr($ua, "1.7585") || strstr($ua, "1.7610"))
		{
			$page = "sliderhax.php";
		}
		else
		{
			$page = "spider28hax.php";
		}

		header("Location: $page$appendstr");
		exit;
	}

	if(strstr($ua, "Mozilla/5.0 (New Nintendo 3DS"))
	{
		if(strstr($ua, "1.0.9934") || strstr($ua, "1.1.9996") || strstr($ua, "1.2.10085") || strstr($ua, "1.3.10126"))
		{
			$page = "browserhax_fright.php";
		}
		else
		{
			$page = "browserhax_fright_tx3g.php";
		}

		echo "<html><head><script>window.location.assign(\"$page$appendstr\");</script></head><body></body></html>";
		exit;
	}
}

$con = "<head><meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" /><title>Nintendo 3DS web-browser exploits</title></head>\n<body>";

$con.= "The following are system-web-browser exploits for Nintendo 3DS, the ones hosted here are for booting the *hax payloads(<a href=\"https://smealum.github.io/3ds/\">https://smealum.github.io/3ds/</a>). See the linked repos for usage details and supported browser versions, etc, including the common codebase: <a href=\"https://github.com/yellows8/3ds_browserhax_common\">https://github.com/yellows8/3ds_browserhax_common</a>. On a supported browser, you can go <a href=\"3dsbrowserhax_auto.php\">here</a>, which will automatically determine which exploit to return for your browser.<br/>\n  Once you boot into the payload successfully, you can then install exploit(s) from here(this is <b>highly</b> recommended): <a href=\"http://3dbrew.org/wiki/Homebrew_Exploits\">http://3dbrew.org/wiki/Homebrew_Exploits</a>. This highly recommended because of the browser-version-check implemented with v9.9, see <a href=\"http://3dbrew.org/wiki/Internet_Browser\">here</a> for details.<br/>\n<br/>\nThe following QR-code can be scanned by an Old3DS/New3DS for accessing the previously mentioned <a href=\"3dsbrowserhax_auto.php\">URL</a>: <br/>\n<img src=\"3dsbrowserhax_auto_qrcode.png\"><br/>\n<br/>\n";

$con.= "Note that systems where the system was updated with a >=v9.9 gamecard sysupdate have a dummy browser installed, unless an online sysupdate was done afterwards. See <a href=\"http://3dbrew.org/wiki/Internet_Browser\">here</a> for details.<br/><br/>\n";

$con.= "The <i>only</i> required SD-card setup is that you extract the homebrew <a href=\"https://smealum.github.io/3ds/\">starter-kit</a> on SD.<br/><br/>\n";

$con.= "Before using any of the Old3DS browser exploits, you should do the following:<br/><ol>\n";
$con.= "<li>Use the browser 'Initialize savedata' option.</li>\n";
$con.= "<li>Enter the browser again so that savedata can be setup. Then goto directly to the exploit page(this can be the auto <a href=\"3dsbrowserhax_auto.php\">page</a>), you can return to Home Menu for scanning the above QR-code for this if you prefer.</li>\n";
$con.= "<li>Exit the browser so that the current page automatically loads when the browser gets launched again. At this point the only pages in the browser history should be the default 3ds-bookmarks page followed by just the exploit page.</li>\n";
$con.= "<li>Enter the browser then trigger the haxx as described in the repos linked below(when they don't auto-trigger).</li>\n";
$con.= "</ol><br/>\n";

if(file_exists("3dsbrowserhax_siteincpage.php"))require_once("3dsbrowserhax_siteincpage.php");

$con.= "The repo for the Old3DS exploits and 3dswebkithax_removewinframe is located <a href=\"https://github.com/yellows8/3ds_webkithax\">here</a>. The repo for the New3DS exploits(minus 3dswebkithax_removewinframe) is located <a href=\"https://github.com/yellows8/browserhax_fright\">here</a>.<br/><br/>\n";

$con.= "Due to the *hax payloads, the exploits hosted here are only usable on systems with system-version >=v9.0 with the system web-browser installed.<br/>Using the <a href=\"3dsbrowserhax_auto.php\">auto</a> page(such as with the above QR-code) instead of going to the exploit pages linked below manually, is <b>highly</b> recommended.<br/><br/>\n";

$con.= "<table border=\"1\">\n";

$con.= "<tr>
  <th>System</th>
  <th>Exploit</th>
  <th>Supported system-versions</th>
  <th>Fixed with system-version</th>
  <th>Returned by 3dsbrowserhax_auto.php</th>
</tr>\n";

$con.= "<tr><td>Old3DS</td><td><a href=\"sliderhax.php\">sliderhax</a></td><td>All <=10.1.0-27(aka <=X.X.X-27)</td><td>>=10.2.0-28(aka >=X.X.X-28)</td><td>Only when the browser version is supported.</td></tr>\n";
$con.= "<tr><td>New3DS</td><td><a href=\"3dswebkithax_removewinframe.php\">3dswebkithax_removewinframe</a></td><td>All <=9.8.0-25(aka <=X.X.X-25)</td><td>>=9.9.0-26(aka >=X.X.X-26)</td><td>Not returned at all(this exploit is also very unreliable).</td></tr>\n";
$con.= "<tr><td>New3DS</td><td><a href=\"browserhax_fright.php\">browserhax_fright</a></td><td>All <=10.1.0-27(aka <=X.X.X-27)</td><td>>=10.2.0-28(aka >=X.X.X-28)</td><td>Only when the browser version is supported by this exploit.</td></tr>\n";
$con.= "<tr><td>New3DS</td><td><a href=\"browserhax_fright_tx3g.php\">browserhax_fright_tx3g</a></td><td>All <=10.4.0-29(aka <=X.X.X-29)</td><td>None as of X.X.X-29.</td><td>Only when the browser version isn't supported by the above browserhax_fright.</td></tr>\n";
$con.= "<tr><td>Old3DS</td><td><a href=\"spider28hax.php\">spider28hax</a></td><td>Only 10.3.0-28(aka X.X.X-28)</td><td>None at the time of exploit release.</td><td>Only when the browser version isn't supported by sliderhax.</td></tr>\n";

$con.= "</table>";

echo $con;

?>
