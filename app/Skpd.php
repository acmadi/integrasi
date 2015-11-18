<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skpd extends Model
{
    

    protected $table = 'skpd';
     // public $incrementing  = false;
     public $timestamps = false;
     // protected $guarded = ['id', 'account_id'];

     /**
      * The attributes that are mass assignable.
      *
      * @var array
      */
    
     protected $fillable =[
     	'nama_skpd',
     	'nama_singkat_skpd'
     	];
     public $kolom=[
    // 'A'=>'tahun',
    // 'B'=>'kd_urusan',
    // 'C'=>'kd_bidang',
    // 'D'=>'kd_program',
    // 'E'=>'kd_kegiatan',
    // 'F'=>'kd_skpd',
    // 'G'=>'realisasi_bulan_1',
    // 'H'=>'realisasi_bulan_2',
    // 'I'=>'realisasi_bulan_3',
    // 'J'=>'realisasi_bulan_4',
    // 'K'=>'realisasi_bulan_5',
    // 'L'=>'realisasi_bulan_6',
    // 'M'=>'realisasi_bulan_7',
    // 'N'=>'realisasi_bulan_8',
    // 'O'=>'realisasi_bulan_9',
    // 'P'=>'realisasi_bulan_10',
    // 'Q'=>'realisasi_bulan_11',
    // 'R'=>'realisasi_bulan_12'
       ];

      // private $rules = array(
     
      //    /*Sebenarnyaaa ==============================================================*/
     	// 'A'=>	'required|numeric|digits:4',
     	// 'B'=>	'required|numeric|digits:4',
     	// 'C'=>	'required|numeric|digits_between:1,5',
     	// 'D'=>	'required|numeric|digits_between:1,5',
     	// 'E'=>	'required|numeric|digits_between:1,5',
     	// 'F'=>	'required|numeric|digits_between:1,5',
     	// 'G'=>'required|numeric|digits_between:1,20',
     	// 'H'=>'required|numeric|digits_between:1,20',
     	// 'I'=>'required|numeric|digits_between:1,20',
     	// 'J'=>'required|numeric|digits_between:1,20',
     	// 'K'=>'required|numeric|digits_between:1,20',
     	// 'L'=>'required|numeric|digits_between:1,20',
     	// 'M'=>'required|numeric|digits_between:1,20',
     	// 'N'=>'required|numeric|digits_between:1,20',
     	// 'O'=>'required|numeric|digits_between:1,20',
     	// 'P'=>'required|numeric|digits_between:1,20',
     	// 'Q'=>'required|numeric|digits_between:1,20',
     	// 'R'=>'required|numeric|digits_between:1,20'

      //    );

     public function validate($data)
     {
         // make a new validator object
         $v = \Validator::make($data, $this->rules);
         // return the result
         return $v;

         // return $v->passes();
     }
}
