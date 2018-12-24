<?php

declare(strict_types=1);

namespace App\Dto\Api\Responses;

/**
 * Class StubSuccessDataDto
 *
 * @package App\Dto\Api\Responses
 */
class StubFailDataDto
{
    /**
     * @var string|null
     */
    private $message;

    /**
     * @var int|null
     */
    private $code;

    /**
     * StubFailDataDto constructor.
     *
     * @param string|null $message
     * @param int|null    $code
     */
    public function __construct(?string $message, ?int $code)
    {
        $this->message = $message;
        $this->code    = $code;
    }

    /**
     * @return string|null
     */
    public function getMessage(): ?string
    {
        return $this->message;
    }

    /**
     * @return int|null
     */
    public function getCode(): ?int
    {
        return $this->code;
    }
}
