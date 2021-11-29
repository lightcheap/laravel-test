<?php

namespace Tests\Unit;

use App\Services\CalculatePointService;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PhpParser\Node\Stmt\TryCatch;

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
            '購入金額がマイナス'            => [0, -1],
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

    /**
     * @test
     * try/catchを使った例外のテスト
     */
    public function exception_trycathch_例外テスト()
    {
        try {
            // 例外がスローされない場合はテスト失敗
            throw new \InvalidArgumentException('message', 200);
            $this->fail();
        } catch (\Throwable $e) {
            // 指定した例外クラスがスローされているか
            $this->assertInstanceOf(\InvalidArgumentException::class, $e);
            // スローされた例外のコードを検証
            $this->assertSame(200, $e->getCode());
            // スローされた例外のメッセージを検証
            $this->assertSame('message', $e->getMessage());
        }
    }

    /**
     * @test
     * exceptedExceptionメソッドを利用したテスト
     */
    public function exception_expectedException_method()
    {
        // 指定した例外クラスがスローされているか
        $this->expectException(\InvalidArgumentException::class);
        // スローされた例外のコードを検証
        $this->expectExceptionCode(200);
        // スローされた例外のメッセージを検証
        $this->expectExceptionMessage('message');

        throw new \InvalidArgumentException('message', 200);
    }

    /**
     * @test
     * exceptedExceptionアノテーション利用
     * @expectedException \InvalidArgumentException
     * @expectedExceptionCode 200
     * @expectedExceptionMessage message
     */
    public function exception_expectedException_annotation()
    {
        throw new \InvalidArgumentException('message', 200);
    }


    /**
     * @test
     * @exceptedException \App\Exceptions\PreConditionException
     * @exceptedExceptionMessage 購入金額が負の数
     */
    public function calcPoint_購入金額が負の数なら例外スロー()
    {
        calculatePointService::calcPoint(-1);
    }
}
