<?php
declare(strict_types=1);

namespace Pb\MarkManagement\Infrastructure\Persistence\Doctrine;

use Doctrine\ORM\EntityManagerInterface;
use Pagerfanta\Adapter\DoctrineORMAdapter;
use Pagerfanta\Pagerfanta;
use Pb\MarkManagement\Domain\Mark;
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
				    'NEW %s(mark, student.lastName, student.firstName)',
				    AcademicTranscript::class
			    )
		    )
		    ->where('student.id = :identifier')
		    ->setParameters([
			    'identifier' => $identifier
		    ])
		    ->from(Mark::class, 'mark')
		    ->leftJoin('mark.student', 'student')
		    ->getQuery();
	    $student = $queryBuilder->getOneOrNullResult();
	    dump($student);die();
	    return $student;
    }
}
