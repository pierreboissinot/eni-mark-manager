<?php


namespace Pb\MarkManagement\Application\Handler;


use Pb\MarkManagement\Application\Command\EnterDomain;
use Pb\MarkManagement\Domain\Domain;
use Pb\MarkManagement\Domain\DomainRepositoryInterface;
use Pb\MarkManagement\Domain\MarkRepositoryInterface;

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
            $command->label
        );
        $this->markRepository->add($mark);
    }

}