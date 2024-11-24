<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterBarang extends Model
{
    use HasFactory;

    // The table associated with the model (optional if the table name matches the plural form of the model name)
    protected $table = 'master_barang';

    // The attributes that are mass assignable
    protected $fillable = [
        'nama_barang',
        'kategori',
        'stok_awal',
        'satuan',
    ];

    // The attributes excluded from the model's JSON form (optional)
    protected $hidden = [];

    // Additional configurations (optional)
    public $timestamps = false; // If your table doesn't use `created_at` and `updated_at` timestamps
}
