<?php

namespace App\Http\Repositories\Country;

use App\Http\Repositories\BaseRepository;
use App\Models\Country;

/**
 * Class CountryRepository Repository
 *
 * @author Mahammad Mammadov <muhammed.mammadov.89@gmail.com>
 */
class CountryRepository extends BaseRepository
{
    /**
     * CountryRepository Constructor
     *
     * @param Country $model
     */
    public function __construct(Country $model)
    {
        parent::__construct($model);
    }

}

