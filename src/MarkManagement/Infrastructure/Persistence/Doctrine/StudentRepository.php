<?php

namespace Pb\MarkManagement\Infrastructure\Persistence\Doctrine;


use Doctrine\ORM\EntityManagerInterface;
use Pb\MarkManagement\Domain\StudentInterface;
use Pb\MarkManagement\Domain\StudentRepositoryInterface;
use Pb\MarkManagement\Domain\SubjectRepositoryInterface;
use Ramsey\Uuid\Uuid;

class StudentRepository implements StudentRepositoryInterface
{
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    /**
     * StudentRepository constructor.
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function get(Uuid $identifier)
    {
        // TODO: Implement get() method.
    }

    public function add(StudentInterface $student)
    {
        $this->entityManager->persist($student);
        $this->entityManager->flush();
    }

    public function remove(StudentInterface $student)
    {
        // TODO: Implement remove() method.
    }
}