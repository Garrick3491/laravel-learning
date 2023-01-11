<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $fillable = [
        'name',
        'address',
        'longitude',
        'latitude',
        'device_type',
        'manufacturer',
        'model',
        'install_date',
        'notes',
        'eui',
        'serial_number',
        'file_id'
    ];

    public function user()
    {
        return $this->belongsTo(File::class);
    }
}
