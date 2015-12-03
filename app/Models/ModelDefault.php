<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelDefault extends Model
{

    public function scopeAtivo($query)
    {
        return $query->where('ativo', 1);
    }


    public function scopeOrderAsc($query)
    {
        return $query->orderBy('ordem', 'asc');
    }


    public function scopeOrderDesc($query)
    {
        return $query->orderBy('ordem', 'desc');
    }

}
