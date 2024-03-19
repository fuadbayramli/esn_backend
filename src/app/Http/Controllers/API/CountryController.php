<?php

namespace App\Http\Controllers\API;

use App\Exceptions\JsonException;
use App\Http\Controllers\Controller;
use App\Http\Repositories\Country\CountryRepository;
use App\Http\Traits\ApiResponser;
use Exception;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class CountryController
 *
 * @author Mahammad Mammadov <muhammed.mammadov.89@gmail.com>
 */
class CountryController extends Controller
{
    use ApiResponser;

    /**
     * @var CountryRepository
     */
    private CountryRepository $countryRepository;

    /**
     * CountryController constructor
     *
     * @param CountryRepository $countryRepository
     */
    public function __construct(
        CountryRepository $countryRepository
    ) {
        $this->countryRepository = $countryRepository;
    }

    /**
     * Get countries
     *
     * @throws JsonException
     */
    public function all(): JsonResponse
    {
        try {
            $countries = $this->countryRepository->all();
        } catch (Exception) {
            throw new JsonException(__('http.service_unavailable'), Response::HTTP_SERVICE_UNAVAILABLE);
        }

        return $this->successResponse(__('messages.success'), [
            'countries' => $countries
        ]);
    }
}
