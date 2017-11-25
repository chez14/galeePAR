<?php
namespace GaleePAR;

class Start extends System\Jombloton {
    const
        DLOCATION = "dumped/",
        MAX_STOP = 5;

    protected 
        $jurusan = [
            // F. Ekonomi
            11, 12, 13,
            // F. Hukum
            21,
            // F. ISIP
            31, 32, 33,
            // F. Teknik
            41, 42,
            // F. Filsafat
            51,
            // F. TI
            61, 62, 63,
            // F. TIS
            71, 72, 73
        ];

    public function ignite(){
        //Downloader::instance()->sedot("2016730013", "kambing.jpg");
        $this->algorithm();
    }

    protected function build_npm($angkatan, $jurusan, $npm){
        return sprintf("%4d%2d%04d", $angkatan, $jurusan, $npm);
    }

    protected function algorithm($start = 2013, $end = 2017) {
        while($start <= $end) {

            echo "We'll try to fetching the {$start} generations\n";

            foreach($this->jurusan as $jurusan){
                $gagal = 0;
                for($i = 0; $i < 400 && $gagal < self::MAX_STOP; $i++){
                    $npm = $this->build_npm($start, $jurusan, $i);
                    echo "Trying to fetch {$npm}...";
                    try {
                        \GaleePAR\Downloader::instance()->sedot($npm, self::DLOCATION . $npm . ".jpg");
                        echo "done";
                        $gagal = 0;
                    } catch (\Exception $e){
                        echo "FAIL";
                        $gagal++;
                    }
                    if($gagal >= self::MAX_STOP) {
                        $gagal -= self::MAX_STOP;
                        echo " >>>> STOPS AT {$gagal}.";
                    }
                    echo "\n";
                }
            }
            $start++;
        }
    }
}