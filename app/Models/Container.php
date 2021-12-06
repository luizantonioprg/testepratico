<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Container extends Model
{
    use HasFactory;
    public function categoria(){
        return $this->belongsTo('App\Models\Categoria','id_categoria');
    }
    protected $fillable = [
        'cliente', 'numero', 'tipo','status','id_categoria'
    ];
}
