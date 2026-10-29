<?php

declare(strict_types=1);

namespace Netgen\TagsBundle\Core\HttpCache\ResponseTagger;

use Ibexa\Contracts\HttpCache\ResponseTagger\ResponseTagger;
use Netgen\TagsBundle\Core\HttpCache\Tagger;
use Netgen\TagsBundle\View\TagView;

final class TagViewTagger implements ResponseTagger
{
    private Tagger $tagger;
    public function __construct(Tagger $tagger)
    {
        $this->tagger = $tagger;
    }

    public function tag($value): void
    {
        if (!$value instanceof TagView) {
            return;
        }

        $this->tagger->tagByTag($value->getTag());
    }
}
