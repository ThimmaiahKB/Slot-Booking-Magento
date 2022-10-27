<?php
namespace Codilar\Project\Api\Data;

interface SlotInterface
{
    /**
     * @return mixed
     */
    public function getId();

    /**
     * @return mixed
     */
    public function getDat();

    /**
     * @return mixed
     */
    public function getSlot();

    /**
     * @param $date
     * @return mixed
     */
    public function setDat($date);

    /**
     * @param $slot
     * @return mixed
     */
    public function setSlot($slot);

}
