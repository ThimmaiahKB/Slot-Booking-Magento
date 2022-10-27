<?php

namespace Codilar\Project\Model;

use Magento\Framework\Model\AbstractModel;
use Codilar\Project\Model\ResourceModel\Slot as ResourceModel;
use Codilar\Project\Api\Data\SlotInterface;
use Magento\Framework\DataObject\IdentityInterface;

class Slot extends AbstractModel implements SlotInterface, IdentityInterface
{
    const CACHE_TAG = 'timeslot_table';

    protected function _construct()
    {
        $this->_init(ResourceModel::class);
    }
    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }
    public function getId()
    {
        return $this->getData('id');
    }
    public function getDat()
    {
        return $this->getData('date1');
    }
    public function getSlot()
    {
        return $this->getData('slot');
    }


    public function setDat($date)
    {
        return $this->setData('date1', $date);
    }

    public function setSlot($slot)
    {
        return $this->setData('slot', $slot);
    }


}
