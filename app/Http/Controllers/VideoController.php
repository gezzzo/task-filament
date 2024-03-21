<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use YouTube\YouTubeDownloader;
use Youtube\YouTubeException;

class VideoController extends Controller
{
    //

    public function index(){
        $youtube = new YouTubeDownloader();
        $download = $youtube->getDownloadLinks('https://www.youtube.com/watch?v=oDAw7vW7H0c');
        if ($download->getAllFormats()) {
            return redirect($download->getFirstCombinedFormat()->url);
        }

    }
    
}
