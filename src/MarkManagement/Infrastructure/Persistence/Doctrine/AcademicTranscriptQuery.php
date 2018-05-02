<?php
declare(strict_types=1);

namespace Pb\MarkManagement\Infrastructure\Persistence\Doctrine;

use Doctrine\ORM\EntityManagerInterface;
use Pagerfanta\Adapter\DoctrineORMAdapter;
use Pagerfanta\Pagerfanta;
use Pb\MarkManagement\Domain\ReadModel\AcademicTranscript;
use Pb\MarkManagement\Domain\ReadModel\StudentList;
use Pb\MarkManagement\Domain\Student;

final class AcademicTranscriptQuery
{
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function find(string $identifier): AcademicTranscript
    {
	    $queryBuilder = $this->entityManager->createQueryBuilder()
		    ->select(
			    sprintf(
				    'NEW %s(student.lastName, student.firstName)',
				    AcademicTranscript::class
			    )
		    )
		    ->where('student.id = :identifier')
		    ->setParameters([
			    'identifier' => $identifier
		    ])
		    ->from(Student::class, 'student')
		    ->getQuery();
	    $student = $queryBuilder->getOneOrNullResult();
	    return $student;
    }
}
