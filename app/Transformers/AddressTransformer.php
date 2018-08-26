<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Address;

/**
 * Class AddressTransformer.
 *
 * @package namespace App\Transformers;
 */
class AddressTransformer extends TransformerAbstract
{
    /**
     * Transform the Address entity.
     *
     * @param \App\Entities\Address $model
     *
     * @return array
     */
    public function transform(Address $model)
    {
        return [
            'id'               => (int) $model->id,
            'zip_code'         => $model->zip_code,
            'country'          => $model->country,
            'state'            => $model->state,
            'city'             => $model->city,
            'district'         => $model->district,
            'street'           => $model->street,
            'complement'       => $model->complement,
            'number'           => $model->number,
            'addressable_id'   => $model->addressable_id,
            'addressable_type' => $model->addressable_type,
            'created_at'       => $model->created_at->toDateTimeString(),
            'updated_at'       => $model->updated_at->toDateTimeString()
        ];
    }
}
