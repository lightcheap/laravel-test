<?php

namespace Tests\Unit;

use App\Services\CalculatePointService;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CalculatePointServiceTest extends TestCase
{
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
}
