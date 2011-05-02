<?php

// variable to hold html
$html = "";

// the server path to the bucket directory
$base_dir = "your-server-path-to-your-bucket-directory";

// the url where you'll find bucket list 
$web_dir = "your-bucket-list-url";

// the directory of your images. I'll start you off with a favorite.
$file_dir = "files/";

// loop through all files in the file directory and add to html
if ($handle = opendir($base_dir . $file_dir)) {
    while (false !== ($file = readdir($handle))) {
    	if($file != 'index.php' & $file !=  '.' & $file != '..'){
        	$html .= "<a href=\"".$web_dir.$file_dir.$file."\"><img src=\"".$file_dir.$file."\" alt=\"".$web_dir.$file_dir.$file."\" /></a>\n";
        }
    }
    closedir($handle);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<title></title>
<style>
body { background: #DDD url(texture.png) fixed; padding: 30px 100px; font: 12px lucida grande, helvetica, arial; }
a { height: 150px; width: 150px; float: left; margin: 10px; display: block; text-align: center; outline: none; }
img { max-height: 150px; max-width: 150px; border: 2px solid #FFF; background: #999; }
</style>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script type="text/javascript" src="jquery.lazyload.js"></script>
<script type="text/javascript">
	$(function() { 
		$("img").lazyload({
			placeholder:"texture.png",
			effect : "fadeIn"
		});
	});	
</script>
</head>

<body>

<div id="thumbs">
<?php echo $html ?>
</div>


</body>
</html>