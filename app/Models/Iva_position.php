<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Iva_position extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'description',
        'code_arca',
        'allowed_voucher_types',
    ];

    public function tenants(): HasMany
    {
        return $this->hasMany(Tenant::class);
    }
}
