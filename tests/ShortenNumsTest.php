<?php

namespace Stonec0der\ShortenNums\Tests;

use PHPUnit\Framework\TestCase;
use Stonec0der\ShortenNums\ShortenNumsFacade;

class ExampleTest extends TestCase
{
    /** @test */
    public function true_is_true()
    {
    	$random = ShortenNumsFacade::shortenNumber('2000', 4);
        $this->assertRegExp('/((?!(0))^[\d]{1,3}k$|((?!(0))^[\d]{1,3}\.\d{1,1}k$))/i', $random);

    	$one_k = ShortenNumsFacade::shortenThousand('1000');
        $this->assertRegExp('/((?!(0))^[\d]{1,1}k$|((?!(0))^[\d]{1,1}\.\d{1,1}k$))/i', $one_k);

        $ten_k = ShortenNumsFacade::shortenTenThousand('10000');
        $this->assertRegExp('/((?!(0))^[\d]{1,2}k$|((?!(0))^[\d]{1,2}\.\d{1,1}k$))/i', $ten_k);

        $handred_k = ShortenNumsFacade::shortenHandredThousand('120300');
        $this->assertRegExp('/((?!(0))^[\d]{1,3}k$|((?!(0))^[\d]{1,3}\.\d{1,1}k$))/i', $handred_k);

        $one_M = ShortenNumsFacade::shortenMillion('1253003');
        $this->assertRegExp('/((?!(0))^[\d]{1,1}M$|((?!(0))^[\d]{1,1}\.\d{1,1}M$))/i', $one_M);

        $ten_M = ShortenNumsFacade::shortenTenMillion('93952000');
        $this->assertRegExp('/((?!(0))^[\d]{1,2}M$|((?!(0))^[\d]{1,2}\.\d{1,1}M$))/i', $ten_M);
        $this->assertEquals('93.9M', $ten_M);

        $handred_M = ShortenNumsFacade::shortenHandredMillion('359050235');
        $this->assertRegExp('/((?!(0))^[\d]{1,3}M$|((?!(0))^[\d]{1,3}\.\d{1,1}M$))/i', $handred_M);

        $one_B = ShortenNumsFacade::shortenBillion('3500000000');
        $this->assertRegExp('/((?!(0))^[\d]{1,1}B$|((?!(0))^[\d]{1,1}\.\d{1,1}B$))/i', $one_B);
    }
}
