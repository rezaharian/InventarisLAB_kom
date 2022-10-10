<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pengajuan extends Model
{
    use HasFactory;
    protected $fillable = [
     'nopengajuan','nama', 'jenis','jumlah','merek','tipe','harga','kondisi','keperluan','status','keterangan','penempatan','hargatotal','pengaju','link','tanggal'
    ];












    
    public function getCreatedAtAttribute()
{
   return \Carbon\Carbon::parse($this->attributes['created_at'])->format('d, M Y H:i');
}
public function getUpdatedAtAttribute()
{
   return \Carbon\Carbon::parse($this->attributes['updated_at'])->format('d, M Y H:i');
}
}
