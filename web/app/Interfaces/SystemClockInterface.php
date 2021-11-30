<?php

namespace App\Interfaces;

interface SystemClockInterface
{
    public function now(): \DateTime;
}
