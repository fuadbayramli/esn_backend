<?php

namespace App\Http\Services\Subscriber;

use App\Http\Services\BaseDataFactory;

/**
 * Class SubscriberCreateDataFactory
 *
 * @author Fuad Bayramli <fuadbayramli94@gmail.com>
 */
class SubscriberCreateDataFactory extends BaseDataFactory
{

    public function getData(): array
    {
        return [
            'email' => $this->data['email'],
        ];
    }
}
