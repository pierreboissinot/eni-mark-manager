<?php
namespace Pb\MarkManagement\Domain\ReadModel;


class StudentList
{
    private $id;
    private $lastName;
    private $firstName;

    public function __construct(string $id, string $lastName, string $firstName)
    {
        $this->id = $id;
        $this->lastName = $lastName;
        $this->firstName = $firstName;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return StudentList
     */
    public function setId(string $id): StudentList
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     * @return StudentList
     */
    public function setLastName(string $lastName): StudentList
    {
        $this->lastName = $lastName;
        return $this;
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     * @return StudentList
     */
    public function setFirstName(string $firstName): StudentList
    {
        $this->firstName = $firstName;
        return $this;
    }


}