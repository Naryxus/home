<?php
namespace App\Model\Entity;

use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\Entity;

/**
 * User Entity
 *
 * @property int $id
 * @property string $username
 * @property string $password
 */
class User extends Entity {

	/**
	 * Fields that can be mass assigned using newEntity() or patchEntity().
	 *
	 * @var array
	 */
	protected $_accessible = [
		'username' => true
	];

	/**
	 * Fields that are excluded from JSON an array versions of the entity.
	 *
	 * @var array
	 */
	protected $_hidden = [
		'password'
	];

	protected function _setPassword($value) {
		$hasher = new DefaultPasswordHasher();
		return $hasher->hash($value);
	}
}
?>