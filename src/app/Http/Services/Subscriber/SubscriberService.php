<?php

namespace App\Http\Services\Subscriber;

use App\Http\Repositories\Subscriber\SubscriberRepository;

/**
 * Class SubscriberService
 *
 * @author Fuad Bayramli <fuadbayramli94@gmail.com>
 */
class SubscriberService
{
    /**
     * @var SubscriberRepository
     */
    protected SubscriberRepository $subscriberRepository;

    /**
     * @param  SubscriberRepository  $subscriberRepository
     */
    public function __construct(SubscriberRepository $subscriberRepository)
    {
        $this->subscriberRepository = $subscriberRepository;
    }

    /**
     * Create new subscriber
     *
     * @param array $data
     * @return mixed
     */
    public function create(array $data): mixed {
        return $this->subscriberRepository->create((new SubscriberCreateDataFactory($data))->getData());
    }
}
