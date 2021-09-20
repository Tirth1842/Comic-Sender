<?php
// below function will download the image
	function save_image($inPath,$outPath)
    { //Download images from remote server
        $in=    fopen($inPath, "rb");
        $out=   fopen($outPath, "wb");
        while ($chunk = fread($in,8192))
        {
            fwrite($out, $chunk, 8192);
        }
        fclose($in);
        fclose($out);
    }
      // fetching the image from xkcd 
    $randomNumber = rand(0,2500);
    $url = 'https://xkcd.com/'.$randomNumber.'/info.0.json'; // will generate the images randomly from the website
    $obj = json_decode(file_get_contents($url), true);
    $img_url = $obj['img'];
    save_image($img_url,'image.png'); // passing it to the above function for downloading.

    
?>