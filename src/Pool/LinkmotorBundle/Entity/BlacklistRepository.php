<?php

namespace Pool\LinkmotorBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * BlacklistRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class BlacklistRepository extends EntityRepository
{
    /**
     * @param Project $project
     *
     * @return \Doctrine\ORM\QueryBuilder
     */
    public function getQueryForBlacklistIndex(Project $project)
    {
        $query = $this->getEntityManager()
            ->getRepository('PoolLinkmotorBundle:Blacklist')
            ->createQueryBuilder('b')
            ->where('b.project = :project')
            ->setParameter('project', $project->getId());

        return $query;
    }

    /**
     * @return int
     */
    public function getTotalCount()
    {
        return $this->getEntityManager()
            ->getRepository('PoolLinkmotorBundle:Blacklist')
            ->createQueryBuilder('b')
            ->select('COUNT(b)')
            ->getQuery()
            ->getSingleScalarResult();
    }
}
