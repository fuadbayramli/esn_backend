<?php

namespace App\Http\Resources;
/**
 * Abstract Class ApiResponse
 *
 * @author Mahammad Mammadov <muhammed.mammadov.89@gmail.com>
 */
abstract class ApiResponse
{
    /**
     * @var string $message
     */
    protected string $message;

    /**
     * @var array $data
     */
    protected $data = [];

    /**
     * ApiResponse constructor.
     * @param $message
     * @param array $data
     */
    public function __construct($message, array $data = [])
    {
        $this->message = $message;
        $this->data = (object) $data;
    }

}
