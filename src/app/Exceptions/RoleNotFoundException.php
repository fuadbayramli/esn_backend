<?php

namespace App\Exceptions;

use Exception;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class RoleNotFoundException
 *
 * @author Fuad Bayramli <fuadbayramli94@gmail.com>
 * */
class RoleNotFoundException extends Exception
{
    /**
     * MemberNotFoundException constructor.
     */
    public function __construct()
    {
        parent::__construct(__('messages.role_is_not_exist'), Response::HTTP_NOT_FOUND);
    }
}
