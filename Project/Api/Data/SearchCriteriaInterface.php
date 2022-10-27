<?php

namespace Codilar\Project\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;


interface SearchCriteriaInterface extends SearchResultsInterface
{

    public function getItems();


    public function setItems(array $items);
}
