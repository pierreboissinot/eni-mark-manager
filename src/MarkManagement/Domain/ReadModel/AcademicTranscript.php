<?php
namespace Pb\MarkManagement\Domain\ReadModel;

class AcademicTranscript
{
    private $lastName;
    private $firstName;
    private $marks;

    public function __construct($marks, string $lastName, string $firstName)
    {
	$this->marks = $marks;
        $this->lastName = $lastName;
        $this->firstName = $firstName;
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
     * @return AcademicTranscript
     */
    public function setLastName(string $lastName): AcademicTranscript
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
     * @return AcademicTranscript
     */
    public function setFirstName(string $firstName): AcademicTranscript
    {
        $this->firstName = $firstName;
        return $this;
    }

    public function setMarks($marks)
    {
	    $this->marks = $marks;
	    return $this;
    }

    public function getMarks()
    {
        return $this->marks;
    }


}
