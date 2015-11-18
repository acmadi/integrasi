<?php namespace App;

// use Illuminate\Database\Eloquent\Model;
use App\Mymodel;

// class Bidang extends Model {

class Dpa extends Mymodel {

	protected $table = 'dpa';
	 // public $incrementing  = false;
	 public $timestamps = false;
	 // protected $guarded = ['id', 'account_id'];

	 /**
	  * The attributes that are mass assignable.
	  *
	  * @var array
	  */
	
	 protected $fillable =[
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
	'rencana_pengambilan_TB_1',
	'rencana_pengambilan_TB_2',
	'rencana_pengambilan_TB_3',
	'rencana_pengambilan_TB_4',
	'tahun',
		 'files_id',
		 'exports_id',
	'fileentries_id',
	'created_at',
	'updated_at',
	'filename'
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
	 'S'=>'rencana_pengambilan_TB_1',
	 'T'=>'rencana_pengambilan_TB_2',
	 'U'=>'rencana_pengambilan_TB_3',
	 'V'=>'rencana_pengambilan_TB_4',
	 'W'=>'tahun'
	 ];
    protected $rules = array(

    /*Sebenarnyaaa ==============================================================*/
	'A'=>	'required|numeric|digits:4',
	'B'=>	'required|numeric|digits:4',
	'C'=>	'required|numeric|digits_between:1,5',
	'D'=>	'required|numeric|digits_between:1,5',
	'E'=>	'required|numeric|digits:4',
	'F'=>	'required|max:255'
    );

  //   public function validate($data)
  //   {
  //       // make a new validator object
  //       $v = \Validator::make($data, $this->rules);
  //       // return the result
  //       return $v;
  //       // return $v->passes();
  //   }

  //   public function file($data)
  //   {
		// return $this->belongsTo('App\File', 'files_id');
  //   }



}
