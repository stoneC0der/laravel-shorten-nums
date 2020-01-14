<?php

namespace Stonec0der\ShortenNums;

/**
 *
 * ShortenNums Class
 *
 * Created 14/01/2020
 * Author: Cedric Megnie N. (Stonec0der).
 * Email: stonec0dersoft@gmail.com
 *
 * This Class function is to shorten some number and return shorter form
 * It convert 1000 to 1k, 10000 to 10K, 1050 to 1k and 10500 to 10.5k
 * You can shorten from 1000 up to 1000000000000 => 1B (1 billion).
 *
 * Licence: MIT
 */
class ShortenNums
{
    // Build your next great package.
    public static function shortenNumber($number, $length = null)
	{
		/**
    	 * The length of the provided number if length was not set.
    	 * @var int
    	 */
        $number_length = strlen((string)$number);

        /**
	     * @var string $shortened The shortened value.
	     */
	    $shortened;

	    self::validateNumber($number);
	    self::validateLength($length, $number, $number_length);
	    
	    if (!is_null($length)) 
	    {
	    	switch ($length) {
	    		case 4:
	    			$shortened = self::shortenThousand($number);
	    			break;
	    		case 5:
	    			$shortened = self::shortenThenThousand($number);
	    			break;
	    		case 6:
	    			$shortened = self::shortenHandredThousand($number);
	    			break;
	    		case 7:
	    			$shortened = self::shortenMillion($number);
	    			break;
	    		case 8:
	    			$shortened = self::shortenTenMillion($number);
	    			break;
	    		case 9:
	    			$shortened = self::shortenHandredMillion($number);
	    			break;
	    		case 10:
	    			$shortened = self::shortenBillion($number);
	    			break;
	    	    default:
	    			$shortened = self::notSupported($number);
	    			break;
	    	}
	    	return $shortened;
	    } 
	    else 
	    {
	        switch ($number_length) {
	    		case 4:
	    			$shortened = self::shortenThousand($number);
	    			break;
	    		case 5:
	    			$shortened = self::shortenThenThousand($number);
	    			break;
	    		case 6:
	    			$shortened = self::shortenHandredThousand($number);
	    			break;
	    		case 7:
	    			$shortened = self::shortenMillion($number);
	    			break;
	    		case 8:
	    			$shortened = self::shortenTenMillion($number);
	    			break;
	    		case 9:
	    			$shortened = self::shortenHandredMillion($number);
	    			break;
	    		case 10:
	    			$shortened = self::shortenBillion($number);
	    			break;
	    		default:
	    			$shortened = self::notSupported($number);
	    			break;
	    	}
	    	return $shortened;
	    }
	}

	/**
	 * Convert 1,000 place to 1K
	 * @param  int/string $number
	 * @return string 	A string number formated as 1K-1.5K
	 */		
	public static function shortenThousand($number)
	{
		$length = 4;

		self::validateNumber($number);
		self::checkLength($number, $length);
		// Number to return shortened
	    $leading_number = substr((string)$number, ($length - 4), ($length - 3));
        // Number excluded/hide, also use to determine if what contains other than integer than 0.
        $others = substr((string)$number, ($length - 3), ($length));
        
        if ($others === "000") {
            return $leading_number.'K';
        }
        else {
            // Alternate form of shortened number 1.5K
            $alt_leading_number = substr((string)$number, ($length - 4), ($length - 2));
            // Array of excluded number
            $arr = str_split($alt_leading_number);
            // If the remaining number as this format 1.0K transform it to 1K if the remaining number were 090 for 1090 => 1.0 as the reaming number dosent contains only 0s.
            // Remove 0 in 9.0K
            return (preg_match('/\.0K$/', $arr[0].'.'.$arr[1].'K')) ? $arr[0].'K' : $arr[0].'.'.$arr[1].'K';
        }
	}

	/**
	 * Convert 10,000 place to 10K
	 * @param  int/string $number
	 * @return string 	A string number formated as 10K-10.5K
	 */
	public static function shortenTenThousand($number)
	{
		$length = 5;

		self::validateNumber($number);
		self::checkLength($number, $length);
		// Number to return shortened
	    $leading_number = substr((string)$number, ($length - 5), ($length - 3));
        // Number excluded/hide, also use to determine if what contains other than integer than 0.
        $others = substr((string)$number, ($length - 3), ($length));

        if ($others === "000") {
            
            return $leading_number.'K';
        }
        else {
            // Alternate form of shortened number 1.5K
            $alt_leading_number = substr((string)$number, ($length - 5), ($length - 2)); 
            // Array of excluded number
            $arr = str_split($alt_leading_number);
            // If the remaining number as this format 1.0K transform it to 1K if the remaining number were 090 for 1090 => 1.0 as the reaming number dosent contains only 0s.
            return (preg_match('/\.0K$/', $arr[0].$arr[1].'.'.$arr[2].'K')) ? $arr[0].$arr[1].'K' : $arr[0].$arr[1].'.'.$arr[2].'K';
        }
	}

