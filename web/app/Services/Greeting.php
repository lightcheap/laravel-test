<?php

namespace App\Services;

final class Greeting
{
    /**
     * テスト練習のための処理
     * 時間に応じて挨拶を返す処理
     * @param string $time
     * @return string
     */
    public function sayHello($time)
    {
        if (strtotime('05:00:00') <= strtotime($time) && strtotime('12:00:00') > strtotime($time) ) {
            return 'おはようございます';
        } elseif (strtotime('12:00:00') <= strtotime($time) && strtotime('18:00:00') > strtotime($time)) {
            return 'こんにちは';
        } elseif (
            strtotime('18:00:00') <= strtotime($time) && strtotime('23:59:59') >= strtotime($time)
            || strtotime('00:00:00') <= strtotime($time) && strtotime('05:00:00') > strtotime($time)
        ) {
            return 'こんばんは';
        }
    }
}
