<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Contact;

/**
 * Class ContactTransformer.
 *
 * @package namespace App\Transformers;
 */
class ContactTransformer extends TransformerAbstract
{
    /**
     * Transform the Contact entity.
     *
     * @param \App\Entities\Contact $model
     *
     * @return array
     */
    public function transform(Contact $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
