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
	// TODO:  Add method to use $value / 999 for 999-999999 to return 0.9K instead of rounded it to 1K
    /**
     * 
     * @var array Max supported numbers.
     */
    private static $tresholds = [
        'K' => '999999',
        'M' => '999999999',
        'B'	=> '999999999999',
        'T' => '999999999999000',
    ];
    /**
     * 
     * @var array
     */
    private static $formats = [
        'K'	=> 1000,
        'M'	=> 1000000,
        'B'	=> 1000000000,
        'T' => 1000000000000,
    ];

	/**
	 * Convert long number to readable Numbers 1000 => 1K
	 * 
	 * @param int|string $value This should be pass as a string for now.
	 * @param int $precision Number of number after decimal point.
	 * @return string
	 */
	public static function formatNumber($value, $precision): string
	{
		$clean_number = '';
		// Check if value is a valid integer and does not start with 0, and force user to pass value as string
		if (self::isNotValid($value))
			return self::notSupported($value);
		$suffix = '';
		foreach(self::$tresholds as $suffix => $treshold) {
			if ($value < $treshold) {
				$clean_number = $value / self::$formats[$suffix];
				break;
			}
		}
		$formated_number = number_format($clean_number,$precision);

		return (preg_match('/\d\.0$/', $formated_number)) ? rtrim(rtrim($formated_number,'0'), '.').$suffix : $formated_number.$suffix;
	}

	/**
	 * Convert 1000 => 1K, 10000 => 10K & 1000000 => 100K
	 * 
	 * @param  int|string $value
	 * @param int $precision Number of number after decimal point.
	 * @return string 	A string number formated as 1K-1.5K
	 */		
	public static function formatThousand($value, $precision): string
	{
		$range = [999, 999999];
		$suffix = 'K';
		// Check if value is a valid integer and does not start with 0, and force user to pass value as string
		self::validateRange($value, $range);

		$clean_number = $value / self::$formats[$suffix];
		$formated_number = number_format($clean_number,$precision);

		return (preg_match('/\\d\.0$/', $formated_number)) ? rtrim(rtrim($formated_number,'0'), '.').$suffix : $formated_number.$suffix;
	}

	/**
	 * Convert 1,000,000 place to 1M
	 * @param  int|string $value
	 * @param int $precision Number of number after decimal point.
	 */
	public static function formatMillion($value, $precision): string
	{
		$range = [999999, 999999999];
		$suffix = 'M';
		// Check if value is a valid integer and does not start with 0, and force user to pass value as string
		self::validateRange($value, $range);

		$clean_number = $value / self::$formats[$suffix];
		$formated_number = number_format($clean_number,$precision);

		return (preg_match('/\\d\.0$/', $formated_number)) ? rtrim(rtrim($formated_number,'0'), '.').$suffix : $formated_number.$suffix;
	}

	/**
	 * Convert 1000,000,000 place to 1B
	 * @param  int|string $value
	 * @param int $precision Number of number after decimal point.
	 */
	public static function formatBillion($value, $precision): string
	{
		$range = [999999999, 999999999999];
		$suffix = 'B';
		// Check if value is a valid integer and does not start with 0, and force user to pass value as string
		self::validateRange($value, $range);

		$clean_number = $value / self::$formats[$suffix];
		$formated_number = number_format($clean_number,$precision);

		return (preg_match('/\\d\.0$/', $formated_number)) ? rtrim(rtrim($formated_number,'0'), '.').$suffix : $formated_number.$suffix;  
	}

	/**
	 * Convert 1,000,000,000,000 place to 1T
	 * @param  int|string $value
	 * @param int $precision Number of number after decimal point.
	 */
	public static function formatTrillion($value, $precision): string
	{
		$range = [999999999999, 999999999999000];
		$suffix = 'T';
		// Check if value is a valid integer and does not start with 0, and force user to pass value as string
		self::validateRange($value, $range);

		$clean_number = $value / self::$formats[$suffix];
		$formated_number = number_format($clean_number,$precision);

		return (preg_match('/\\d\.0$/', $formated_number)) ? rtrim(rtrim($formated_number,'0'), '.').$suffix : $formated_number.$suffix; 
	}


	/**
	 * The Current value is not yet suppoerted, typically it greater than the supported values
	 * @param  int|string $value the invalid number
	 */
	private static function notSupported($value): string
	{
		if ($value < 999) {
			return $value;
		}
		else{
			return '999+T';
		}
	}

	/**
	 * Validate number
	 * @param int|string $value
	 */
	private static function isNotValid($value)
	{
		// Accept only integers and string with valid integers.
    	if (!is_int((int)$value) || !preg_match('/((?!(0\d))^[\d]+)$/i', (string)$value))
    		throw new \Exception("TypeError: $value is not a valid integer", 1);
		//  TODO:  Allow negative numbers
		if (($value < 999) || ($value > 999999999999000)) {
			return true;
		}
		return false;
	}

	/**
	 * @param int|string $value
	 * @param array $range
	 */
	private static function validateRange($value, $range)
	{
		// Accept only integers and string with valid integers.
		if (!is_int((int)$value))
			throw new \Exception("TypeError: $value is not a valid integer", 1);
		// Should not start with 0. Also check the number length
		if (!preg_match('/((?!(0\d))^[\d]+)$/i', (string)$value))
			throw new \Exception("Error: $value is not valid, value should not start with 0", 1);
		if ((int)$value < $range[0] || (int)$value > $range[1])
			throw new \Exception("Error: The provided value \"$value\" is not in the range of \"$range[0]-$range[1]\".");
	}
}
