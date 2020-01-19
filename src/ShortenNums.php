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
	private static $thousand_format;
	private static $million_format;
	private static $billion_format;
	private static $trillion_format;
	// TODO:  Add method to use $value / 999 for 999-999999 to return 0.9K instead of rounded it to 1K

	/**
	 * Convert long number to readable Numbers 1000 => 1K
	 * 
	 * @param string $value This should be pass as a string for now.
	 * @param int $precision Number of number after decimal point.
	 * @return string
	 */
	public static function formatNumber($value, $precision): string
	{
		/**
    	 * The length of the provided number if length was not set.
    	 * @var int
    	 */
        $number_length = strlen((string)$value);

        /**
	     * @var string $formated_number The formated_number value.
	     */
	    $formated_number;

	    self::validateNumber($value);
	    
		switch ($number_length) {
			case 4:
			case 5:
			case 6:
				$formated_number = self::formatThousand($value, $precision);
				break;
			case 7:
			case 8:
			case 9:
				$formated_number = self::formatMillion($value, $precision);
				break;
			case 10:
			case 11:
			case 12:
				$formated_number = self::formatBillion($value, $precision);
				break;
			case 13:
			case 14:
			case 15:
				$formated_number = self::formatTrillion($value, $precision);
				break;
			default:
				$formated_number = self::notSupported($value);
				break;
		}
		return $formated_number;
	}

	/**
	 * Convert 1000 => 1K, 10000 => 10K & 1000000 => 100K
	 * 
	 * @param  int/string $number
	 * @param int $precision Number of number after decimal point.
	 * @return string 	A string number formated as 1K-1.5K
	 */		
	public static function formatThousand($value, $precision): string
	{
		$format = 1000; // If you dont wnat 0.9k but straight 1k for 999
		// $treshold2 = 999; // If you want 0.9k for 999
		$range = [999, 999999];
		$suffix = 'K';
		// Check if value is a valid integer and does not start with 0, and force user to pass value as string
		self::validateNumber($value);
		self::validateRange($value, $range);

		//if (isset(self::$thousand_format))
		//	$clean_number = $value / self::$thousand_format;
		$clean_number = $value / $format;
		// Round and format number
		$formated_number = number_format($clean_number,$precision);

		return (preg_match('/\\d\.0$/', $formated_number)) ? rtrim(rtrim($formated_number,'0'), '.').$suffix : $formated_number.$suffix;
	}

	/**
	 * Convert 1,000,000 place to 1M
	 * @param  string $number
	 * @param int $precision Number of number after decimal point.
	 * @return string 	A string number formated as 1M-1.5M
	 */
	public static function formatMillion($value, $precision): string
	{
		$format = 1000000; // If you dont wnat 0.9M but straight 1k for 999.999
		// $treshold2 = 999; // If you want 0.9M for 999999
		$range = [999999, 999999999];
		$suffix = 'M';
		// Check if value is a valid integer and does not start with 0, and force user to pass value as string
		self::validateNumber($value);
		self::validateRange($value, $range);

		//if (isset(self::$million_format))
		//	$clean_number = $value / self::$million_format;
		$clean_number = $value / $format;
		// Round and format number
		$formated_number = number_format($clean_number,$precision);

		return (preg_match('/\\d\.0$/', $formated_number)) ? rtrim(rtrim($formated_number,'0'), '.').$suffix : $formated_number.$suffix;
	}

	/**
	 * Convert 1000,000,000 place to 1B
	 * @param  string $number
	 * @param int $precision Number of number after decimal point.
	 * @return string 	A string number formated as 1B-1.5B
	 */
	public static function formatBillion($value, $precision): string
	{
		$format = 1000000000;
		// $treshold2 = 999999999; 
		$range = [999999999, 999999999999];
		$suffix = 'B';
		// Check if value is a valid integer and does not start with 0, and force user to pass value as string
		self::validateNumber($value);
		self::validateRange($value, $range);

		//if (isset(self::$billion_format))
		//	$clean_number = $value / self::$billion_format;
		$clean_number = $value / $format;
		// Round and format number
		$formated_number = number_format($clean_number,$precision);

		return (preg_match('/\\d\.0$/', $formated_number)) ? rtrim(rtrim($formated_number,'0'), '.').$suffix : $formated_number.$suffix;  
	}

	/**
	 * Convert 1,000,000,000,000 place to 1T
	 * @param  string $number
	 * @param int $precision Number of number after decimal point.
	 * @return string 	A string number formated as 1B-1.5B
	 */
	public static function formatTrillion($value, $precision): string
	{
		$format = 1000000000000;
		// $treshold2 = 999999999999; 
		$range = [999999999999, 999999999999000];
		$suffix = 'T';
		// Check if value is a valid integer and does not start with 0, and force user to pass value as string
		self::validateNumber($value);
		self::validateRange($value, $range);

		//if (isset(self::$trillion_format))
		//	$clean_number = $value / self::$trillion_format;
		$clean_number = $value / $format;
		// Round and format number
		$formated_number = number_format($clean_number,$precision);

		return (preg_match('/\\d\.0$/', $formated_number)) ? rtrim(rtrim($formated_number,'0'), '.').$suffix : $formated_number.$suffix; 
	}


	/**
	 * The Current value is not yet suppoerted, typically it greater than the supported values
	 * @param  string $number the invalid number
	 * @return string
	 */
	private static function notSupported($number): string
	{
	    return 'Sorry ' . $number . ' is not Supported!';
	}

	/**
	 * [validateNumber description]
	 * @param  [type] $number [description]
	 * @return [type]         [description]
	 */
	private static function validateNumber($number)
	{
		// Tis temporary enforce that the pass value should be pass as string of an integer instead non quoted integer example: '1000' is valid, 1000 is not.
		if (!is_string($number))
			throw new \Exception("TypeError: $number should be pass as quoted string to avoid unespected result.", 1);
		// Accept only integers and string with valid integers.
    	if (!is_int((int)$number))
    		throw new \Exception("TypeError: $number is not a valid integer", 1);
    	// Should not start with 0. Also check the number length
    	if (!preg_match('/((?!(0))^[\d]+)$/i', (string)$number))
    		throw new \Exception("Error: $number is not valid, value should not start with 0", 1);
    	// Invalid number TODO:  Allow negative numbers
	}

	private static function validateRange($number, $range)
	{
		if ((int)$number < $range[0] || (int)$number > $range[1])
			throw new \Exception("Error: The provided value \"$number\" is not in the range of \"$range[0]-$range[1]\".");
	}
}
