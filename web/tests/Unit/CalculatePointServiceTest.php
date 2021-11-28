<?php

namespace Tests\Unit;

use App\Services\CalculatePointService;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CalculatePointServiceTest extends TestCase
{
    public function dataProvider_for_calcPoint(): array
    {
        return [
            '購入金額が0なら0ポイント'      => [0, 0],
            '購入金額が999なら0ポイント'    => [0, 999],
            '購入金額が1000なら10ポイント'  => [10, 1000],
            '購入金額が9999なら99ポイント'  => [99, 9999],
            '購入金額が10000なら200ポイント'=> [200, 10000],
        ];
    }

    /**
     * A basic unit test example.
     * @test
     * @return void
     */
    public function testExample_テストのテスト()
    {
        $this->assertTrue(true);
    }

    /**
     * @test
     *
     */
    public function calcPoint_購入金額が０ならポイントは０()
    {
        $result = CalculatePointService::calcPoint(0);
        $this->assertSame(0, $result);
    }

    /**
     * @test
     */
    public function calcPoint_購入金額が1000ならポイントは10()
    {
        $result = CalculatePointService::calcPoint(1000);
        $this->assertSame(10, $result);
    }

    /**
     * @test
     * @dataProvider dataProvider_for_calcPoint
     */
    public function calcPoint_データプロバイダを使ったテスト(int $expected, int $amount)
    {
        $result = CalculatePointService::calcPoint($amount);
        $this->assertSame($expected, $result);
    }
}
