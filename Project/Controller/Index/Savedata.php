<?php
namespace Codilar\Project\Controller\Index;



    use Magento\Framework\App\Action\Action;
    use Magento\Framework\App\Action\Context;
    use Magento\Framework\Exception\CouldNotSaveException;
    use Magento\Framework\Exception\LocalizedException;
    use Magento\Framework\Exception\NoSuchEntityException;
    use Magento\Framework\View\Result\PageFactory;
    use Magento\Framework\Api\SearchCriteriaInterface;

    use Codilar\Project\Api\SlotRepositoryInterface;
    use Codilar\Project\Api\Data\SlotInterface;

    class Savedata extends Action

    {
        protected $_pageFactory;

        protected $_slotRepository;
        protected $_slotModel;


        public function __construct(
            Context                 $context,
            PageFactory             $pageFactory,
            SlotRepositoryInterface $slotRepository,
            SlotInterface           $slotInterface

        ) {
            $this->_pageFactory = $pageFactory;
            $this->_slotRepository=$slotRepository;
            $this->_slotModel = $slotInterface;
            return parent::__construct($context);
        }

        public function execute()
        {
            $data = $this->getRequest()->getParams();

            $date = $data['datepicker'];
            $slot = $data['slot'];


            $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
            $searchCriteriaBuilder = $objectManager->create('Magento\Framework\Api\SearchCriteriaBuilder');
            $searchCriteria = $searchCriteriaBuilder->addFilter('id','%%','like')->create();
            $car = $this->_slotRepository->getList($searchCriteria);
            $item = $car->getItems();
            $count=0;
            foreach($item as $dat)
            {
               if(($data['slot']==$dat['slot']) && ($data['datepicker']==$dat['date1']))
               {
                   $count++;

               }
            }

            $slotModel = $this->_slotModel;
            $slotModel->setDat($date);
            $slotModel->setSlot($slot);
            try {
                if($count<=0) {
                    $this->_slotRepository->save($slotModel);
                    $this->messageManager->addSuccessMessage("your slot booked");
                } else
                {
                    $this->messageManager->addErrorMessage(__("Slot already booked"));
                }
                } catch (CouldNotSaveException $e) {
                    $this->messageManager->addErrorMessage(__("Error saving data"));
                }

                $redirect = $this->resultRedirectFactory->create();
            $redirect->setPath('project');
            return $redirect;

        }
    }
