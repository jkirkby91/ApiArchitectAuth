<?php

namespace ApiArchitect\Auth\Entities;

use ApiArchitect\Core\Abstracts\Entities\EntityAbstract;

/**
 * Class PasswordResets
 *
 * @package ApiArchitect\Entities
 * @author James Kirkby <hello@jameskirkby.com>
 */
class PasswordResets extends EntityAbstract
{

    public $nodeType;

    /**
     * PasswordResets constructor.
     */
    public function __construct()
    {
        $this->nodeType = 'PasswordReset';
    }
}