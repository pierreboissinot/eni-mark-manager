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

    public function get(string $identifier)
    {
	    return $this->entityManager->find(Student::class, $identifier);
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
