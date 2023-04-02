<?php require __DIR__.'/vendor/autoload.php';
$yt = new \YoutubeDl\YoutubeDl();
$yt->setBinPath('/usr/local/bin/yt-dlp');
$yt->debug(function ($type, $buffer) {
    if (\Symfony\Component\Process\Process::ERR === $type) {
        echo $buffer;
    }
    else {
        echo ".";
    }
});
$options = \YoutubeDl\Options::create()
    ->downloadPath(__DIR__.'/dls')
//    ->extractAudio($_POST[format])
//    ->format('0')
//    ->recodeVideo('mp4')
    ->output('%(epoch)s.%(ext)s')
    ->url($_POST["url"]);
$collection = $yt->download($options); echo "Download completed\n";

foreach ($collection->getVideos() as $video) {
    if ($video->getError() !== null) {
        echo "Error downloading video: {$video->getError()}.";
    } else {
        echo $video->getEpoch();
    }
}
echo("<a href='https://delphium.jesus.fish/dls/".urlencode($video->getEpoch()).".".urlencode($video->getExt())."'>Didn't redirect? click here to download your file.</a>");
// echo($_POST[format])
header("Location: dls/".urlencode($video->getEpoch()).".".urlencode($video->getExt()));
die();










