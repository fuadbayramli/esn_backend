<?php

namespace App\Http\Repositories\settings;

use App\Http\Repositories\BaseRepository;
use App\Models\API\Settings;

/**
 * Class SettingsRepository
 *
 * @author Mahammad Mammadov <muhammed.mammadov.89@gmail.com>
 */
class SettingsRepository extends  BaseRepository
{
    /**
     * SettingsRepository Constructor
     *
     * @param Settings $model
     */
    public function __construct(Settings $model)
    {
        parent::__construct($model);
    }

    /**
     * * Get all settings
     *
     * @param  array  $params
     * @return mixed
     */
    public function all(array $params = []): mixed
    {
        $collection = $this->model::where('group','Site')->get();

        if (!$collection) {
            return null;
        }

        return $collection;
    }
}
