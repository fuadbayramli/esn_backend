<?php

namespace App\Http\Traits;

use App\Http\Resources\ApiResponse;
use App\Http\Resources\ErrorApiResponse;
use App\Http\Resources\SuccessApiResponse;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

/**
 * Trait ApiResponser
 *
 * @author Muhammed Mammdov <muhammed.mammadov.89@gmail.com>
 */
trait ApiResponser
{
    /**
     * Get json response
     *
     * @param  ApiResponse  $response
     * @param string $status
     * @param array $headers
     * @param int $options
     * @return JsonResponse
     */
    public function responseFactory(ApiResponse $response, string $status, array $headers, int $options): JsonResponse
    {
        return response()->json($response, $status, $headers, $options);
    }

    /**
     * Set Error response and return it
     *
     * @param string $message
     * @param array $data
     * @param int $status
     * @param array $headers
     * @param int $options
     * @return JsonResponse
     */
  protected function successResponse(
      string $message,
      array $data = [],
      int $status = Response::HTTP_OK,
      array $headers = [],
      int $options = JSON_UNESCAPED_UNICODE
  ): JsonResponse
  {
      return $this->responseFactory(new SuccessApiResponse($message, $data), $status, $headers, $options);
  }

    /**
     * Set Error response and return it
     *
     * @param string $message
     * @param array $data
     * @param string $status
     * @param array $headers
     * @param int $options
     * @return JsonResponse
     */
  protected function errorResponse(
      string $message,
      array $data = [],
      string $status = Response::HTTP_BAD_REQUEST,
      array $headers = [],
      int $options = JSON_UNESCAPED_UNICODE
  ): JsonResponse
  {
      return $this->responseFactory(new ErrorApiResponse($message, $data), $status, $headers, $options);
  }
}
