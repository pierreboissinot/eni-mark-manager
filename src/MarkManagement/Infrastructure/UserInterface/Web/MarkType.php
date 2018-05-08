<?php


namespace Pb\MarkManagement\Infrastructure\UserInterface\Web;

use Doctrine\ORM\EntityRepository;
use Pb\MarkManagement\Application\Command\EditMark;
use Pb\MarkManagement\Application\Command\EnterMark;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
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
                $form->add('subject', EntityType::class, [
                    'class' => 'Pb\MarkManagement\Domain\Subject',
                    'choice_label' => 'label',
                    'query_builder' => function(EntityRepository $repository) {
                        return $repository->createQueryBuilder('s')
                            ->orderBy('s.label', 'ASC');
                    }
                ]);
                $form->add('label');
            }

            if ($mark instanceof EditMark) {
                $form = $event->getForm();
                $form->add('value');
            }
        });
    }
}
