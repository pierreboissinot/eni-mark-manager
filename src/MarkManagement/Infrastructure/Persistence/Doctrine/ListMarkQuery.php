<?php
declare(strict_types=1);

namespace Pb\MarkManagement\Infrastructure\Persistence\Doctrine;


use Doctrine\ORM\EntityManagerInterface;
use Pagerfanta\Adapter\DoctrineORMAdapter;
use Pagerfanta\Pagerfanta;
use Pb\MarkManagement\Domain\Mark;
use Pb\MarkManagement\Domain\ReadModel\MarkList;

final class ListMarkQuery
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
                    'NEW %s(mark.id, mark.value, mark.coefficient, mark.label, mark.student, mark.domain)',
                    MarkList::class
                )
            )
            ->from(Mark::class, 'mark')
            ->getQuery();
        $marks = new Pagerfanta(new DoctrineORMAdapter($queryBuilder, false, false));
        $marks->setCurrentPage($page);
        $marks->setMaxPerPage($limit);
        return $marks;
    }

}