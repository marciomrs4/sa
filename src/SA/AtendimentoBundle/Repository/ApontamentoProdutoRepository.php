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


class ApontamentoProdutoRepository extends EntityRepository
{

    public function reportIndicadorProdutividade($data)
    {

        $query = ("(SELECT (SELECT usu_nome
                                FROM tb_usuario
                                WHERE usu_codigo = PRO.usuario_id) AS 'usuario',
                        sum(CASE tipo_ligacao WHEN 1 THEN 1 ELSE 0 END) AS 'ativo',
                        sum(CASE tipo_ligacao WHEN 2 THEN 1 ELSE 0 END) AS 'receptivo',
                        count(tipo_ligacao) AS 'total'
                    FROM apontamento_produto AS PRO
                        WHERE tipo_ligacao IS NOT NULL
                        AND data_criacao > :data_inicial
                        AND data_criacao < :data_final
                        GROUP BY usuario_id
                        ORDER BY usuario_id)

                        UNION

                    (SELECT 'TOTAL',
                        sum(CASE tipo_ligacao WHEN 1 THEN 1 ELSE 0 END) AS 'ativo',
                        sum(CASE tipo_ligacao WHEN 2 THEN 1 ELSE 0 END) AS 'receptivo',
                        count(tipo_ligacao) AS 'total'
                    FROM apontamento_produto AS PRO
                        WHERE tipo_ligacao IS NOT NULL
                        AND data_criacao > :data_inicial
                        AND data_criacao < :data_final
                        ORDER BY usuario_id)
                    ORDER BY 4");

        $stmt = $this->getEntityManager()
            ->getConnection()
            ->prepare($query);

        $stmt->execute(array(':data_inicial' => $data['dataInicial'],
                             ':data_final' => $data['dataFinal']));

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);

    }


}