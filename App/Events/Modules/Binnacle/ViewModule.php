<?php namespace App\Events\Modules\Binnacle;

use App\Core\Logics\Modules\Outbuildings;

/**
 * 
 *
 * @author Luis Josafat Heredia Contreras
 */
class ViewModule extends Outbuildings
{
    
    public function dataDictionary() {
        
        return [
            'success'=>true,
            'assets'=>[
                $this->asset('app.lamina.phone.tarjas.add')
            ],
            'data'=>[
                'wrapper'=>[
                    'title'=>'Bitacora de eventos'
                ],
                'urls'=>[],
                'faker'=>[
                    'events'=>$this->fakerEvents(),
                    'listeners'=>$this->fakerListeners()
                ]
            ]
        ];
        
    }
    
    public function fakerEvents() {
        
        return [
            'type'=>'array',
            'minItems'=>30,
            'items'=>[
                'type'=>'object',
                'properties'=>[
                    'event'=>[
                        'type'=>'string',
                        'faker'=>'lorem.word',
                    ],
                    'eventDescription'=>[
                        'type'=>'string',
                        'faker'=>'lorem.words',
                    ],
                    'processed'=>[
                        'type'=>'integer',
                        'faker'=>[
                            'random.arrayElement'=>'[0,1]'
                        ]
                    ],
                    'status'=>[
                        'type'=>'string',
                        'faker'=>[
                            'random.arrayElement'=>[
                                [
                                    'NUEVO',
                                    'PROCESANDO',
                                    'PROCESADO',
                                    'PROCESADO CON ERRORES',
                                ]
                            ]
                        ]
                    ],
                    'createdAt'=>[
                        'type'=>'string',
                        'faker'=>'date.recent'
                    ],
                    'processedAt'=>[
                        'type'=>'string',
                        'faker'=>'date.recent'
                    ]
                ],
                'required'=>[
                    'event',
                    'eventDescription',
                    'processed',
                    'status',
                    'createdAt',
                ]
            ]
        ];
        
    }
    
    public function fakerListeners() {
        
        return [
            'type'=>'array',
            'minItems'=>30,
            'items'=>[
                'type'=>'object',
                'properties'=>[
                    'module'=>[
                        'type'=>'string',
                        'faker'=>'lorem.word',
                    ],
                    'status'=>[
                        'type'=>'string',
                        'faker'=>[
                            'random.arrayElement'=>[
                                [
                                    'NUEVO',
                                    'PROCESANDO',
                                    'PROCESADO',
                                    'PROCESADO CON ERRORES',
                                ]
                            ]
                        ]
                    ],
                    'createdAt'=>[
                        'type'=>'string',
                        'faker'=>'date.past'
                    ],
                    'updateAt'=>[
                        'type'=>'string',
                        'faker'=>'date.recent'
                    ],
                ],
                'required'=>[
                    'module',
                    'status',
                    'createdAt',
                ]
            ]
        ];
        
    }
    
}
