<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Action extends Model
{
    use HasFactory;

    protected $table = 'actions';

    public function a()
    {
        return $this->hasMany(RolePermissao::class, 'action_id', 'id');
    }

    public function existePermissaoAction($permissao_id, $action_id)
    {
        return (bool) RolePermissao::where('permissao_id', $permissao_id)
            ->where('action_id', $action_id)
            ->count();
    }
}
