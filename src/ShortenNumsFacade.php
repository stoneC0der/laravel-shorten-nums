<?php
/**
 *
 * ShortenNumsFacade Class
 *
 * Created 14/01/2020
 * Author: Cedric Megnie N. (Stonec0der).
 * Email: stonec0dersoft@gmail.com
 *
 * This facade expose the functionalities of the ShortenNums Class.
 *
 * Licence: MIT
 */

namespace Stonec0der\ShortenNums;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Stonec0der\ShortenNums\Skeleton\SkeletonClass
 */
class ShortenNumsFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'shorten-nums';
    }

    /**
     * Convert number 999+ => 1K, 999999+ => 1M, 999999999+ => 1B, 999999999999+ => 1T
     * 
     * @param int|string $number The value to shorten.
     * @param int $precision The Number of digit after decimal point.
     */
    public static function readableNumber($number, $precision = 1): string
    {
        return ShortenNums::formatNumber($number, $precision);       
    }

    /**
     * Convert number 999+ => 1K.
     * 
     * @param int|string $number The value to shorten.
     * @param int $precision The Number of digit after decimal point.
     */
    public static function readableThousand($number, $precision = 1): string
    {
    	return ShortenNums::formatThousand($number, $precision);
    }

    /**
     * Convert number 999999+ => 1M.
     * 
     * @param int|string $number The value to shorten.
     * @param int $precision The Number of digit after decimal point.
     */
    public static function readableMillion($number, $precision = 1): string
    {
        return ShortenNums::formatMillion($number, $precision);
    }

    /**
     * Convert number 999999999+ => 1B.
     * 
     * @param int|string $number The value to shorten.
     * @param int $precision The Number of digit after decimal point.
     */
    public static function readableBillion($number, $precision = 1): string
    {
        $shortened = ShortenNums::formatBillion($number, $precision);
        return $shortened;
    }

    /**
     * Convert number 999999999999+ => 1T.
     * 
     * @param int|string $number The value to shorten.
     * @param int $precision The Number of digit after decimal point.
     */
    public static function readableTrillion($number, $precision = 1): string
    {
        return ShortenNums::formatTrillion($number, $precision);
    }
}
