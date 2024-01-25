<?php

namespace App\Livewire;

use Livewire\Component;
use TikTok\VideoDownloader;
use YouTube\YouTubeDownloader;
use TikTok\Driver\SnaptikDriver;
use TikTok\Driver\FacebookDriver;
use YouTube\Exception\YouTubeException;

class DownloadVideo extends Component
{

    public $url;
    public $download;

    public $runVideo = false;


    public function downloadVideo()
    {
        if ($this->isYoutube()) {

            $this->downloadYoutube();
        } elseif ($this->isTikTok()) {

            $this->downloadTikTok();
        } elseif ($this->isInstagram()) {
            $this->downloadInstagram();
        } elseif ($this->isFacebook()) {
            $this->downloadFacebook();
        }
    }


    public function downloadTikTok()
    {
        $tiktok = new VideoDownloader(new FacebookDriver());

        $download = $tiktok->get($this->url);

        dd($download);

        return response()->streamDownload(function () use ($download) {
            echo file_get_contents($download);
        }, 'video.mp4');
    }

    public function downloadYoutube()
    {
        $youtube = new YouTubeDownloader();

        // try {
            $downloadOptions = $youtube->getDownloadLinks($this->url);

            if ($downloadOptions->getAllFormats()) {
                echo $downloadOptions->getFirstCombinedFormat()->url;
            } else {
                echo 'No links found';
            }

        // } catch (YouTubeException $e) {
        //     echo 'Something went wrong: ' . $e->getMessage();
        // }
    }

    public function isYoutube()
    {
        return strpos($this->url, 'youtube.com') !== false;
    }

    public function isTikTok()
    {
        $dd = strpos($this->url, 'tiktok.com') !== false;

        return $dd;
    }

    public function isInstagram()
    {
        return strpos($this->url, 'instagram.com') !== false;
    }

    public function isFacebook()
    {
        return strpos($this->url, 'facebook.com') !== false;
    }


    public function render()
    {
        return view('livewire.download-video');
    }
}
