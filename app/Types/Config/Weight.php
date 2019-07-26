<?php

namespace App\Types\Config;

use JBZoo\SimpleTypes\Config\Config;

/**
 * class Weight
 * @package JBZoo\SimpleTypes
 */
class Weight extends Config
{
	/**
	 * Set default
	 */
	public function __construct()
	{
		$this->default = 'g';
	}

	/**
	 * List of rules
	 * @return array
	 */
	public function getRules()
	{
		return array(
			// SI
			'g'   => array(
				'symbol' => 'g',
				'rate'   => 1,
			),
			'kg'  => array(
				'symbol' => 'Kg',
				'rate'   => 1000,
			),
			'ton' => array(
				'symbol' => 'Tons',
				'rate'   => 1000000,
			),

			// other
			'gr'  => array(
				'symbol' => 'Gr',
				'rate'   => 0.06479891,
			),
			'dr'  => array(
				'symbol' => 'Dr',
				'rate'   => 1.7718451953125,
			),
			'oz'  => array(
				'symbol' => 'Oz',
				'rate'   => 28.349523125,
			),
			'lb'  => array(
				'symbol' => 'Lb',
				'rate'   => 453.59237,
			),
		);

	}
}
