<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangOut extends Model
{
    use HasFactory;
    protected $fillable = [
        'jumlah', 'barang_rusak_id','keterangan','tanggal'
    ];

    public function barang_rusak()
    {
    	return $this->belongsTo(BarangRusak::class);
    }






    
    public function getCreatedAtAttribute()
{
   return \Carbon\Carbon::parse($this->attributes['created_at'])->format('d, M Y H:i');
}
public function getUpdatedAtAttribute()
{
   return \Carbon\Carbon::parse($this->attributes['updated_at'])->format('d, M Y H:i');
}
}