<?php

namespace App\Http\Controllers\API;

use App\Exceptions\JsonException;
use App\Http\Controllers\Controller;
use App\Http\Repositories\settings\SettingsRepository;
use App\Http\Traits\ApiResponser;
use Exception;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class SettingsController
 *
 * @author Mahammad Mammadov <muhammed.mammadov.89@gmail.com>
 */
class SettingsController extends Controller
{
    use ApiResponser;

    /**
     * @var SettingsRepository
     */
    private SettingsRepository $settingsRepository;

    /**
     * SettingsController constructor
     *
     * @param SettingsRepository $settingsRepository
     */
    public function __construct(
        SettingsRepository $settingsRepository
    ) {
        $this->settingsRepository = $settingsRepository;
    }

    /**
     * Get Settings
     *
     * @throws JsonException
     */
    public function settings(): JsonResponse
    {
        try {
            $settings = $this->settingsRepository->all();
        } catch (Exception) {
            throw new JsonException(__('http.service_unavailable'), Response::HTTP_SERVICE_UNAVAILABLE);
        }

        return $this->successResponse(__('messages.success'), [
            'settings' => $settings
        ]);
    }
}
