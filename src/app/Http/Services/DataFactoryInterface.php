<?php

namespace App\Http\Services;

/**
 * Interface DataFactoryInterface
 *
 * @author Mahammad Mammadov <muhammed.mammadov.89@gmail.com>
 */
interface DataFactoryInterface
{
    /**
     * DataFactoryInterface constructor
     *
     * @param array $data
     * @param array $params
     */
    public function __construct(array $data, array $params = []);

    /**
     * Get custom data for inserting
     * @return array
     */
    public function getData(): array;
}
