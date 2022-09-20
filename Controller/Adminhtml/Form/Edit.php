<?php

declare(strict_types=1);

namespace PortuguesePastry\Form\Controller\Adminhtml\Form;

use PortuguesePastry\Form\Controller\Adminhtml\AdminAcl;
use Magento\Backend\App\Action;
use Magento\Framework\view\Result\PageFactory;

class Edit extends Action
{
    CONST ADMIN_RESOURCE = "PortuguesePastry_Form::portuguese_pastry_form";

    protected $pageFactory;

    public function __construct(
        Action\Context $context,
        PageFactory $pageFactory
    ) {
        parent::__construct($context);
        $this->pageFactory = $pageFactory;
    }

    public function execute()
    {
        $page = $this->pageFactory->create();
        $page->getConfig()->getTitle()->set('Portuguese Pastry Form');
        return $page;
    }
}