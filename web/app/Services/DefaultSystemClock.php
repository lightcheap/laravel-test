<?php

namespace App\Services;

use App\Interfaces\SystemClockInterface;

/**
 * 本番環境用のシステムクロック
 */
final class DefaultSystemClock implements SystemClockInterface
{
    public function now(): \DateTime
    {
        return new \DateTime();
    }
}
