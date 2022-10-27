<?php
namespace Codilar\Project\Api;

use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Exception\NoSuchEntityException;
use Codilar\Project\Api\Data\SlotInterface;
use Magento\Framework\Api\SearchCriteriaInterface;


interface SlotRepositoryInterface
{

    public function save(SlotInterface $timeslot);

    public function getList(SearchCriteriaInterface $criteria);

    public function delete(SlotInterface $id);

    public function deleteById($id);


    // public function getById($id);


}
