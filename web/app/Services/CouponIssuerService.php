<?php

namespace App\Services;

use App\Coupon;
use App\Services\DefaultSystemClock;
use App\Interfaces\SystemClockInterface;

/**
 * クーポン発行サービス
 */
final class CouponIssuerService
{
    /**
     * @var SystemClock
     */
    private $systemClock;

    public function __construct(SystemClockInterface $systemClock)
    {
        $this->systemClock = $systemClock;
    }
    /**
     * 有効期限が１週間の新しいクーポンを発行する
     */
    public function issueNewCoupon(): Coupon
    {
        return new Coupon($this->systemClock->now()->modify('+1 week'));
    }
}
