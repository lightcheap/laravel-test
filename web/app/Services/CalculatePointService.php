<?php

namespace App\Services;

use App\Exceptions\PreConditionException;

final class CalculatePointService
{
    /**
     * 購入金額に応じたポイントを返す
     * @param int $amount 購入金額
     * @return int 加算ポイント
     * @throws PreConditionException
     */
    public static function calcPoint(int $amount)
    {
        if ($amount < 0) {
            throw new PreConditionException('購入金額が０以下です。');
        }

        if ($amount < 1000) {
            return 0;
        }

        if ($amount < 10000) {
            $base_point = 1;
        } else {
            $base_point = 2;
        }

        return intval($amount / 100) * $base_point;
    }
}
