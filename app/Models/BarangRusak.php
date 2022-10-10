<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangRusak extends Model
{
    use HasFactory;
    protected $fillable = [
        'jumlah', 'barang_id', 'keterangan', 'tanggal'
    ];

    public function barang()
    {
    	return $this->belongsTo(Barang::class);
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
