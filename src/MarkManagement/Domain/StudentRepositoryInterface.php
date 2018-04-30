<?php


namespace Pb\MarkManagement\Domain;


use Ramsey\Uuid\Uuid;

interface StudentRepositoryInterface
{
    public function get(Uuid $identifier);

    public function add(StudentInterface $student);

    public function remove(StudentInterface $student);

}