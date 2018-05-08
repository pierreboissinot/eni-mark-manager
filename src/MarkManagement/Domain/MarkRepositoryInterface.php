<?php


namespace Pb\MarkManagement\Domain;


use Ramsey\Uuid\Uuid;

interface MarkRepositoryInterface
{
    public function get(string $identifier);

    public function add(MarkInterface $mark);

    public function remove(MarkInterface $mark);

}
