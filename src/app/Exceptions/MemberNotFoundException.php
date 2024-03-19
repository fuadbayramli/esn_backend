<?php

namespace App\Exceptions;

use Exception;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class MemberNotFoundException
 *
 * @author Mahammad Mammadov <muhammed.mammadov.89@gmail.com>
 * */
class MemberNotFoundException extends Exception
{
    /**
     * MemberNotFoundException constructor.
     */
    public function __construct()
    {
        parent::__construct(__('auth.failed'), Response::HTTP_NOT_FOUND);
    }
}
