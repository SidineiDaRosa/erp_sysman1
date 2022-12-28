<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PecasEquipamentos extends Model
{
    use HasFactory;
    protected $table = 'pecas_equipamentos';
    protected $fillable = [
        'produto_id',
        'equipamento',
        'quantidade',
        'data_substituicao',
        'hora_substituicao',
        'intervalo_manutencao',
        'status',
        'link_peca',
       
    ];
    public function produto(){
        return $this->belongsTo('App\Models\PecasEquipamento');
    }
    public function equipamento(){
        return $this->belongsTo('App\Models\PecasEquipamento');
    }
}
