<?php

namespace AppBundle\Domain;

/**
 * Class ExamsTheStudentTookPartIn représentant les épreuves que l'élève a passée (réussi ou échouée)
 * @package AppBundle\Domain
 */
final class ExamsTheStudentTookPartIn
{

    private $examId;
    private $examName;
    private $dateOfExam;

    public function __construct(int $examId, string $examName, string $dateOfExam)
    {
    }
}