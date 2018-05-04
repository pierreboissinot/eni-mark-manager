<?php
declare(strict_types=1);

namespace Pb\MarkManagement\Infrastructure\Persistence\Doctrine;

use Doctrine\ORM\EntityManagerInterface;
use Pagerfanta\Adapter\DoctrineORMAdapter;
use Pagerfanta\Pagerfanta;
use Pb\MarkManagement\Domain\Domain;
use Pb\MarkManagement\Domain\Mark;
use Pb\MarkManagement\Domain\ReadModel\AcademicTranscript;
use Pb\MarkManagement\Domain\ReadModel\StudentList;
use Pb\MarkManagement\Domain\Student;

final class AcademicTranscriptQuery
{
	/**
	 * @var EntityManagerInterface
	 */
	private $entityManager;

	public function __construct(EntityManagerInterface $entityManager)
	{
		$this->entityManager = $entityManager;
	}

	public function find(string $identifier)
	{
		$queryBuilder = $this->entityManager->createQueryBuilder()
			->select(
				sprintf(
					'NEW %s(mark.id, mark.value, mark.coefficient, subject.label, domain.label)',
					AcademicTranscript::class
				)
			)
			->from(Domain::class, 'domain', 'domain.id')
			->where('student.id = :identifier')
			->setParameters([
				'identifier' => $identifier
			])
			->join('domain.subjects', 'subject')
			->join('subject.marks', 'mark')
			->leftJoin('mark.student', 'student')
			->getQuery();
		$result = $queryBuilder->getResult();
		return $this->_group_by_domain($result);
	}

	function _group_by_domain($array) {
		$return = array();
		foreach($array as $val) {
			$return[$val->getDomain()]['marks'][] = $val;
		}
		foreach($return as $domain => $domainInfos) {
			$return[$domain]['coefficientTotal'] = array_reduce($domainInfos['marks'], function($carry, $item) {
				$carry += $item->getCoefficient();
				return $carry;
			}
			);
			$totalValue = array_reduce($domainInfos['marks'], function($carry, $item) {
				$carry += $item->getValue();
				return $carry;
			});
			$countValue = count($domainInfos['marks']);
			$return[$domain]['average'] = $totalValue / $countValue;
		}
		return $return;
	}
}
