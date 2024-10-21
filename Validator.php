<?php

class Validator {
	public static function string($value, $min = 1, $max = PHP_INT_MAX) {
		$len = strlen(trim($value));
		return $len >= $min && $len <= $max;
	}

	public static function integer($value, $min = PHP_INT_MIN, $max = PHP_INT_MAX) {
		$options = ["options" => ["min_range" => $min, "max_range" => $max]];
		return filter_var($value, FILTER_VALIDATE_INT, $options) !== false;
	}

	public static function decimal($value, $min, $max) {
		$options = ["options" => ["min_range" => 0]];
		if (filter_var($value, FILTER_VALIDATE_FLOAT, $options) === false)
			return false;

		$frac = explode(".", $value)[1] ?? ""; // Extract fractional part from number
		$len = strlen($frac);
		return $len >= $min && $len <= $max;
	}
}
