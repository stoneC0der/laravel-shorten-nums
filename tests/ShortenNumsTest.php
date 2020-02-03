<?php

namespace Stonec0der\ShortenNums\Tests;

use PHPUnit\Framework\TestCase;
use Stonec0der\ShortenNums\ShortenNumsFacade;

class ShortenNumsTest extends TestCase
{
    /** @test */
    public function it_can_shortent_any_valid_number()
    {
    	$random = ShortenNumsFacade::readableNumber('0',3);
        $this->assertRegExp('/((?!(0\d))^([\d]{1,3})[kMBT]$|((?!(0\d))^[\d]{1,3}\.\d{1,}[kMBT]|((?!(0\d))^[\d]{1,3}|(?!(0\d))^[\d]{3}\+T$)))/i', $random);
    }

    /** @test */
    public function it_can_shorten_thousands()
    {
        $thousands = ShortenNumsFacade::readableThousand('120300');
        $this->assertRegExp('/((?!(0\d))^[\d]{1,3}k$|((?!(0\d))^[\d]{1,3}\.\d{1,}k$))/i', $thousands);
    }

    /** @test */
    public function it_can_shortent_millions()
    {
        $millions = ShortenNumsFacade::readableMillion('359050235');
        $this->assertRegExp('/((?!(0\d))^[\d]{1,3}M$|((?!(0\d))^[\d]{1,3}\.\d{1,}M$))/i', $millions);
    }

    /** @test */
    public function it_can_shorten_billions()
    {
        $billion = ShortenNumsFacade::readableBillion(4077578213);
        $this->assertRegExp('/((?!(0\d))^[\d]{1,3}B$|((?!(0\d))^[\d]{1,3}\.\d{1,}B$))/i', $billion);
    }

    /** @test */
    public function it_can_shorten_trillions()
    {
        $trillions = ShortenNumsFacade::readableTrillion(407757821309809,4);
        $this->assertRegExp('/((?!(0\d))^[\d]{1,3}T$|((?!(0\d))^[\d]{1,3}\.\d{1,}T$))/i', $trillions);
    }
    /**
     * @test
     */
    public function it_is_not_shortenable()
    {
        $invalid_value = '9999999999999999';
        $default = ShortenNumsFacade::readableNumber($invalid_value);
        $this->assertRegExp('/((?!(0\d))^[\d]{3}\+T$|((?!(0\d))^[\d]{1,3}$))/i', $default);
    }
}
