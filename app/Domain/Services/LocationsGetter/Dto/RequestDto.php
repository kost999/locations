<?php

declare(strict_types=1);

namespace App\Domain\Services\LocationsGetter\Dto;

/**
 * Class RequestDto
 *
 * @package App\Domain\Services\LocationsGetter\Dto
 */
class RequestDto
{
    /**
     * @var int|null
     */
    private $limit;

    /**
     * @var int|null
     */
    private $offset;

    /**
     * RequestDto constructor.
     *
     * @param int|null $limit
     * @param int|null $offset
     */
    public function __construct(?int $limit = null, ?int $offset = null)
    {
        $this->limit  = $limit;
        $this->offset = $offset;
    }

    /**
     * @return int|null
     */
    public function getLimit(): ?int
    {
        return $this->limit;
    }

    /**
     * @return int|null
     */
    public function getOffset(): ?int
    {
        return $this->offset;
    }
}
