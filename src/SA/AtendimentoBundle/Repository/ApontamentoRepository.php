<?php
/**
 * Created by PhpStorm.
 * User: mrs4
 * Date: 13/06/16
 * Time: 13:28
 */

namespace SA\AtendimentoBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Query\Expr;
use Symfony\Component\HttpFoundation\Request;


class ApontamentoRepository extends EntityRepository
{

    public function getAtendimentoByApontamento($apCodigo)
    {
        return $this->createQueryBuilder('AT')
             ->where('AT.apCodigo = :apCodigo')
            ->setParameter('apCodigo',$apCodigo)
            ->getQuery()
            ->getResult();
    }

}