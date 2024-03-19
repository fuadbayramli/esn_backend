<?php

namespace App\Http\Repositories\Faq;

use App\Http\Repositories\BaseRepository;
use App\Models\Faq;

/**
 * Class FaqRepository Repository
 *
 * @author Mahammad Mammadov <muhammed.mammadov.89@gmail.com>
 */
class FaqRepository extends BaseRepository
{
    /**
     * FaqRepository Constructor
     *
     * @param Faq $model
     */
    public function __construct(Faq $model)
    {
        parent::__construct($model);
    }

}
