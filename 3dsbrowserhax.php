<?php

if($_SERVER['SCRIPT_NAME'] == "/3dsbrowserhax_auto.php")
{
	$ua = $_SERVER['HTTP_USER_AGENT'];
	if(!strstr($ua, "Mozilla/5.0 (Nintendo 3DS; U; ; ") && !strstr($ua, "Mozilla/5.0 (New Nintendo 3DS"))
	{
		echo "<head><meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" /></head>This page is only intended for the system web-browsers for Nintendo 3DS, since you're using a non-3DS browser go here: <a href=\"http://yls8.mtheall.com/3dsbrowserhax.php\">http://yls8.mtheall.com/3dsbrowserhax.php</a>.";
		exit;
	}

	if(strstr($ua, "Mozilla/5.0 (Nintendo 3DS; U; ; "))
	{
		header("Location: sliderhax.php");
		exit;
	}

	if(strstr($ua, "Mozilla/5.0 (New Nintendo 3DS"))
	{
		if(strstr($ua, "1.0.9934") || strstr($ua, "1.1.9996") || strstr($ua, "1.2.10085") || strstr($ua, "1.3.10126"))
		{
			header("Location: browserhax_fright.php");
		}
		else
		{
			header("Location: browserhax_fright_tx3g.php");
		}
		exit;
	}
}

$con = "<head><meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" /><title>Nintendo 3DS web-browser exploits</title></head>\n<body>";

$con.= "The following are system-web-browser exploits for Nintendo 3DS, the ones hosted here are for booting the *hax payloads(<a href=\"https://smealum.github.io/3ds/\">https://smealum.github.io/3ds/</a>). See the linked repos for usage details and supported browser versions, etc, including the common codebase: <a href=\"https://github.com/yellows8/3ds_browserhax_common\">https://github.com/yellows8/3ds_browserhax_common</a>. On a supported browser, you can go <a href=\"3dsbrowserhax_auto.php\">here</a>, which will automatically determine which exploit to return for your browser.<br/>\n  Once you boot into the payload successfully, you can then install exploit(s) from here(this is <b>highly</b> recommended): <a href=\"http://3dbrew.org/wiki/Homebrew_Exploits\">http://3dbrew.org/wiki/Homebrew_Exploits</a>. This highly recommended because of the browser-version-check implemented with v9.9, see <a href=\"http://3dbrew.org/wiki/Internet_Browser\">here</a> for details.<br/>\n<br/>\nThe following QR-code can be scanned by a 3DS for accessing the previously mentioned URL(this is not usable with the New3DS browserhax_fright exploits): <br/>\n<img src=\"3dsbrowserhax_auto_qrcode.png\"><br/>\n<br/>\n";

$con.= "Note that systems where the system was updated with a >=v9.9 gamecard sysupdate have a dummy browser installed, unless an online sysupdate was done afterwards. See <a href=\"http://3dbrew.org/wiki/Internet_Browser\">here</a> for details.<br/><br/>\n";

$con.= "Old3DS: <a href=\"sliderhax.php\">sliderhax</a>, repo at <a href=\"https://github.com/yellows8/3ds_webkithax\">https://github.com/yellows8/3ds_webkithax</a>. This was fixed with system-version v10.2(or more specifically, system-version >=X.X.X-28). This is the one returned by 3dsbrowserhax_auto.php for Old3DS web-browser regardless of system-version.<br/>\n";
$con.= "New3DS: <a href=\"3dswebkithax_removewinframe.php\">3dswebkithax_removewinframe</a>, repo at <a href=\"https://github.com/yellows8/3ds_webkithax\">https://github.com/yellows8/3ds_webkithax</a>. This was fixed for New3DS with system-version v9.9(or more specifically, system-version >=X.X.X-26). This is not used by the auto-select page at all(this exploit is also very unreliable).<br/>\n";
$con.= "New3DS: <a href=\"browserhax_fright.php\">browserhax_fright</a>, repo at <a href=\"https://github.com/yellows8/browserhax_fright\">https://github.com/yellows8/browserhax_fright</a>. This was fixed with system-version v10.2(or more specifically, system-version >=X.X.X-28). This is the one returned by 3dsbrowserhax_auto.php for New3DS web-browser when the browser version is supported by this exploit.<br/>\n";
$con.= "New3DS: <a href=\"browserhax_fright_tx3g.php\">browserhax_fright_tx3g</a>, repo at <a href=\"https://github.com/yellows8/browserhax_fright\">https://github.com/yellows8/browserhax_fright</a>.  This is supported on all system-versions at the time of exploit release(<=10.3.0-28). This is the one returned by 3dsbrowserhax_auto.php for New3DS web-browser when the browser version isn't supported by the above browserhax_fright.php.<br/>\n";

echo $con;

?>
