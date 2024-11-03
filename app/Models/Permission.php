<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;

    public function etablissementRoles()
    {
        return $this->belongsToMany(EtablissementRole::class, 'permission_etablissement_role');
    }
}
