<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class citaModelo extends Model
{
    use HasFactory;
    protected $table='cliente';
    public $timestamps=false;
    protected $primaryKey = 'idCliente';
    public $incrementing = true;
    protected $keyType = 'int';
    protected $fillable = [
        'correoCliente',
        'contrasenaCliente',
        'nombreCliente',
        'apellidoCliente',
        'telefonoCliente'
    ];
}
