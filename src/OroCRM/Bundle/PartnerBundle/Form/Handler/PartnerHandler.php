<?php

namespace OroCRM\Bundle\PartnerBundle\Form\Handler;

use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;

use Doctrine\Common\Persistence\ObjectManager;

use Oro\Bundle\SoapBundle\Form\Handler\ApiFormHandler;

class PartnerHandler extends ApiFormHandler
{
    /**
     * @var FormInterface
     */
    protected $form;

    /**
     * @var Request
     */
    protected $request;

    /**
     * @var ObjectManager
     */
    protected $manager;

    /**
     *
     * @param FormInterface $form
     * @param Request       $request
     * @param ObjectManager $manager
     */
    public function __construct(FormInterface $form, Request $request, ObjectManager $manager)
    {
        $this->form    = $form;
        $this->request = $request;
        $this->manager = $manager;
    }

    /**
     * "Success" form handler
     *
     * @param mixed $entity
     */
    protected function onSuccess($entity)
    {
        $this->manager->persist($entity);
        $this->manager->flush($entity);
    }
}