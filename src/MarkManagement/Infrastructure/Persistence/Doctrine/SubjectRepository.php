<?php

namespace Pb\MarkManagement\Infrastructure\Persistence\Doctrine;


use Doctrine\ORM\EntityManagerInterface;
use Pb\MarkManagement\Domain\StudentInterface;
use Pb\MarkManagement\Domain\SubjectRepositoryInterface;

class SubjectRepository implements SubjectRepositoryInterface
{
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function list()
    {
        $subjects = $this->entityManager->createQueryBuilder()
            ->select('subject')
            ->getQuery()
            ->getResult();

        return $subjects;
    }
}