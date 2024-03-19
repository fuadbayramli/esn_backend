<?php

namespace App\Http\Repositories\Concept;

use App\Http\Repositories\BaseRepository;
use App\Models\Concept;

/**
 * Class ConceptRepository
 *
 * @author Mahammad Mammadov <muhammed.mammadov.89@gmail.com>
 */
class ConceptRepository extends BaseRepository
{
    /**
     * ConceptRepository Constructor
     *
     * @param Concept $model
     */
    public function __construct(Concept $model)
    {
        parent::__construct($model);
    }
}
