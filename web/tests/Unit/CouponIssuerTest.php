<?php

namespace Tests\Unit;

use App\Services\CouponIssuerService;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CouponIssuerTest extends TestCase
{
    /**
     * クーポン発行テスト
     *
     * @return void
     */
    public function testIssueNewCoupon()
    {
        $issuer = new CouponIssuerService();
        $coupon = $issuer->issueNewCoupon();
        self::assertEquals(new \DateTime('+1 week'), $coupon->getExpirationDate());
    }
}
