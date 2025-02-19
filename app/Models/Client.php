<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Client extends Model
{
    //
    use HasFactory;
    protected $fillable = ['business_name', 'cuit', 'tenant_id'];

    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }
}
