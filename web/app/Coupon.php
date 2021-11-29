<?php

namespace App;

use DateTime;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    // システムクロックパターンを試してみるためのモデル

    /**
     * @var DateTime
     */
    private $expirationDate;

    /**
     * @param DateTime $expirationDate クーポンの有効期限
     */
    public function __construct(DateTime $expirationDate)
    {
        $this->expirationDate = $expirationDate;
    }

    public function getExpirationDate(): DateTime
    {
        return $this->expirationDate;
    }
}
