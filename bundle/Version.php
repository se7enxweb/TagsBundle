<?php

namespace Netgen\TagsBundle;

/**
 * Version class for Netgen Tags Bundle
 */
class Version
{
    const VERSION_ID = 30000;
    const MAJOR_VERSION = 3;
    const MINOR_VERSION = 0;
    const RELEASE_VERSION = 0;
    const EXTRA_VERSION = '';

    const RELEASE = self::MAJOR_VERSION . '.' . self::MINOR_VERSION . '.' . self::RELEASE_VERSION . self::EXTRA_VERSION;

    public static function VERSION()
    {
        return static::RELEASE;
    }

    public static function apiVersion()
    {
        return static::RELEASE;
    }
}
