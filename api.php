<head>
<script type="text/javascript">
function jFocus(elm) {
if(typeof(elm) == 'string') elm = getElementById(elm);
if (elm) {     
elm.focus();
elm.select();
}
}
</script>
<style>
.span_normal {
color: #1f3806;
font-weight: bold;
}
.send_button {
color: #FFFFFF;
border: 3px double #6F942B;
padding-left: 4px;
padding-right: 4px;
padding-top: 1px;
padding-bottom: 1px;
background-color: #1F3806;
width: 290px;
height: 30px;
font-weight: bold;
cursor: pointer;
}
input {
border: 1px solid #6F942B;
}
.img_thumb {
display: inline-block;
border: 1px solid #FFFFFF;
-webkit-box-shadow: 0 0 10px #969696;
-moz-box-shadow: 0 0 10px #969696;
box-shadow: 0 0 10px #969696;
cursor: pointer;
}
</style>
</head>

<?php

if(isset($_GET["image"])){
	$image = json_decode(rawurldecode($_GET["image"]), true);

	$image["html"] = str_replace("+", "&nbsp;", htmlentities($image["html"]));
	echo "
	<br><br>
	<center><a href=\"{$image["direct"]}\" target=\"_blank\"><img class=\"img_thumb\" src=\"{$image["thumb"]}\" alt=\"\" /></a></center>
	<br><br>
	<table width=\"300\">
		<tr><td align=\"center\"><span class=\"span_normal\">DIRECT:</span><br><input onclick=\"jFocus(this)\" type=\"text\" name=\"codes4\" value=\"{$image["direct"]}\" /></b></td></tr>
		<tr><td>&nbsp;</td></tr>
		<tr><td align=\"center\"><span class=\"span_normal\">HTML:</span><br><input onclick=\"jFocus(this)\" type=\"text\" name=\"codes1\" value=\"{$image["html"]}\" /></b></td></tr>
	</table>
	";
} else {
	if(isset($_GET["error"])){

		$errorcodes = array(
			1000 => "No image selected",
			1001 => "Image failed to upload",
			1002 => "Invalid image type",
			1003 => "Image is larger than 16MB",
			1004 => "Cannot read image info",
			1005 => "Upload failed during process",
			1006 => "Database error",
			1007 => "Banned IP"
		);
		echo '<center><i><span style="color: #1f3806; text-size: 12px;">ERROR: '.$errorcodes[$_GET["error"]].'</span></i></center>';
	}
	
	echo "
	<form action=\"http://piczasso.com/api_handler.php\" method=\"post\" enctype=\"multipart/form-data\">
	<input type=\"hidden\" name=\"MAX_FILE_SIZE\" value=\"99999999\" />
	<table>
		<tr><td colspan=\"2\">&nbsp;</td></tr>
		<tr><td><span class=\"span_normal\">Image:</span></td><td><input style=\"border: 0px\" type=\"file\" name=\"file\" /></td></tr>
		<tr><td><span class=\"span_normal\">Tags:</span></td><td><input type=\"text\" name=\"tags\" /></td></tr>
		<tr><td><span class=\"span_normal\">Resize:</span></td><td>
		<select name=\"size\">
			<option class=\"span_normal\" value=\"1\" selected=\"selected\" >None</option>
			<option class=\"span_normal\" value=\"2\" >100x75 Avatar</option>
			<option class=\"span_normal\" value=\"3\" >150x112 Thumbnail</option>
			<option class=\"span_normal\" value=\"4\" >320x240 Websites</option>
			<option class=\"span_normal\" value=\"5\" >640x480 For forums</option>
			<option class=\"span_normal\" value=\"6\" >800x600 15-inch monitor</option>
			<option class=\"span_normal\" value=\"7\" >1024x768 17-inch monitor</option>
		</select></td></tr>
		<tr><td colspan=\"2\">&nbsp;</td></tr>
		<tr><td colspan=\"2\"><input class=\"send_button\" type=\"submit\" value=\"Upload\" /></td></tr>
	</table>
	</form>
	";
}
?>