	/**
	 * Convert 100,000 place to 100K
	 * @param  int/string $number
	 * @return string 	A string number formated as 100K-100.5K
	 */
	public static function shortenHandredThousand($number)
	{
		$length = 6;

		self::validateNumber($number);
		self::checkLength($number, $length);
		// Number to return shortened
	    $leading_number = substr((string)$number, ($length - 6), ($length - 3));
        // Number excluded/hide, also use to determine if what contains other than integer than 0.
        $others = substr((string)$number, ($length - 3), ($length));

        if ($others === "000") {
            
            return $leading_number.'K';
        }
        else {
            // Alternate form of shortened number 1.5K
            $alt_leading_number = substr((string)$number, ($length - 6), ($length - 2)); 
            // Array of excluded number
            $arr = str_split($alt_leading_number);
            // If the remaining number as this format 1.0K transform it to 1K if the remaining number were 090 for 1090 => 1.0 as the reaming number dosent contains only 0s.
            return (preg_match('/\.0K$/', $arr[0].$arr[1].$arr[2].'.'.$arr[3].'K')) ? $arr[0].$arr[1].$arr[2].'K' : $arr[0].$arr[1].$arr[2].'.'.$arr[3].'K';
        }
	}

	/**
	 * Convert 1,000,000 place to 1M
	 * @param  int/string $number
	 * @return string 	A string number formated as 1M-1.5M
	 */
	public static function shortenMillion($number)
	{
		$length = 7;

		self::validateNumber($number);
		self::checkLength($number, $length);
		// Number to return shortened
	    $leading_number = substr((string)$number, ($length - 7), ($length - 6));
        // Number excluded/hide, also use to determine if what contains other than integer than 0.
        $others = substr((string)$number, ($length - 6), ($length));
        if ($others === "000000") {
            
            return $leading_number.'M';
        }
        else {
            // Alternate form of shortened number 1.5K
            $alt_leading_number = substr((string)$number, ($length - 7), ($length - 3)); 
            // Array of excluded number
            $arr = str_split($alt_leading_number);
            // If the remaining number as this format 1.0K transform it to 1K if the remaining number were 090 for 1090 => 1.0 as the reaming number dosent contains only 0s.
            return (preg_match('/\.0M$/', $arr[0].'.'.$arr[1].'M')) ? $arr[0].'M' : $arr[0].'.'.$arr[1].'M';
        }
	}

	/**
	 * Convert 10,000,000 place to 10M
	 * @param  int/string $number
	 * @return string 	A string number formated as 10M-10.5M
	 */
	public static function shortenTenMillion($number)
	{
	    $length = 8;

	    self::validateNumber($number);
		self::checkLength($number, $length);
		// Number to return shortened
	    $leading_number = substr((string)$number, ($length - 8), ($length - 6));
        // Number excluded/hide, also use to determine if what contains other than integer than 0.
        $others = substr((string)$number, ($length - 6), ($length));
        if ($others === "000000") {
            
            return $leading_number.'M';
        }
        else {
            // Alternate form of shortened number 1.5K
            $alt_leading_number = substr((string)$number, ($length - 8), ($length - 5)); 
            // Array of excluded number
            $arr = str_split($alt_leading_number);
            // If the remaining number as this format 1.0K transform it to 1K if the remaining number were 090 for 1090 => 1.0 as the reaming number dosent contains only 0s.
            return (preg_match('/\.0M$/', $arr[0].$arr[1].'.'.$arr[2].'M')) ? $arr[0].$arr[1].'M' : $arr[0].$arr[1].'.'.$arr[2].'M';
        }
	}

	/**
	 * Convert 100,000,000 place to 100M
	 * @param  int/string $number
	 * @return string 	A string number formated as 100M-100.5M
	 */
	public static function shortenHandredMillion($number)
	{
	    // 105,000,000
		$length = 9;

		self::validateNumber($number);
		self::checkLength($number, $length);
		// Number to return shortened
	    $leading_number = substr((string)$number, ($length - 9), ($length - 6));
        // Number excluded/hide, also use to determine if what contains other than integer than 0.
        $others = substr((string)$number, ($length - 5), ($length));
        if ($others === "000000") {
            
            return $leading_number.'M';
        }
        else {
            // Alternate form of shortened number 1.5K
            $alt_leading_number = substr((string)$number, ($length - 9), ($length - 5)); 
            // Array of excluded number
            $arr = str_split($alt_leading_number);
            // If the remaining number as this format 1.0K transform it to 1K if the remaining number were 090 for 1090 => 1.0 as the reaming number dosent contains only 0s.
            return (preg_match('/\.0M$/', $arr[0].$arr[1].$arr[2].'.'.$arr[3].'M')) ? $arr[0].$arr[1].$arr[2].'M' : $arr[0].$arr[1].$arr[2].'.'.$arr[3].'M';
        }
	}

