<?php

declare(strict_types=1);

namespace Netgen\TagsBundle\Tests\View\Builder;

use Ibexa\Contracts\Core\SiteAccess\ConfigResolverInterface;
use Ibexa\Core\MVC\Symfony\View\Configurator;
use Ibexa\Core\MVC\Symfony\View\ParametersInjector;
use Netgen\TagsBundle\API\Repository\TagsService;
use Netgen\TagsBundle\API\Repository\Values\Tags\Tag;
use Netgen\TagsBundle\View\Builder\TagViewBuilder;
use Netgen\TagsBundle\View\TagView;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;

final class TagViewBuilderTest extends TestCase
{
    /**
     * The internal route /tags/id/{tagId} hands the tag ID over as a string, as every route parameter is.
     */
    public function testBuildViewLoadsTagFromStringTagId(): void
    {
        $tag = new Tag(['id' => 42]);

        $tagsService = $this->createMock(TagsService::class);
        $tagsService
            ->expects(self::once())
            ->method('loadTag')
            ->with(self::identicalTo(42))
            ->willReturn($tag);

        $authorizationChecker = $this->createMock(AuthorizationCheckerInterface::class);
        $authorizationChecker->method('isGranted')->willReturn(true);

        $configResolver = $this->createMock(ConfigResolverInterface::class);
        $configResolver->method('getParameter')->willReturn('@NetgenTags/tag/view.html.twig');

        $builder = new TagViewBuilder(
            $tagsService,
            $this->createMock(Configurator::class),
            $this->createMock(ParametersInjector::class),
            $configResolver,
            $authorizationChecker,
        );

        $view = $builder->buildView(['tagId' => '42', 'viewType' => 'full', 'layout' => true]);

        self::assertInstanceOf(TagView::class, $view);
        self::assertSame($tag, $view->getTag());
    }
}
