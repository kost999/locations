<?php

declare(strict_types=1);

namespace App\Http\Clients;

use App\Dto\Api\Responses\StubFailResponseDto;
use App\Dto\Api\Responses\StubSuccessResponseDto;
use App\Exceptions\Http\Clients\StubClient\StubClientUnavailableException;
use GuzzleHttp\Client as GuzzleClient;
use Illuminate\Http\Response;
use JMS\Serializer\ArrayTransformerInterface;
use JMS\Serializer\SerializerInterface;

/**
 * Class StubClient
 *
 * @package App\Http\Clients
 */
class StubClient
{
    /**
     * @var GuzzleClient
     */
    private $httpClient;

    /**
     * @var SerializerInterface|ArrayTransformerInterface
     */
    private $serializer;

    /**
     * StubClient constructor.
     *
     * @param GuzzleClient        $guzzle
     * @param SerializerInterface $serializer
     */
    public function __construct(GuzzleClient $guzzle, SerializerInterface $serializer)
    {
        $this->httpClient = new GuzzleClient(
            [
                'base_uri'    => config('stub.base_uri'),
                'http_errors' => false,
            ]
        );
        $this->serializer = $serializer;
    }

    /**
     * @param int|null $limit
     * @param int|null $offset
     *
     * @return StubSuccessResponseDto
     * @throws StubClientUnavailableException
     */
    public function getLocations(?int $limit, ?int $offset): StubSuccessResponseDto
    {
        \Log::debug(
            'Making a request to stub locations',
            [
                'limit'  => $limit,
                'offset' => $offset,
            ]
        );

        try {
            $response = $this->httpClient->get(config('stub.endpoints.locations'));
            if ($response->getStatusCode() === Response::HTTP_OK) {
                return $this->serializer->deserialize(
                    $response->getBody()->getContents(),
                    StubSuccessResponseDto::class,
                    'json'
                );
            }
            /* @var StubFailResponseDto $responseDto */
            $responseDto = $this->serializer->deserialize(
                $response->getBody()->getContents(),
                StubFailResponseDto::class,
                'json'
            );
            throw new \Exception(
                $responseDto->getData()->getMessage() ?? 'Bad stub response', $responseDto->getData()->getCode() ?? 0
            );
        } catch (\Throwable $exception) {
            \Log::error($exception->getMessage());
            throw new StubClientUnavailableException('Stub client is unavailable', 0, $exception);
        }
    }
}
