<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ControlObject Entity.
 *
 * @property int $id
 * @property int $parent_id
 * @property \App\Model\Entity\ControlObject $parent_control_object
 * @property int $lft
 * @property int $rght
 * @property string $name
 * @property \App\Model\Entity\ControlObject[] $child_control_objects
 */
class ControlObject extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false,
    ];
}
