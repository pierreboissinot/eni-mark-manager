<?php
declare(strict_types=1);

namespace Pb\MarkManagement\Domain\ReadModel;

final class DomainList
{
    /** @var string */
    private $id;

    /** @var string */
    private $label;

    /**
     * MarkList constructor.
     * @param string $id
     * @param string $label
     */
    public function __construct(string $id, string $label)
    {
        $this->id = $id;
        $this->label = $label;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getLabel(): string
    {
        return $this->label;
    }
}
