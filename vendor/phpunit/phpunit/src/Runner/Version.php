<?php
/*
 * This file is part of PHPUnit.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use SebastianBergmann\Version;

/**
 * This class defines the current version of PHPUnit.
 */
class PHPUnit_Runner_Version
{
    private static $pharVersion;
    private static $version;

    /**
     * Returns the current version of PHPUnit.
     *
     * @return string
     */
    public static function id()
    {
        if (self::$pharVersion !== null) {
            return self::$pharVersion;
        }

        if (self::$version === null) {
<<<<<<< HEAD
            $version       = new Version('5.7.20', dirname(dirname(__DIR__)));
=======
            $version       = new Version('5.7.21', dirname(dirname(__DIR__)));
>>>>>>> 2a24286d4af4b85133ad7c96a0b36855a1b31b73
            self::$version = $version->getVersion();
        }

        return self::$version;
    }

    /**
     * @return string
     */
    public static function series()
    {
        if (strpos(self::id(), '-')) {
            $version = explode('-', self::id())[0];
        } else {
            $version = self::id();
        }

        return implode('.', array_slice(explode('.', $version), 0, 2));
    }

    /**
     * @return string
     */
    public static function getVersionString()
    {
        return 'PHPUnit ' . self::id() . ' by Sebastian Bergmann and contributors.';
    }

    /**
     * @return string
     */
    public static function getReleaseChannel()
    {
        if (strpos(self::$pharVersion, '-') !== false) {
            return '-nightly';
        }

        return '';
    }
}
