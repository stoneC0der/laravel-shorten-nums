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

    public static function readableNumber($number, $precision = 1)
    {
        return ShortenNums::formatNumber($number, $precision);       
    }

    public static function readableThousand($number, $precision = 1)
    {
    	return ShortenNums::formatThousand($number, $precision);
    }

    public static function readableMillion($number, $precision = 1)
    {
        return ShortenNums::formatMillion($number, $precision);
    }

    public static function readableBillion($number, $precision = 1)
    {
        $shortened = ShortenNums::formatBillion($number, $precision);
        return $shortened;
    }

    public static function readableTrillion($number, $precision = 1)
    {
        return ShortenNums::formatTrillion($number, $precision);
    }
}
