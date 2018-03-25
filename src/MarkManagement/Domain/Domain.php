<?php
declare(strict_types=1);

namespace Pb\MarkManagement\Domain;


use Doctrine\Common\Collections\ArrayCollection;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

class Domain implements DomainInterface
{

    /** @var Uuid */
    private $id;

    /** @var string */
    private $label;

    /** @var \ArrayAccess */
    private $subjects;

    /**
     * Subject constructor.
     * @param UuidInterface $id
     * @param string $label
     */
    public function __construct(UuidInterface $id, string $label)
    {
        $this->id = $id;
        $this->label = $label;
        $this->subjects = new ArrayCollection();
    }


    public static function enter(UuidInterface $identifier, string $label)
    {
        return new self($identifier, $label);
    }
}