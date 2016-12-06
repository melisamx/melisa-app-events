<?php namespace App\Events\Http\Requests;

use Melisa\Laravel\Http\Requests\Generic;

/**
 * 
 *
 * @author Luis Josafat Heredia Contreras
 */
class BinnacleProcessRequest extends Generic
{
    protected $rules = [
        'idBinnacle'=>'required|max:36',
    ];
    
    public function rules()
    {
        
        return $this->rules;
        
    }
    
}
