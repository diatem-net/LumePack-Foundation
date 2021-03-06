<?php
/**
 * Validator class file
 *
 * PHP Version 7.2.19
 *
 * @category Validator
 * @package  LumePack\Foundation\Data\Validators
 * @author   KDSaltyPony <kallofdragon@gmail.com>
 * @license  https://opensource.org/licenses/gpl-3.0.html GNU Public License
 * @link     none
 */
namespace LumePack\Foundation\Data\Validators;

use LumePack\Foundation\Services\ValidatorService;

/**
 * Validator
 *
 * @category Validator
 * @package  LumePack\Foundation\Data\Validators
 * @author   KDSaltyPony <kallofdragon@gmail.com>
 * @license  https://opensource.org/licenses/gpl-3.0.html GNU Public License
 * @link     none
 */
class Validator extends ValidatorService
{
    /**
     * The set of rules of the Validator.
     *
     * @var array
     */
    protected $rules = [];

    /**
     * The set of rules of the Validator for resource edition.
     *
     * @var array
     */
    protected $edit_rules = [];

    /**
     * Build a validation.
     *
     * @param array  $fields The fields to validate
     * @param int    $uid    The unique ID of the model (is PUT/PATCH)
     */
    public function __construct(
        array $fields, ?int $uid = null
    ) {
        $this->_setRules($uid);
        $this->_processValues($uid);

        parent::__construct($fields);
    }

    /**
     * Set the rules array.
     *
     * @param int $uid The unique ID of the model (is PUT/PATCH)
     *
     * @return void
     */
    private function _setRules(?int $uid = null): void
    {
        if (!is_null($uid) && !empty($this->edit_rules)) {
            $this->rules = $this->edit_rules;
        }
    }

    /**
     * Set variable values in rules array.
     *
     * @param int $uid The unique ID of the model (is PUT/PATCH)
     *
     * @return void
     */
    private function _processValues(?int $uid = null): void
    {
        $uid = $uid?: 'NULL';

        foreach ($this->rules as $key => $rule) {
            $this->rules[$key] = preg_replace(
                ($uid === 'NULL'? '/\"?\:ID\:\"?/': '/\:ID\:/'), $uid, $rule
            );
        }
    }
}
