<?php

namespace App\Http\Repositories\Testimonial;

use App\Http\Repositories\BaseRepository;
use App\Models\Testimonial;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class TestimonialRepository
 *
 * @author Mahammad Mammadov <muhammed.mammadov.89@gmail.com>
 */
class TestimonialRepository extends BaseRepository
{
    /**
     * TestimonialRepository Constructor
     *
     * @param Testimonial $model
     */
    public function __construct(Testimonial $model)
    {
        parent::__construct($model);
    }

    /**
     * * Get all testimonials
     *
     * @param  array  $params
     * @return array|Collection|null
     */
    public function all(array $params = []): array|null|Collection
    {
        $collection = $this->model::with('country')->where('status',1)->get();

        if (!$collection) {
            return null;
        }

        return $collection;
    }
}
