<?php

namespace App\Models;

class Mahasiswa 
{
    private static $mahasiswas = [

        [
            "nama" => "Abdul Grass",
            "nim" => "28277382",
            "kelas" => "TB 2/3",
            "status" => "Online",
            "jurusan" => "Teknik Biokimia",
            "img" => "patoriku.jpg"
        ],
        [
            "nama" => "Lesti Delta",
            "nim" => "28399483",
            "kelas" => "TB 1/3",
            "status" => "Online",
            "jurusan" => "Teknik Biokimia",
            "img" => "lesti.png"
        ],
        [
            "nama" => "Camron Azle",
            "nim" => "23488294",
            "kelas" => "TI 5/3",
            "status" => "Offline",
            "jurusan" => "Teknik Informatika",
            "img" => "bambang.png"
        ]

    ];

    public static function all(){
        return collect(self::$mahasiswas);
    }

    public static function find($nim){
        $dataMhs = static::all();
        
        return $dataMhs->firstWhere('nim', $nim);
    }


}
