<?php
declare(strict_types=1);


namespace Pb\MarkManagement\Domain;


use Doctrine\Common\Collections\ArrayCollection;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

final class Subject implements SubjectInterface
{

    /** @var UuidInterface */
    private $id;

    /** @var string */
    private $label;

    /** @var \ArrayAccess */
    private $marks;

    /** @var DomainInterface */
    private $domain;

    /**
     * Subject constructor.
     * @param UuidInterface $id
     * @param string $label
     * @param DomainInterface $domain
     */
    public function __construct(string $id, string $label, DomainInterface $domain)
    {
        $this->id = $id;
        $this->label = $label;
        $this->marks = new ArrayCollection();
        $this->domain = $domain;
    }


    public static function enter(string $label, DomainInterface $domain)
    {
        $identifier = Uuid::uuid4()->toString();
        return new self($identifier, $label, $domain);
    }

    public function __toString()
    {
        return $this->label;
    }

    /**
     * @return string
     */
    public function getLabel(): string
    {
        return $this->label;
    }


}
