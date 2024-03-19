<?php

namespace App\Http\Resources;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Resources\Json\ResourceCollection;
use JsonSerializable;
use Symfony\Component\HttpFoundation\Response;

/**
 * Abstract Class ApiResourceCollection
 *
 * @author Mahammad Mammadov <muhammed.mammadov.89@gmail.com>
 */
class ApiResourceCollection extends ResourceCollection
{
    /**
     * @var string
     */
    public $message;

    /**
     * @var int|string
     */
    public $statusCode;

    /**
     * @var array
     */
    public $headers;

    /**
     * @var int
     */
    public int $encodingOptions;

    /**
     * Resource constructor.
     *
     * @param $resource
     * @param string|null $message
     * @param string $statusCode
     * @param array $headers
     * @param int $encodingOptions
     */
    public function __construct(
        $resource,
        string $message = null,
        string $statusCode = Response::HTTP_OK,
        array $headers = [],
        int $encodingOptions = JSON_UNESCAPED_UNICODE
    ) {
        $this->message = $message;
        $this->statusCode = $statusCode;
        $this->headers = $headers;
        $this->encodingOptions = $encodingOptions;

        if (!$message) {
            $this->message = __('messages.success');
        }

        parent::__construct($resource);
    }

    /**
     * @inheritDoc
     */
    public function toArray($request): array|JsonSerializable|Arrayable
    {
        $this->additional(['message' => $this->message]);

        return parent::toArray($request);
    }

    /**
     * @inheritDoc
     */
    public function withResponse($request, $response)
    {
        $response
            ->setData(['message' => $this->message,'data' => $this->toArray($request)])
            ->setStatusCode($this->statusCode)
            ->withHeaders($this->headers)
            ->setEncodingOptions($this->encodingOptions);
    }
}
