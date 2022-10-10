<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    protected $fillable = [
        'kode', 'nama', 'jumlah','kondisi','ruang','image','sumber','tanggal','penerima','jenis','keterangan','status'
    ];

    


    public function barang_masuks()
    {
    	return $this->hasMany(BarangMasuk::class);
    }
    public function barang_rusaks()
    {
    	return $this->hasMany(BarangRusak::class);
    }
    public function barang_keluars()
    {
    	return $this->hasMany(BarangKeluar::class);
    }
    
    public function getCreatedAtAttribute()
{
   return \Carbon\Carbon::parse($this->attributes['created_at'])->format('d, M Y H:i');
}
public function getUpdatedAtAttribute()
{
   return \Carbon\Carbon::parse($this->attributes['updated_at'])->format('d, M Y H:i');
}

   
 
    // public function laporan()
    // {
    // 	return $this->hasMany(Laporan::class);
    // }

}
