<?php

namespace App\Http\Controllers\API;

use App\Exceptions\JsonException;
use App\Http\Controllers\Controller;
use App\Http\Requests\FileRequest;
use App\Http\Services\File\FileService;
use App\Http\Traits\ApiResponser;
use Exception;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class FileController
 *
 * @author Mahammad Mammadov <muhammed.mammadov.89@gmail.com>
 */
class FileController extends Controller
{
    use ApiResponser;

    /**
     * Upload file to server
     *
     * @param FileRequest $fileRequest
     * @param FileService $fileService
     * @return JsonResponse
     * @throws JsonException
     */
    public function upload(FileRequest $fileRequest, FileService $fileService): JsonResponse
    {
      $data = $fileRequest->validated();

      try {
          $file = $fileService->uploadFile($data);
      } catch (Exception) {
          throw new JsonException(__('http.service_unavailable'), Response::HTTP_SERVICE_UNAVAILABLE);
      }

      return $this->successResponse(__('messages.success'),
          ['filePath' => $file], Response::HTTP_CREATED);
    }
}
