<?php

/**
 * @copyright Copyright (C) Ibexa AS. All rights reserved.
 * @license For full copyright and license information view LICENSE file distributed with this source code.
 */
declare(strict_types=1);

namespace eZ\Publish\API\Repository\Events\Section;

use eZ\Publish\API\Repository\Values\Content\Section;
use eZ\Publish\SPI\Repository\Event\AfterEvent;

final class DeleteSectionEvent extends AfterEvent
{
    /** @var \eZ\Publish\API\Repository\Values\Content\Section */
    private $section;

    public function __construct(
        Section $section
    ) {
        $this->section = $section;
    }

    public function getSection(): Section
    {
        return $this->section;
    }
}
