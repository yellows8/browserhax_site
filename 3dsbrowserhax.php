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
		header("Location: browserhax_fright.php");
		exit;
	}
}

$con = "<head><meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" /><title>Nintendo 3DS web-browser exploits</title></head>\n<body>";

$con.= "The following are system-web-browser exploits for Nintendo 3DS, the ones hosted here are for booting hblauncher(<a href=\"https://smealum.github.io/3ds/\">https://smealum.github.io/3ds/</a>). See the linked repos for usage details and supported browser versions, etc, including the common codebase: <a href=\"https://github.com/yellows8/3ds_browserhax_common\">https://github.com/yellows8/3ds_browserhax_common</a>. On a supported browser, you can go <a href=\"3dsbrowserhax_auto.php\">here</a>, which will automatically determine which exploit to return for your browser. Once you boot into the payload successfully, you can then install exploit(s) from here if you want: <a href=\"http://3dbrew.org/wiki/Homebrew_Exploits\">http://3dbrew.org/wiki/Homebrew_Exploits</a><br/>\n<br/>\nThe following QR-code can be scanned by a 3DS for accessing the previously mentioned URL(do not use this on New3DS without reading the info from the browserhax_fright repo first): <br/>\n<img src=\"3dsbrowserhax_auto_qrcode.png\"><br/>\n<br/>\n";

$con.= "Old3DS: <a href=\"sliderhax.php\">sliderhax</a>, repo at <a href=\"https://github.com/yellows8/3ds_webkithax\">https://github.com/yellows8/3ds_webkithax</a>.<br/>\n";
$con.= "New3DS: <a href=\"3dswebkithax_removewinframe.php\">3dswebkithax_removewinframe</a>, repo at <a href=\"https://github.com/yellows8/3ds_webkithax\">https://github.com/yellows8/3ds_webkithax</a>. This was fixed for New3DS with system-version v9.9. This is not used by the auto-select page at all(this exploit is also very unreliable).<br/>\n";
$con.= "New3DS: <a href=\"browserhax_fright.php\">browserhax_fright</a>, repo at <a href=\"https://github.com/yellows8/browserhax_fright\">https://github.com/yellows8/browserhax_fright</a>.<br/>\n";

echo $con;

?>
