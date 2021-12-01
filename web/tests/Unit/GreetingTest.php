<?php

namespace Tests\Unit;

use App\Services\Greeting;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class GreetingTest extends TestCase
{
    public function dataProvider_for_sayHello(): array
    {
        return [
            '結果がおはようございます'  => ['おはようございます', '05:00:00'],
            '結果がおはようございます'  => ['おはようございます', '11:59:59'],
            '結果がこんにちは'          => ['こんにちは', '12:00:00'],
            '結果がこんにちは'          => ['こんにちは', '17:59:59'],
            '結果がこんばんは'          => ['こんばんは', '18:00:00'],
            '結果がこんばんは'          => ['こんばんは', '04:59:59'],
        ];
    }
    /**
     * @test
     * @dataProvider dataProvider_for_sayHello
     */
    public function sayHello_時間に応じた挨拶テスト（DataProvider）(string $expected, string $time)
    {
        $greeting= new Greeting;
        $greetingWords = $greeting->sayHello();

        if (strtotime('05:00:00') <= strtotime($time) && strtotime('12:00:00') > strtotime($time) ) {
            $this->assertSame($expected, $greetingWords);
        } elseif (strtotime('12:00:00') <= strtotime($time) && strtotime('18:00:00') > strtotime($time)) {
            $this->assertSame($expected, $greetingWords);
        } else {
            $this->assertSame($expected, $greetingWords);
        }
    }

    /**
     * @test
     *
     */
    public function sayHello_時間に応じた挨拶テスト()
    {
        $greeting= new Greeting;
        $greetingWords = $greeting->sayHello();

        if (strtotime('05:00:00') <= strtotime($time) && strtotime('12:00:00') > strtotime($time) ) {
            $this->assertSame($expected, $greetingWords);
        } elseif (strtotime('12:00:00') <= strtotime($time) && strtotime('18:00:00') > strtotime($time)) {
            $this->assertSame($expected, $greetingWords);
        } else {
            $this->assertSame($expected, $greetingWords);
        }
    }
}
