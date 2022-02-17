# yt-2005-watch  
A YouTube frontend written with the YouTubeI api, otherwise more commonly known as the InnerTube API.  

## Requirements
- Webserver (preferably, Apache)
- PHP ≥ 7.0
- cURL extension for PHP

## Setup  
1. Go to your webserver's documentroot, then do `git clone https://github.com/pixdoet/yt-2005-watch.git` on the directory.  
2. You're done! If you wanna configure stuff, edit `includes/config.inc.php`, where the values are clearly marked in the comments.  

## Directory sturcture
- `/api/`: Contains the API based off the code of the frontend (currently not used by the frontend itself) 
- `/includes/`: Contains include files for the PHP code
    - `/includes/html/`: Contains HTML files used for includes (no results, header etc)
- `/yts/`: Contains static files (YouTube Static)


## License  
Apache 2.0
