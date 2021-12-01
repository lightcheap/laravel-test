<?php

namespace App\Services;

final class Greeting
{
    private $time;

    public function __construct()
    {
        $this->time = $this->nowH_i_s();
    }
    /**
     * テスト練習のための処理
     * 時間に応じて挨拶を返す処理
     * @param string $time
     * @return string
     */
    public function sayHello()
    {

        if (strtotime('05:00:00') <= strtotime($this->time) && strtotime('12:00:00') > strtotime($this->time) ) {
            return 'おはようございます';
        } elseif (strtotime('12:00:00') <= strtotime($this->time) && strtotime('18:00:00') > strtotime($this->time)) {
            return 'こんにちは';
        } else {
            return 'こんばんは';
        }
    }

    /**
     * 現在時刻を持ってくるだけの関数
     * @return string
     */
    public function nowH_i_s(): string
    {
        $now = new \DateTime();
        return $now->format('H:i:s');
    }
}
