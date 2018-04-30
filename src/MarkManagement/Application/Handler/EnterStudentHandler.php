<?php


namespace Pb\MarkManagement\Application\Handler;

use Pb\MarkManagement\Application\Command\EnterStudent;
use Pb\MarkManagement\Domain\Student;
use Pb\MarkManagement\Domain\StudentRepositoryInterface;
use Ramsey\Uuid\Uuid;

class EnterStudentHandler
{

    /**
     * @var StudentRepositoryInterface
     */
    private $studentRepository;

    public function __construct(StudentRepositoryInterface $studentRepository)
    {
        $this->studentRepository = $studentRepository;
    }

    public function handle(EnterStudent $command)
    {
        $student = Student::enter(
            Uuid::uuid4(),
            $command->lastName,
            $command->firstName
        );
        $this->studentRepository->add($student);
    }

}