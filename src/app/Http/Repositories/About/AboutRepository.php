<?php

namespace App\Http\Repositories\About;

use App\Http\Repositories\BaseRepository;
use App\Models\About;

/**
 * Class AboutRepository
 *
 * @author Mahammad Mammadov <muhammed.mammadov.89@gmail.com>
 */
class AboutRepository extends BaseRepository
{
    /**
     * AboutRepository Constructor
     *
     * @param About $model
     */
    public function __construct(About $model)
    {
        parent::__construct($model);
    }
}
