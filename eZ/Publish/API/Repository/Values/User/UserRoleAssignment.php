<?php

/**
 * @copyright Copyright (C) Ibexa AS. All rights reserved.
 * @license For full copyright and license information view LICENSE file distributed with this source code.
 */
declare(strict_types=1);

namespace eZ\Publish\API\Repository\Values\User;

/**
 * This class represents a user to role assignment.
 *
 * @property-read \eZ\Publish\API\Repository\Values\User\User $user calls getUser()
 */
abstract class UserRoleAssignment extends RoleAssignment
{
    /**
     * Returns the user to which the role is assigned to.
     *
     * @return \eZ\Publish\API\Repository\Values\User\User
     */
    abstract public function getUser(): User;
}
