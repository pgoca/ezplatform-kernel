<?php

/**
 * @copyright Copyright (C) Ibexa AS. All rights reserved.
 * @license For full copyright and license information view LICENSE file distributed with this source code.
 */
declare(strict_types=1);

namespace eZ\Publish\API\Repository\Events\Content;

use eZ\Publish\API\Repository\Values\Content\ContentInfo;
use eZ\Publish\SPI\Repository\Event\BeforeEvent;

final class BeforeHideContentEvent extends BeforeEvent
{
    /** @var \eZ\Publish\API\Repository\Values\Content\ContentInfo */
    private $contentInfo;

    public function __construct(ContentInfo $contentInfo)
    {
        $this->contentInfo = $contentInfo;
    }

    public function getContentInfo(): ContentInfo
    {
        return $this->contentInfo;
    }
}
