<?php

namespace Stonec0der\ShortenNums\Tests;

use Orchestra\Testbench\TestCase;
use Stonec0der\ShortenNums\ShortenNumsFacade;

class ShortenNumsTest extends TestCase
{
    /**
     * Setup the test environment.
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->artisan('vendor:publish', ['--tag' => 'config']);
    }

    /**
     * Define environment setup.
     *
     * @param  \Illuminate\Foundation\Application  $app
     *
     * @return void
     */
    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('shorten-nums.precision', 2);
    }

    /**
     * Get package providers.  At a minimum this is the package being tested, but also
     * would include packages upon which our package depends, e.g. Cartalyst/Sentry
     * In a normal app environment these would be added to the 'providers' array in
     * the config/app.php file.
     *
     * @param  \Illuminate\Foundation\Application  $app
     *
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return [
            'Stonec0der\ShortenNums\ShortenNumsServiceProvider',
        ];
    }

    /** @test */
    public function it_can_shortent_any_valid_number()
    {
        // ShortenNumsFacade::shouldReceive('shorten-nums');
    	$random = ShortenNumsFacade::readableNumber('1200',3);
        $this->assertRegExp('/((?!(0\d))^([\d]{1,3})[kMBT]$|((?!(0\d))^[\d]{1,3}\.\d{1,}[kMBT]|((?!(0\d))^[\d]{1,3}|(?!(0\d))^[\d]{3}\+T$)))/i', $random);
        echo $random;
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
