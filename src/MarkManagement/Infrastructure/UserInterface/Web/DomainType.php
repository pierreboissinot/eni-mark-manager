<?php


namespace Pb\MarkManagement\Infrastructure\UserInterface\Web;

use Pb\MarkManagement\Application\Command\EnterDomain;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;

class DomainType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->addEventListener(FormEvents::PRE_SET_DATA, function(FormEvent $event){
            $mark = $event->getData();

            if ($mark instanceof EnterDomain) {
                $form = $event->getForm();
                $form->add('label');
            }
        });
    }
}