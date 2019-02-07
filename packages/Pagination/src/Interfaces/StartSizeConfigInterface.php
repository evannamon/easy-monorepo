<?php
declare(strict_types=1);

namespace StepTheFkUp\Pagination\Interfaces;

interface StartSizeConfigInterface
{
    /**
     * Get size attribute name.
     *
     * @return string
     */
    public function getSizeAttribute(): string;

    /**
     * Get size attribute default value.
     *
     * @return int
     */
    public function getSizeDefault(): int;

    /**
     * Get start attribute name.
     *
     * @return string
     */
    public function getStartAttribute(): string;

    /**
     * Get start attribute default value.
     *
     * @return int
     */
    public function getStartDefault(): int;
}
