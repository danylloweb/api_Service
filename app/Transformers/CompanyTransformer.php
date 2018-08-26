<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Company;

/**
 * Class CompanyTransformer.
 *
 * @package namespace App\Transformers;
 */
class CompanyTransformer extends TransformerAbstract
{
    /**
     * Transform the Company entity.
     *
     * @param \App\Entities\Company $model
     *
     * @return array
     */
    public function transform(Company $model)
    {
        return [
            'id'          => (int) $model->id,
            'cnpj'        => $model->cnpj,
            'fantasia'    => $model->fantasia,
            'status'      => $model->status,
            'observation' => $model->observation,
            'address'     => $model->address ? $model->address[0] : null,
            'created_at'  => $model->created_a->toDateTimeString(),
            'updated_at'  => $model->updated_at->toDateTimeString()
        ];
    }
}
