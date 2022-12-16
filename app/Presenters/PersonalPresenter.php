<?php

namespace App\Presenters;

use App\Transformers\PersonalTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class PersonalPresenter.
 *
 * @package namespace App\Presenters;
 */
class PersonalPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new PersonalTransformer();
    }
}
