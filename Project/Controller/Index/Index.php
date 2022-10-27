<?php

namespace Codilar\Project\Controller\Index;

use Magento\Framework\App\Action\Context;
use Magento\Customer\Model\Session;

class Index extends \Magento\Framework\App\Action\Action
{
    protected $_resultPageFactory;
    protected $_customerSession;

    public function __construct(Context $context, \Magento\Framework\View\Result\PageFactory $resultPageFactory,Session $customerSession)
    {
        $this->_customerSession = $customerSession;
        $this->_resultPageFactory = $resultPageFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $email = $this->_customerSession->getCustomer()->getEmail();
        if ($email==null) {
            $redirect = $this->resultRedirectFactory->create();
            $redirect->setPath('customer/account/login');
            return $redirect;
        }
        else {
            $resultPage = $this->_resultPageFactory->create();
            return $resultPage;
        }
    }
}
