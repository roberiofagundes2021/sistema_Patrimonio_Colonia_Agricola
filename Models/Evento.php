<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;
    protected $table = "eventos";
    protected $fillable = [
    'data_reserva','fim_reserva ','usuario_id','sala_id','patrimonio_id','eventos_id'];

}


