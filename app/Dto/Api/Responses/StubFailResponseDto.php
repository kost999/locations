<?php

declare(strict_types=1);

namespace App\Dto\Api\Responses;

/**
 * Class StubFailResponseDto
 *
 * @package App\Dto\Api\Responses
 */
class StubFailResponseDto
{
    /**
     * @var boolean
     */
    private $success;

    /**
     * @var StubFailDataDto
     */
    private $data;

    /**
     * StubFailResponseDto constructor.
     *
     * @param bool            $success
     * @param StubFailDataDto $data
     */
    public function __construct(bool $success, StubFailDataDto $data)
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
     * @return StubFailDataDto
     */
    public function getData(): StubFailDataDto
    {
        return $this->data;
    }
}
