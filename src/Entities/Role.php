<?php

namespace ApiArchitect\Auth\Entities;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use ApiArchitect\Core\Abstracts\Entities\EntityAbstract;
use LaravelDoctrine\ACL\Contracts\Role as RoleContract;

/**
 * Class Role
 *
 * @package ApiArchitect\Entities
 * @author James Kirkby <me@jameskirkby.com>
 *
 * @ORM\Entity
 * @ORM\Table(name="role", indexes={@ORM\Index(name="search_idx", columns={"name"})})
 * @ORM\Entity(repositoryClass="ApiArchitect\Repositories\User\RoleRepository")
 */
class Role extends EntityAbstract implements RoleContract
{

    public $nodeType;

    /**
     * Role constructor.
     */
    public function __construct()
    {
        $this->nodeType = 'Role';
    }

    /**
     * @Gedmo\Versioned
     * @Gedmo\Blameable(on="create")
     * @Gedmo\IpTraceable(on="create")
     * @ORM\Column(type="string", length=45, nullable=true)
     */
    protected $name;

    /**
     * @Gedmo\Versioned
     * @Gedmo\Blameable(on="create")
     * @Gedmo\IpTraceable(on="create")
     * @ORM\Column(type="string", length=45, nullable=true)
     */
    protected $permission;

    /**
     * @return mixed
     */
    public function getPermissions()
    {
        return $this->permission;
    }

    /**
     * @param string $permission
     * @return $this
     */
    public function hasPermissionTo($permission)
    {
        $this->permission = $permission;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }
}