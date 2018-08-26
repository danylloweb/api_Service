<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Address.
 *
 * @package namespace App\Entities;
 */
class Address extends Model implements Transformable
{
    use TransformableTrait;

      /**
     * @var array
     */
    protected $fillable = [
        'zip_code',
        'country',
        'state',
        'city',
        'district',
        'street',
        'addressable_id',
        'addressable_type',
        'complement',
        'number'
    ];
    /**
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    const ADDRESS_TYPE_USER   = 'user';
    const ADDRESS_TYPE_AGENCY = 'company';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function addressable()
    {
        return $this->morphTo();
    }


}
