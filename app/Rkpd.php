<?php namespace App;

// use Illuminate\Database\Eloquent\Model;
use App\Mymodel;

class Rkpd extends Mymodel{

// class Rkpd extends Model {

	protected $table = 'rkpd';
	 // public $incrementing  = false;
	 public $timestamps = false;
	 // protected $guarded = ['id', 'account_id'];

	 /**
	  * The attributes that are mass assignable.
	  *
	  * @var array
	  */
	
	 protected $fillable =[
	 'id',
	 'kd_urusan',
	 'kd_bidang',
	 'kd_program',
	 'kd_kegiatan',
	 'kd_skpd',
	 'indikator_capaian',
	 'target_capaian',
	 'satuan_capaian',
	 'indikator_hasil',
	 'target_hasil',
	 'satuan_hasil',
	 'indikator_keluaran',
	 'target_keluaran',
	 'satuan_keluaran',
	 'pagu_anggaran',
	 'lokasi',
	 'kelompok_sasaran',
	 'tahun',
	     'files_id',
	 	'exports_id',
	 'fileentries_id',
	 'created_at',
	 'updated_at',
	 'filename',
	 	];
	 public $kolom=[
	 'A'=>'id',
	 'B'=>'kd_urusan',
	 'C'=>'kd_bidang',
	 'D'=>'kd_program',
	 'E'=>'kd_kegiatan',
	 'F'=>'kd_skpd',
	 'G'=>'indikator_capaian',
	 'H'=>'target_capaian',
	 'I'=>'satuan_capaian',
	 'J'=>'indikator_hasil',
	 'K'=>'target_hasil',
	 'L'=>'satuan_hasil',
	 'M'=>'indikator_keluaran',
	 'N'=>'target_keluaran',
	 'O'=>'satuan_keluaran',
	 'P'=>'pagu_anggaran',
	 'Q'=>'lokasi',
	 'R'=>'kelompok_sasaran',
	 'S'=>'tahun'
	 ];
	 
	 // public function validate($data)
	 // {
	 //     $v = \Validator::make($data, $this->rules);
	 //     return $v;
	 // }

  //    public function file($data)
  //    {
 	// 	return $this->belongsTo('App\File', 'files_id');
  //    }
 }
