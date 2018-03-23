<?php


namespace Pb\MarkManagement\Infrastructure\UserInterface\Web;

use Pb\MarkManagement\Application\Command\EnterMark;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;

class MarkType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->addEventListener(FormEvents::PRE_SET_DATA, function(FormEvent $event){
            $mark = $event->getData();

            if ($mark instanceof EnterMark) {
                $form = $event->getForm();
                $form->add('value');
                $form->add('student');
                $form->add('coefficient');
                $form->add('domain');
                $form->add('label');
            }
        });
    }
}