<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Company.
 *
 * @package namespace App\Entities;
 */
class Company extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'razao',
        'cnpj',
        'fantasia',
        'status',
        'observation'
    ];

    /**
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    const STATUS_INATIVO = 0;
    const STATUS_ATIVO   = 1;
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function address()
    {
        return $this->morphMany(Address::class, 'addressable');
    }
}
