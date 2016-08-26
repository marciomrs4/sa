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


class TipoAtendimentoRepository extends EntityRepository
{

    public function getAtendimentoByTdCodigo($atCodigo)
    {
        return $this->createQueryBuilder('TipoAtendimento')
            ->where('TipoAtendimento.atCodigo = :tipoatendimento')
            ->setParameter('tipoatendimento',$atCodigo)
            ->getEntityManager();

    }

}