	/**
	 * Convert 1000,000,000 place to 1B
	 * @param  int/string $number
	 * @return string 	A string number formated as 1B-1.5B
	 */
	public static function shortenBillion($number)
	{
		// 1050,000,000
		$length = 10;

		self::validateNumber($number);
		self::checkLength($number, $length);
		// Number to return shortened
	    $leading_number = substr((string)$number, ($length - 10), ($length - 9));
        // Number excluded/hide, also use to determine if what contains other than integer than 0.
        $others = substr((string)$number, ($length - 9), ($length));
        if ($others === "000000000") {
            
            return $leading_number.'B';
        }
        else {
            // Alternate form of shortened number 1.5K
            $alt_leading_number = substr((string)$number, ($length - 10), ($length - 8)); 
            // Array of excluded number
            $arr = str_split($alt_leading_number);
            // If the remaining number as this format 1.0K transform it to 1K if the remaining number were 090 for 1090 => 1.0 as the reaming number dosent contains only 0s.
            return (preg_match('/\.0B$/', $arr[0].'.'.$arr[1].'B')) ? $arr[0].'B' : $arr[0].'.'.$arr[1].'B';
        }   
	}

	/**
	 * Convert 10,000,000,000 place to 10B
	 * @param  int/string $number
	 * @return string 	A string number formated as 10B-10.5B
	 */
	public static function shortenTenBillion($number)
	{
	    
	}

	/**
	 * Convert 100,000,000,000 place to 100B
	 * @param  int/string $number
	 * @return string 	A string number formated as 100B-100.5B
	 */
	public static function shortenHandredBillion($number)
	{
	    
	}

	/**
	 * Convert 1,000,000,000,000 place to 1T
	 * @param  int/string $number
	 * @return string 	A string number formated as 1B-1.5B
	 */
	public static function shortenTrillion($number)
	{
	    
	}

	/**
	 * Convert 10,000,000,000,000 place to 10B
	 * @param  int/string $number
	 * @return string 	A string number formated as 10B-10.5B
	 */
	public static function shortenTenTrillion($number)
	{
	    
	}

	/**
	 * Convert 100,000,000,000,000 place to 1B
	 * @param  int/string $number
	 * @return string 	A string number formated as 1B-1.5B
	 */
	public static function shortenHandredTrillion($number)
	{
	    
	}


	/**
	 * The Current value is not yet suppoerted, typically it greater than the supported values
	 * @param  string $number the invalid number
	 * @return string
	 */
	protected static function notSupported($number)
	{
	    echo 'Sorry ' . $number . ' is not Yet Supported!';
	}

	/**
	 * [validateNumber description]
	 * @param  [type] $number [description]
	 * @return [type]         [description]
	 */
	protected static function validateNumber($number)
	{
		// Tis temporary enforce that the pass value should be pass as string of an integer instead non quoted integer example: '1000' is valid, 1000 is not.
		
		if (!is_string($number))
			throw new \Exception("TypeError: $number should be pass as quoted string to avoid unespected result.", 1);
		// Accept only integers and string with valid integers.
    	if (!is_int((int)$number))
    		throw new \Exception("TypeError: $number is not a valid integer", 1);
    	// Should not start with 0.
    	if (!preg_match('/((?!(0))^[\d]{1,10})$/i', (string)$number))
    		throw new \Exception("Error: $number is not valid, value should not start with 0", 1);
    	// length match $number lenght
	}

	protected static function validateLength($length, $number, $number_length)
	{
	    if (isset($length) && $length != $number_length)
	    	throw new \Exception("Error: The provided length=\"$length\" does not match the number=\"$number\" length.");
    	// Value start from one thousand (1000) & below one billion.
    	// Will add up to hundred trillion in future.
	    if (isset($length) && ($length < 4 || $length > 10))
	        throw new \Exception("Error: The provide lenght=$length is not a supported values, we can only shorten values with length 4-10 / 1K-1B");
	}

	protected static function checkLength($number, $length)
	{
		$number_length = strlen((string)$number);
		if ($length != $number_length)
			throw new \Exception("Error: The provided length=\"$length\" does not match the number=\"$number\" length.");
	}
}
