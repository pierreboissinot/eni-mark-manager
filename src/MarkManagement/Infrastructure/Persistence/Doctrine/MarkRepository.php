<?php

namespace Pb\MarkManagement\Infrastructure\Persistence\Doctrine;


use Doctrine\ORM\EntityManagerInterface;
use Pb\MarkManagement\Domain\Exception\NonExistingMark;
use Pb\MarkManagement\Domain\Mark;
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
     * @param string $identifier
     * @return Mark|object
     * @throws NonExistingMark
     */
    public function get(string $identifier)
    {
        $mark = $this->entityManager->find(
            Mark::class,
            $identifier
        );
        if (null === $mark) {
            throw new NonExistingMark($identifier);
        }

        return $mark;
    }

    public function add(MarkInterface $mark)
    {
        $this->entityManager->persist($mark);
        $this->entityManager->flush();
    }

    public function edit(MarkInterface $mark)
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
