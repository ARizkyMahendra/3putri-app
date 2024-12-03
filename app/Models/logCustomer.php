<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class logcustomer extends Model
{
    use HasFactory;
    protected $table = 'log_customers';
    public $timestamps = true;
    protected $fillable = [
        'nama',
        'alamat',
        'phone',
        'email',
        'note',
        'status',
    ];

    public function transaksi(): HasMany
    {
        return $this->hasMany(logTransaksi::class);
    }
}
