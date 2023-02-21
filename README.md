# delphium
a simple, lightweight web client for yt-dlp that can be easily selfhosted.
- sample instance: https://delphium.jesus.fish

## features
- entirely php-based, no javascript necessary 
- private: no ads, no popups, just download in one click. 
- lightweight: can be ran on pretty much any device

## installation 

### requirements
ensure you have a version of php (tested on 7.4 and higher), yt-dlp installed globally and in your bin, 

### initial setup
- cd to your /var/www/ or whatever your web directory is and clone the repository. 

### composer
- install composer in your current directory by doing the following:
- php composer-setup.php --install-dir=bin --filename=composer

- install norkunas' php wrapper for yt-dlp 
- if you did not install composer globally, run the following: 
- php composer.phar require norkunas/youtube-dl-php:dev-master
- otherwise, run:
- composer require norkunas/youtube-dl-php:dev-master


### final steps
- create a directory called "dls" and change ownership of the "dls" directory to your web server's user
- assuming you're a nginx user like me, the user will be www-data.
- delphium should now be running!

### optional steps
- delphium saves downloaded videos to the server in order for the user to be able to download it. to save storage, you'll want to setup a crontab operation to auto-delete files older than an X amount of time.
- on my server, i use the following:
- 0 0 * * * /usr/bin/find /var/www/delphium/dls -name "*" -type f -mtime +1 -exec rm -f {} \;
- the former deletes files older than a day at 12AM each day.
