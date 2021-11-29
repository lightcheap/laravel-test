<?php

namespace App\Services;

use App\Coupon;

final class CouponIssuerService
{
    /**
     * 有効期限が１週間の新しいクーポンを発行する
     */
    public function issueNewCoupon(): Coupon
    {
        return new Coupon(new \DateTime('+1 week'));
    }
}
