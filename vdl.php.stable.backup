<?php require __DIR__.'/vendor/autoload.php'; $yt = new \YoutubeDl\YoutubeDl(); 
$yt->setBinPath('/usr/local/bin/yt-dlp'); $yt->debug(function ($type, $buffer) {
    if (\Symfony\Component\Process\Process::ERR === $type) { echo $buffer;
    } else {
        echo $buffer;
    }
});
$options = \YoutubeDl\Options::create() 
    ->downloadPath(__DIR__.'/dls')
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

header("Location: dls/".urlencode($video->getEpoch()).".".urlencode($video->getExt()));

// header('Location: https://delphium.jesus.fish/dls/' . http_build_query($video->getEpoch() . '.webm');
