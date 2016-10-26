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

    public function reportIndicadorProdutividade($data)
    {

        $query = ("(SELECT (SELECT usu_nome
                                FROM tb_usuario
                                WHERE usu_codigo = APO.usu_codigo) AS 'usuario',
                        sum(CASE tipo_ligacao WHEN 1 THEN 1 ELSE 0 END) AS 'ativo',
                        sum(CASE tipo_ligacao WHEN 2 THEN 1 ELSE 0 END) AS 'receptivo',
                        count(tipo_ligacao) AS 'total'
                    FROM tb_apontamento AS APO
                        WHERE tipo_ligacao IS NOT NULL
                        AND ap_data_apontamento > :data_inicial
                        AND ap_data_apontamento < :data_final
                        GROUP BY usu_codigo
                        ORDER BY usu_codigo)

                        UNION

                    (SELECT 'TOTAL',
                        sum(CASE tipo_ligacao WHEN 1 THEN 1 ELSE 0 END) AS 'ativo',
                        sum(CASE tipo_ligacao WHEN 2 THEN 1 ELSE 0 END) AS 'receptivo',
                        count(tipo_ligacao) AS 'total'
                    FROM tb_apontamento AS APO
                        WHERE tipo_ligacao IS NOT NULL
                        AND ap_data_apontamento > :data_inicial
                        AND ap_data_apontamento < :data_final
                        ORDER BY usu_codigo)
                    ORDER BY 4;
                    ");

        $stmt = $this->getEntityManager()
            ->getConnection()
            ->prepare($query);

        $stmt->execute(array(':data_inicial' => $data['dataInicial'],
                             ':data_final' => $data['dataFinal']));

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);

    }


}