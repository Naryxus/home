<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
/**
 * Created by PhpStorm.
 * User: Naryxus
 * Date: 18.05.2016
 * Time: 00:37
 *
 * Control Object Entity
 *
 * @property int $id
 * @property int $lft
 * @property int $rgt
 * @property string $key
 */
class ControlObject extends Entity {

	protected $_accessible = [
		'lft' => true,
		'rgt' => true,
		'key' => true
	];

	
}
?>