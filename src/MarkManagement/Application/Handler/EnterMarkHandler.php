<?php


namespace Pb\MarkManagement\Application\Handler;


use Pb\MarkManagement\Application\Command\EnterMark;
use Pb\MarkManagement\Domain\Mark;
use Pb\MarkManagement\Domain\MarkRepositoryInterface;
use Ramsey\Uuid\Uuid;

class EnterMarkHandler
{

    /**
     * @var MarkRepositoryInterface
     */
    private $markRepository;

    public function __construct(MarkRepositoryInterface $markRepository)
    {
        $this->markRepository = $markRepository;
    }

    public function handle(EnterMark $command)
    {
        $mark = Mark::enter(
            Uuid::uuid4(),
            $command->value,
            $command->coefficient,
            $command->student,
            $command->label,
            $command->domain
        );
        $this->markRepository->add($mark);
    }

}