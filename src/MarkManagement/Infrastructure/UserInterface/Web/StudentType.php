<?php


namespace Pb\MarkManagement\Infrastructure\UserInterface\Web;

use Pb\MarkManagement\Application\Command\EnterStudent;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;

class StudentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->addEventListener(FormEvents::PRE_SET_DATA, function(FormEvent $event){
            $student = $event->getData();

            if ($student instanceof EnterStudent) {
                $form = $event->getForm();
                $form->add('lastName');
                $form->add('firstName');
            }
        });
    }
}