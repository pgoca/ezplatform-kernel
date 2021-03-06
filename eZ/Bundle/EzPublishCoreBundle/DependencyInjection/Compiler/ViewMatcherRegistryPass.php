<?php

/**
 * @copyright Copyright (C) Ibexa AS. All rights reserved.
 * @license For full copyright and license information view LICENSE file distributed with this source code.
 */
declare(strict_types=1);

namespace eZ\Bundle\EzPublishCoreBundle\DependencyInjection\Compiler;

use eZ\Bundle\EzPublishCoreBundle\Matcher\ViewMatcherRegistry;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

/**
 * The MatcherServiceRegistryPass will register all services tagged as "ezplatform.view.matcher" to the registry.
 */
final class ViewMatcherRegistryPass implements CompilerPassInterface
{
    public const MATCHER_TAG = 'ezplatform.view.matcher';

    public function process(ContainerBuilder $container): void
    {
        if (!$container->hasDefinition(ViewMatcherRegistry::class)) {
            return;
        }

        $matcherServiceRegistry = $container->getDefinition(ViewMatcherRegistry::class);

        foreach ($container->findTaggedServiceIds(self::MATCHER_TAG) as $id => $attributes) {
            $matcherServiceRegistry->addMethodCall(
                'setMatcher',
                [
                    $id,
                    new Reference($id),
                ]
            );
        }
    }
}
