<?php

/**
 * @copyright Copyright (C) Ibexa AS. All rights reserved.
 * @license For full copyright and license information view LICENSE file distributed with this source code.
 */
declare(strict_types=1);

namespace eZ\Publish\Core\Persistence\Legacy\Filter\CriterionQueryBuilder\Content\Type;

use Doctrine\DBAL\Connection;
use eZ\Publish\API\Repository\Values\Content\Query\Criterion\ContentTypeId;
use eZ\Publish\SPI\Persistence\Filter\Doctrine\FilteringQueryBuilder;
use eZ\Publish\SPI\Repository\Values\Filter\FilteringCriterion;

/**
 * Content Type ID Criterion visitor query builder.
 *
 * @see \eZ\Publish\API\Repository\Values\Content\Query\Criterion\ContentTypeId
 *
 * @internal for internal use by Repository Filtering
 */
final class IdQueryBuilder extends BaseQueryBuilder
{
    public function accepts(FilteringCriterion $criterion): bool
    {
        return $criterion instanceof ContentTypeId;
    }

    public function buildQueryConstraint(
        FilteringQueryBuilder $queryBuilder,
        FilteringCriterion $criterion
    ): ?string {
        /** @var \eZ\Publish\API\Repository\Values\Content\Query\Criterion\ContentTypeIdentifier $criterion */
        parent::buildQueryConstraint($queryBuilder, $criterion);

        return $queryBuilder->expr()->in(
            'content_type.id',
            $queryBuilder->createNamedParameter(
                $criterion->value,
                Connection::PARAM_INT_ARRAY
            )
        );
    }
}
