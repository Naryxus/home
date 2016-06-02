<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * RequestObject Entity.
 *
 * @property int $id
 * @property int $parent_id
 * @property \App\Model\Entity\ParentRequestObject $parent_request_object
 * @property int $lft
 * @property int $rght
 * @property string $model
 * @property int $foreign_key
 * @property \App\Model\Entity\ChildRequestObject[] $child_request_objects
 */
class RequestObject extends Entity
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
