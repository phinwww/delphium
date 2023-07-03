<html>
 <head>
  <link rel="stylesheet" href="sitefiles/css.css">
  <title>delphium downloader</title>
 </head>

 <body>
 <h1>delphium downloader</h1>
<form action="vdl.php" method="post">
video url: <input type="text" name="url"><br>
<input type="radio" id="quality" name="quality" value="max" checked="checked">
    <label for="max">Max Quality</label>
<input type="radio" id="quality" name="quality" value="1080">
    <label for="1080">1080p</label>
<input type="radio" id="quality" name="quality" value="720">
    <label for="720">720p</label>
<input type="radio" id="quality" name="quality" value="480">
    <label for="480">480p</label><br>

<input type="submit">
</form>
</body>
</html>
