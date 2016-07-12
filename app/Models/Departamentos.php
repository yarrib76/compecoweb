<?php namespace AlquilerAdmin\Models;

use Illuminate\Database\Eloquent\Model;

class Departamentos extends Model {
    protected $table = 'departamentos';
    protected $fillable = ['direccion','estado_id'];

    public function estado(){
        return $this->belongsTo('AlquilerAdmin\Models\EstadosDeptos', 'estado_id');
    }

    public function cambioEstadoDepto($id,$estado){
        $departamento = $this->find($id);
        $estado_id = $this->consultaEstadoId($estado);
        $departamento->update(['estado_id' => $estado_id]);
    }

    public function consultaEstadoId($estado){
        $estado_id = EstadosDeptos::where('tipo', $estado)->get()[0]->id;
        return $estado_id;
    }
}
