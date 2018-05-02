<?php
declare(strict_types=1);

namespace Pb\MarkManagement\Domain;


use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

final class Student implements StudentInterface
{

    /** @var Uuid */
    private $id;

    /** @var string */
    private $lastName;

    /** @var string */
    private $firstName;

    /** @var \ArrayAccess */
    private $marks;

    /**
     * Student constructor.
     * @param Uuid $id
     * @param string $lastName
     * @param string $firstName
     * @param \ArrayAccess $marks
     */
    public function __construct(Uuid $id, string $lastName, string $firstName)
    {
        $this->id = $id;
        $this->lastName = $lastName;
        $this->firstName = $firstName;
    }

    public static function enter(string $lastName, string $firstName)
    {

        $identifier = Uuid::uuid4();
        return new self($identifier, $lastName, $firstName);
    }


    /** @inheritdoc */
    public function enterMarks(
        UuidInterface $identifier,
        string $firstName,
        string $lastName,
        $marks)
    {
        // TODO: Implement enterMarks() method.
    }

    /** @inheritdoc */
    public function signInToExam($exam)
    {
        // TODO: Implement signInToExam() method.
    }

    /** @inheritdoc */
    public function signInToRetake($exam)
    {
        // TODO: Implement signInToRetake() method.
    }

    public function __toString()
    {
        return $this->lastName;
    }


}
