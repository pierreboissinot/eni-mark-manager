<?php


namespace Pb\MarkManagement\Application\Handler;


use Pb\MarkManagement\Application\Command\EnterDomain;
use Pb\MarkManagement\Domain\Domain;
use Pb\MarkManagement\Domain\DomainRepositoryInterface;
use Pb\MarkManagement\Domain\MarkRepositoryInterface;
use Ramsey\Uuid\Uuid;

class EnterDomainHandler
{

    /**
     * @var MarkRepositoryInterface
     */
    private $markRepository;

    public function __construct(DomainRepositoryInterface $markRepository)
    {
        $this->markRepository = $markRepository;
    }

    public function handle(EnterDomain $command)
    {
        $mark = Domain::enter(
            Uuid::uuid4(),
            $command->label
        );
        $this->markRepository->add($mark);
    }

}