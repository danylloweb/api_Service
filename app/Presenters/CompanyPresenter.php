<?php

namespace App\Presenters;

use App\Transformers\CompanyTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class CompanyPresenter.
 *
 * @package namespace App\Presenters;
 */
class CompanyPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new CompanyTransformer();
    }
}
