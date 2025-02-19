<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Tenant extends Model
{
    //
    use HasFactory;
    protected $guarded = [];

    public function members()
    {
        return $this->belongsToMany(User::class, 'tenant_user', 'tenant_id', 'user_id');
    }

    public function clients()
    {
        return $this->hasMany(Client::class);
    }
}
