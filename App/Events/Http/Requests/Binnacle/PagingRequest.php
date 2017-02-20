<?php namespace App\Events\Http\Requests\Binnacle;

use Melisa\Laravel\Http\Requests\WithFilter;

/**
 * 
 *
 * @author Luis Josafat Heredia Contreras
 */
class PagingRequest extends WithFilter
{
    
    protected $rules = [
        'page'=>'bail|required|xss|numeric',
        'start'=>'bail|required|xss|numeric',
        'limit'=>'bail|required|xss|numeric',
        'filter'=>'bail|sometimes|json|filter:idProgramacion,pedimento,referencia,economico,fechaCreacion',
        'sort'=>'bail|sometimes|xss|json|sort:pedimento,referencia,economico,fechaCreacion'
    ];
    
    public $rulesFilters = [
        'idProgramacion'=>'bail|sometimes|alpha_dash|size:36|xss|exists:lamina.Programaciones,id',
        'pedimento'=>'bail|sometimes|max:36|xss',
        'referencia'=>'bail|sometimes|max:36|xss',
        'economico'=>'bail|sometimes|xss|max:10|numeric',
        /* resolve column 'fechaCreacion' in where clause is ambiguous */
//        'fechaCreacion'=>'bail|sometimes|xss|date_format:d/m/Y',
    ];
    
}
