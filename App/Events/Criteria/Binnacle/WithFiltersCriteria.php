<?php

namespace App\Events\Criteria\Binnacle;

use Melisa\Laravel\Criteria\FilterCriteria;
use Melisa\Laravel\Criteria\ApplySort;

/**
 * 
 *
 * @author Luis Josafat Heredia Contreras
 */
class WithFiltersCriteria extends FilterCriteria
{
    use ApplySort;
    
    public function apply($model, $repository, array $input = [])
    {        
        $builder = parent::apply($model, $repository, $input);        
        $builder = $this->applySort($builder, $input);
        
        return $builder
            ->join('events as e', 'e.id', '=', 'binnacle.idEvent')
            ->join('identities as i', 'i.id', '=', 'binnacle.idIdentityCreated')
            ->join('binnacleStatus as bs', 'bs.id', '=', 'binnacle.idBinnacleStatus')
            ->select([
                'binnacle.*',
                'e.key as event',
                'e.description as eventDescription',
                'i.display as identity',
                'i.displayEspecific as identityName',
                'bs.name as status',
            ])
            ->orderBy('binnacle.createdAt', 'desc');
        
    }
    
}
