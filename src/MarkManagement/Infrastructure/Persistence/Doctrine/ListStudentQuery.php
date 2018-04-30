<?php
declare(strict_types=1);

namespace Pb\MarkManagement\Infrastructure\Persistence\Doctrine;

use Doctrine\ORM\EntityManagerInterface;
use Pagerfanta\Adapter\DoctrineORMAdapter;
use Pagerfanta\Pagerfanta;
use Pb\MarkManagement\Domain\ReadModel\StudentList;
use Pb\MarkManagement\Domain\Student;

final class ListStudentQuery
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
     * @inheritdoc
     */
    public function findAll(int $page = 1, int $limit = 10): Pagerfanta
    {
        $queryBuilder = $this->entityManager->createQueryBuilder()
            ->select(
                sprintf(
            'NEW %s(student.id, student.lastName, student.firstName)',
            StudentList::class
                )
            )
        ->from(Student::class, 'student')
        ->getQuery();
        $students = new PagerFanta(new DoctrineORMAdapter($queryBuilder, true, false));
        $students->setCurrentPage($page);
        $students->setMaxPerPage($limit);
        return $students;
    }
}
