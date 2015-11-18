<?php namespace App\Traits;

use App\Bidang;
use App\Dpa;
use App\Kegiatan;
use App\OrganisasiSkpd;
use App\Program;
use App\Realisasi;
use App\Rkpd;
use App\User;
use App\Urusan;

trait DbTrait {

    private function mod($db)
    {
        switch($db) {
           case "bidang":
                $model= new Bidang();
                break;
           case "dpa":
                $model= new Dpa();
                break;
           case "kegiatan":
                $model= new Kegiatan();
                break;
           case "organisasi_skpd":
                $model= new OrganisasiSkpd();
                break;
            case "program":
                $model= new Program();
                break;
            case "realisasi":
                $model= new Realisasi();
                break;
            case "rkpd":
                $model= new Rkpd();
                break;
            case "urusan":
                $model= new Urusan();
                break;
            }
            return $model;
    }
    
}