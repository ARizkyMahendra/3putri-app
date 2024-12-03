<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class logTransaksi extends Model
{
    use HasFactory;
    protected $table = 'log_transaksis';
    public $timestamps = true;
    protected $fillable = [
        'customer_id',
        'transaksi_id',
        'tanggal',
        'paket',
        'loc_catering',
        'note',
        'price',
        'payment_status',
    ];
    
    public function customer(): BelongsTo
    {
        return $this->belongsTo(logcustomer::class);
    }
}
