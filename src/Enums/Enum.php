<?php

namespace Apvalkov\LaravelOpenexchangerates\Enums;

use Illuminate\Support\Collection;
use MyCLabs\Enum\Enum as MyCLabsEnum;

/**
 * @package App\Enums
 */
abstract class Enum extends MyCLabsEnum
{
    /**
     * @return Collection
     */
    public static function toCollection(): Collection
    {
        return collect(self::toArray());
    }
    /**
     * @param null $variable
     *
     * @return bool
     */
    public function notEqual($variable = null): bool
    {
        return !$this->equals($variable);
    }
}
