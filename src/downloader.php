<?php
namespace GaleePAR;

class Downloader extends System\Jombloton{
    private
        $client;
    
    const
        URL_GALLERY_FOLDER   = "https://studentportal.unpar.ac.id/global_foto/",
        HEADER_UAGENT_CHROME = "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/62.0.3202.94 Safari/537.36 Ganteng/1.0",
        HEADER_X_MESSAGE     = "Permisi mas, numpang lewat ya...";

    public function __construct(){
        $this->client = new \GuzzleHttp\Client([
            "base_uri"=>self::URL_GALLERY_FOLDER,
            "headers" => [
                "User-Agent"=>self::HEADER_UAGENT_CHROME,
                "X-Message" =>self::HEADER_X_MESSAGE
            ]
        ]);
    }

    public function sedot($npm, $file){
        $url = $this->build_url($npm);
        $response = $this->client->get($this->build_url($npm));
        
        file_put_contents($file, $response->getBody());
        return true;
    }

    protected function build_url($npm){
        $match = [];
        preg_match("/([0-9]{4})([0-9]{2})([0-9]{4})/", $npm, $match);
        //var_dump($match);
        $angkatan = $match[1];
        $jurusan = $match[2];
        $np = $match[3];
        return "{$jurusan}0/{$angkatan}/{$npm}.jpg";
    }
}