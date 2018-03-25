<?php

namespace Pb\MarkManagement\Infrastructure\Persistence\Doctrine;


use Doctrine\ORM\EntityManagerInterface;
use Pb\MarkManagement\Domain\Domain;
use Pb\MarkManagement\Domain\DomainInterface;
use Pb\MarkManagement\Domain\DomainRepositoryInterface;
use Pb\MarkManagement\Domain\Exception\NonExistingDomain;
use Ramsey\Uuid\Uuid;

class DomainRepository implements DomainRepositoryInterface
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
     * @return Domain|object
     * @throws NonExistingDomain
     */
    public function get(Uuid $identifier)
    {
        $mark = $this->entityManager->find(
            Domain::class,
            $identifier->toString()
        );
        if (null === $mark) {
            throw new NonExistingDomain($identifier->toString());
        }

        return $mark;
    }

    public function add(DomainInterface $domain)
    {
        $this->entityManager->persist($domain);
        $this->entityManager->flush();
    }

    public function remove(DomainInterface $domain)
    {
        $this->entityManager->remove($domain);
        $this->entityManager->flush();
    }
}