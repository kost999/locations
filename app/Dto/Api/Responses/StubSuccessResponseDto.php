<?php

declare(strict_types=1);

namespace App\Dto\Api\Responses;

/**
 * Class StubResponseDto
 *
 * @package App\Dto\Api\Responses
 */
class StubSuccessResponseDto
{
    /**
     * @var boolean
     */
    private $success;

    /**
     * @var StubSuccessDataDto
     */
    private $data;

    /**
     * StubSuccessResponseDto constructor.
     *
     * @param bool               $success
     * @param StubSuccessDataDto $data
     */
    public function __construct(bool $success, StubSuccessDataDto $data)
    {
        $this->success = $success;
        $this->data    = $data;
    }

    /**
     * @return bool
     */
    public function isSuccess(): bool
    {
        return $this->success;
    }

    /**
     * @return StubSuccessDataDto
     */
    public function getData(): StubSuccessDataDto
    {
        return $this->data;
    }
}
