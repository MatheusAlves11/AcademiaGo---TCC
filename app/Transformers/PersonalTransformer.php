<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Personal;

/**
 * Class PersonalTransformer.
 *
 * @package namespace App\Transformers;
 */
class PersonalTransformer extends TransformerAbstract
{
    /**
     * Transform the Personal entity.
     *
     * @param \App\Entities\Personal $model
     *
     * @return array
     */
    public function transform(Personal $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
