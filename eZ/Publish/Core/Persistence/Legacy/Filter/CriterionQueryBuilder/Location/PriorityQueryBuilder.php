<?php

/**
 * @copyright Copyright (C) Ibexa AS. All rights reserved.
 * @license For full copyright and license information view LICENSE file distributed with this source code.
 */
declare(strict_types=1);

namespace eZ\Publish\Core\Persistence\Legacy\Filter\CriterionQueryBuilder\Location;

use eZ\Publish\API\Repository\Values\Content\Query\Criterion\Location;
use eZ\Publish\SPI\Persistence\Filter\Doctrine\FilteringQueryBuilder;
use eZ\Publish\SPI\Repository\Values\Filter\FilteringCriterion;

/**
 * @internal for internal use by Repository Filtering
 */
final class PriorityQueryBuilder extends BaseLocationCriterionQueryBuilder
{
    public function accepts(FilteringCriterion $criterion): bool
    {
        return $criterion instanceof Location\Priority;
    }

    /**
     * @throws \Doctrine\DBAL\DBALException
     */
    public function buildQueryConstraint(
        FilteringQueryBuilder $queryBuilder,
        FilteringCriterion $criterion
    ): ?string {
        /** @var \eZ\Publish\API\Repository\Values\Content\Query\Criterion\Location\Priority $criterion */
        parent::buildQueryConstraint($queryBuilder, $criterion);

        return $queryBuilder->buildOperatorBasedCriterionConstraint(
            'location.priority',
            $criterion->value,
            $criterion->operator
        );
    }
}
