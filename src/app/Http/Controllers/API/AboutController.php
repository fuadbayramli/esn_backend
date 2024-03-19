<?php

namespace App\Http\Controllers\API;

use App\Exceptions\JsonException;
use App\Http\Controllers\Controller;
use App\Http\Repositories\About\AboutRepository;
use App\Http\Traits\ApiResponser;
use Exception;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class AboutController
 *
 * @author Mahammad Mammadov <muhammed.mammadov.89@gmail.com>
 */
class AboutController extends Controller
{
    use ApiResponser;

    /**
     * @var AboutRepository
     */
    private AboutRepository $aboutRepository;

    /**
     * AboutController constructor
     *
     * @param AboutRepository $aboutRepository
     */
    public function __construct(
        AboutRepository $aboutRepository
    ) {
        $this->aboutRepository = $aboutRepository;
    }

    /**
     * Get About
     *
     * @throws JsonException
     */
    public function all(): JsonResponse
    {
        try {
            $about = $this->aboutRepository->all();
        } catch (Exception) {
            throw new JsonException(__('http.service_unavailable'), Response::HTTP_SERVICE_UNAVAILABLE);
        }

        return $this->successResponse(__('messages.success'), [
            'about' => $about
        ]);
    }
}
