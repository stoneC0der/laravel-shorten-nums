<?php

namespace Stonec0der\ShortenNums\Tests;

use PHPUnit\Framework\TestCase;
use Stonec0der\ShortenNums\ShortenNumsFacade;

class ShortenNumsTest extends TestCase
{
    /** @test */
    public function is_readableNumber()
    {
    	$random = ShortenNumsFacade::readableNumber('2000',3);
        $this->assertRegExp('/((?!(0))^([\d]{1,3})[kMBT]$|((?!(0))^[\d]{1,3}\.\d{1,}[kMBT]$))/i', $random);

        $thousands = ShortenNumsFacade::readableThousand('120300');
        $this->assertRegExp('/((?!(0))^[\d]{1,3}k$|((?!(0))^[\d]{1,3}\.\d{1,}k$))/i', $thousands);

        $millions = ShortenNumsFacade::readableMillion('359050235');
        $this->assertRegExp('/((?!(0))^[\d]{1,3}M$|((?!(0))^[\d]{1,3}\.\d{1,}M$))/i', $millions);

        $billion = ShortenNumsFacade::readableBillion('4077578213');
        $this->assertRegExp('/((?!(0))^[\d]{1,3}B$|((?!(0))^[\d]{1,3}\.\d{1,}B$))/i', $billion);

        $trillions = ShortenNumsFacade::readableTrillion('407757821309809',4);
        $this->assertRegExp('/((?!(0))^[\d]{1,3}T$|((?!(0))^[\d]{1,3}\.\d{1,}T$))/i', $trillions);
    }
}
