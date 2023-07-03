<?php require __DIR__.'/vendor/autoload.php';
$yt = new \YoutubeDl\YoutubeDl();
$yt->setBinPath('/usr/local/bin/yt-dlp');
$yt->debug(function ($type, $buffer) {
    if (\Symfony\Component\Process\Process::ERR === $type) {
        echo "";
    }
    else {
        echo "";
    }
});
if ($_POST['quality'] == 'max') {
    $options = \YoutubeDl\Options::create()
        ->downloadPath(__DIR__.'/dls')
        ->output('%(epoch)s.%(ext)s')
        ->url($_POST["url"]);
//        ->format('bestvideo*+bestaudio/best');
} else if ($_POST['quality'] == '1080') {
    $options = \YoutubeDl\Options::create()
        ->downloadPath(__DIR__.'/dls')
        ->output('%(epoch)s.%(ext)s')
        ->url($_POST["url"])
        ->format('bestvideo[height<=1080]*+bestaudio/best[height<=1080]');
} else if ($_POST['quality'] == '720') {
    $options = \YoutubeDl\Options::create()
        ->downloadPath(__DIR__.'/dls')
        ->output('%(epoch)s.%(ext)s')
        ->url($_POST["url"])
        ->format('bestvideo[height<=720]*+bestaudio/best[height<=720]');
} else if ($_POST['quality'] == '480') {
    $options = \YoutubeDl\Options::create()
        ->downloadPath(__DIR__.'/dls')
        ->output('%(epoch)s.%(ext)s')
        ->url($_POST["url"])
        ->format('bestvideo[height<=480]*+bestaudio/best[height<=480]');
}

$collection = $yt->download($options); echo "<h2>download completed</h2>\n";

foreach ($collection->getVideos() as $video) {
    if ($video->getError() !== null) {
        echo "Error downloading video: {$video->getError()}.";
    } else {
	echo("<a href='https://delphium.jesus.fish/dls/".urlencode($video->getEpoch()).".".urlencode($video->getExt())."'>click here to download.</a>");
    }
}
// echo($_POST[format])
// header("Location: dls/".urlencode($video->getEpoch()).".".urlencode($video->getExt()));
die();











