<?php

namespace Tests\Unit;

use App\Services\CouponIssuerService;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Interfaces\SystemClockInterface;

class CouponIssuerTest extends TestCase implements SystemClockInterface
{
    /**
     * クーポン発行テスト
     *
     * @return void
     */
    public function testIssueNewCoupon()
    {
        $issuer = new CouponIssuerService($this->getSystemClock());
        $coupon = $issuer->issueNewCoupon();
        self::assertEquals(
            new \DateTime('2021-11-25 00:00:00'),
            $coupon->getExpirationDate()
        );
    }

    /**
     * SystemClockのモックオブジェクトを返す
     */
    private function getSystemClock(): SystemClockInterface
    {
        return $this;
    }

    /**
     * SystemClockインターフェイスの実装
     */
    public function now(): \DateTime
    {
        return new \DateTime('2021-11-18 00:00:00');
    }
}
