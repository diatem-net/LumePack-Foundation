<?php
/**
 * RoleRepository class file
 *
 * PHP Version 7.2.19
 *
 * @category Repository
 * @package  LumePack\Foundation\Data\Repositories\Auth
 * @author   KDSaltyPony <kallofdragon@gmail.com>
 * @license  https://opensource.org/licenses/gpl-3.0.html GNU Public License
 * @link     none
 */
namespace LumePack\Foundation\Data\Repositories\Auth;

use LumePack\Foundation\Data\Repositories\CRUD;

/**
 * RoleRepository
 *
 * @category Repository
 * @package  LumePack\Foundation\Data\Repositories\Auth
 * @author   KDSaltyPony <kallofdragon@gmail.com>
 * @license  https://opensource.org/licenses/gpl-3.0.html GNU Public License
 * @link     none
 */
class RoleRepository extends CRUD
{
    /**
     * The rows available as filters in the query
     *
     * @var array
     */
    protected $filters = [
        'user' => 'relation.users'
    ];

    /**
     * Call parent abstract register method.
     *
     * @inheritdoc
     * @see        parent::register()
     */
    protected function register(array $fields): bool
    {
        return $this->defaultRegister($fields);
    }
}
