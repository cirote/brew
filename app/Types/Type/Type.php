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

namespace App\Types\Type;

use JBZoo\SimpleTypes\Config\Config;
use JBZoo\SimpleTypes\Exception;
use JBZoo\SimpleTypes\Formatter;
use JBZoo\SimpleTypes\Parser;
use JBZoo\SimpleTypes\Type\Type as TypeOriginal;

/**
 * Class Type
 * @package JBZoo\SimpleTypes
 */
class Type extends TypeOriginal
{
    public function __construct($value = null, Config $config = null)
    {
        $this->_type = strtolower(str_replace(__NAMESPACE__ . '\\', '', get_class($this)));

        // get custom or global config
        $config = $this->_getConfig($config);

        // debug flag (for logging)
        $this->_isDebug = (bool)$config->isDebug;

        // set default rule
        $this->_default = trim(strtolower($config->default));
        !$this->_default && $this->error('Default rule cannot be empty!');

        // create formatter helper
        $this->_formatter = new Formatter($config->getRules(), $config->defaultParams, $this->_type);
        // check that default rule
        $rules = $this->_formatter->getList(true);
        if (!array_key_exists($this->_default, $rules)) {
            throw new Exception($this->_type . ': Default rule not found!');
        }

        // create parser helper
        $this->_parser = new Parser($this->_default, $rules);

        // parse data
        list($this->_value, $this->_rule) = $this->_parser->parse($value);

        // count unique id
        self::$_counter++;
        $this->_uniqueId = self::$_counter;

        // success log
        $this->log('Id=' . $this->_uniqueId . ' has just created; dump="' . $this->dump(false) . '"');
    }

}
