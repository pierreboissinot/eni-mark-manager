<?php


namespace Pb\MarkManagement\Domain;


use Ramsey\Uuid\Uuid;

interface DomainRepositoryInterface
{
    public function get(Uuid $identifier);

    public function add(DomainInterface $domain);

    public function remove(DomainInterface $domain);

}