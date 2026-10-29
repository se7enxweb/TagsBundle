<?php

declare(strict_types=1);

namespace Netgen\TagsBundle\API\Repository\Values\Content\Query\Criterion\Value;

use Ibexa\Contracts\Core\Repository\Values\Content\Query\Criterion\Value;

/**
 * Struct that stores extra value information for a TagKeyword criterion object.
 */
final class TagKeywordValue extends Value
{
    /**
     * @var string[]|null
     */
    public ?array $languages = null;
    /**
     * @var bool
     */
    public bool $useAlwaysAvailable = true;
    /**
     * @param string[]|null $languages One or more languages to match in. If empty, Criterion will match in all available languages.
     * @param bool $useAlwaysAvailable whether to use always available flag in addition to provided languages
     */
    public function __construct(?array $languages = null, bool $useAlwaysAvailable = true)
    {
        $this->languages = $languages;
        $this->useAlwaysAvailable = $useAlwaysAvailable;
    }
}
