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

    public static function shortenNumber($number, $length = null)
    {
    	echo $number;
    	if (!is_null($length)) {
    		$shortened = ShortenNums::shortenNumber($number, $length);
    	}
    	$shortened = ShortenNums::shortenNumber($number);
        return $shortened;
    }

    public static function shortenThousand($number)
    {
    	$shortened = ShortenNums::shortenThousand($number);

        return $shortened;
    }

    public static function shortenTenThousand($number)
    {
        $shortened = ShortenNums::shortenTenThousand($number);

        return $shortened;
    }

    public static function shortenHandredThousand($number)
    {
        $shortened = ShortenNums::shortenHandredThousand($number);

        return $shortened;
    }

    public static function shortenMillion($number)
    {
        $shortened = ShortenNums::shortenMillion($number);

        return $shortened;
    }

    public static function shortenTenMillion($number)
    {
        $shortened = ShortenNums::shortenTenMillion($number);

        return $shortened;
    }

    public static function shortenHandredMillion($number)
    {
        $shortened = ShortenNums::shortenHandredMillion($number);

        return $shortened;
    }

    public static function shortenBillion($number)
    {
        $shortened = ShortenNums::shortenBillion($number);

        return $shortened;
    }
}
