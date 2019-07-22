<?php
/**
 * JBZoo SimpleTypes
 *
 * This file is part of the JBZoo CCK package.
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @package   SimpleTypes
 * @license   MIT
 * @copyright Copyright (C) JBZoo.com,  All rights reserved.
 * @link      https://github.com/JBZoo/SimpleTypes
 * @author    Denis Smetannikov <denis@jbzoo.com>
 */

namespace App\Types\Config;

use JBZoo\SimpleTypes\Config\Config as ConfigOriginal;

/**
 * class Temp
 * @package JBZoo\SimpleTypes
 */
class Density extends ConfigOriginal
{
    /**
     * Set default
     */
    public function __construct()
    {
        $this->default = 'p';
    }

    /**
     * List of rules
     * @return array
     */
    public function getRules()
    {
        $this->defaultParams['num_decimals'] = 3;

        return array(

            // Specific gravity
            'SG' => array(
                'symbol' => 'sg',
                'rate'   => function ($value, $ruleTo) {

                    if ($ruleTo === 'p') {
                        $value = (-1 * 616.868) + (1111.14 * $value) - (630.272 * ($value ** 2)) + (135.997 * ($value ** 3));
                    } else {
                        $value = 1 + ($value / (258.6 - ( ($value / 258.2) * 227.1)));
                    }

                    return $value;
                },
            ),

            // Plato Grades
            'P' => array(
                'symbol' => '°P',
                'rate'   => function ($value) {
                    return $value;
                },
                'num_decimals' => '0'
            ),
        );
    }
}
