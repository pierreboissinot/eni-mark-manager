<?php

namespace Pb\MarkManagement\Infrastructure\Persistence\Doctrine;


use Doctrine\ORM\EntityManagerInterface;
use Pb\MarkManagement\Domain\MarkInterface;
use Pb\MarkManagement\Domain\MarkRepositoryInterface;
use Ramsey\Uuid\Uuid;

class MarkRepository implements MarkRepositoryInterface
{
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @param Uuid $identifier
     * @return Mark|object
     * @throws NonExistingMark
     */
    public function get(Uuid $identifier)
    {
        $mark = $this->entityManager->find(
            Mark::class,
            $identifier->toString()
        );
        if (null === $mark) {
            throw new NonExistingMark($identifier->toString());
        }

        return $mark;
    }

    public function add(MarkInterface $mark)
    {
        $this->entityManager->persist($mark);
        $this->entityManager->flush();
    }

    public function remove(MarkInterface $mark)
    {
        $this->entityManager->remove($mark);
        $this->entityManager->flush();
    }
}