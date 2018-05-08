<?php

namespace Pb\MarkManagement\Application\Handler;

use Pb\MarkManagement\Application\Command\EditMark;
use Pb\MarkManagement\Application\Command\EnterMark;
use Pb\MarkManagement\Domain\Mark;
use Pb\MarkManagement\Domain\MarkRepositoryInterface;
use Ramsey\Uuid\Uuid;

class EditMarkHandler
{

    /**
     * @var MarkRepositoryInterface
     */
    private $markRepository;

    public function __construct(MarkRepositoryInterface $markRepository)
    {
        $this->markRepository = $markRepository;
    }

    public function handle(EditMark $command)
    {
        $mark = $this->markRepository->get($command->id);
        $mark->edit($command->value);
        $this->markRepository->edit($mark);
    }
}
