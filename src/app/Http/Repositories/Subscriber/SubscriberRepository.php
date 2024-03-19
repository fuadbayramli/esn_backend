<?php

namespace App\Http\Repositories\Subscriber;

use App\Http\Repositories\BaseRepository;
use App\Models\API\Subscriber;

/**
 * Class SubscriberRepository
 *
 * @author Fuad Bayramli <fuadbayramli94@gmail.com>
 */
class SubscriberRepository  extends BaseRepository
{
    /**
     * SubscriberRepository Constructor
     *
     * @param Subscriber $model
     */
    public function __construct(Subscriber $model)
    {
        parent::__construct($model);
    }
}
