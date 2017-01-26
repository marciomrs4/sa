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


class AtendimentoRepository extends EntityRepository
{

    private function emptyValue($value)
    {
        $value = trim($value);

        if($value == ''){
            return '%';
        }
        return $value;

    }

    public function getAllList($data)
    {


        $query = ("SELECT ATE.at_codigo AS atCodigo,
                          at_data_cadastro_real AS atDataCadastroReal,
						  at_data_retorno AS atDataRetorno,
                         SAT.sat_descricao AS satCodigo,
					      TA.at_descricao AS taCodigo,
                          at_paciente AS atPaciente,
                          concat(USU.usu_nome,' ', USU.usu_sobrenome) AS usuCodigo,
                          	(SELECT concat(usu_nome,' ', usu_sobrenome )
		                      FROM tb_usuario
		                        WHERE usu_codigo =
		                        (SELECT usu_codigo
								  FROM tb_apontamento
								  WHERE ap_codigo =
								    (SELECT max(ap_codigo)
									  FROM tb_apontamento
									  WHERE at_codigo = ATE.at_codigo))) AS atendente
					FROM tb_atendimento AS ATE
					INNER JOIN tb_status_atendimento AS SAT
					ON ATE.sat_codigo = SAT.sat_codigo
					INNER JOIN tb_tipo_atendimento AS TA
					ON ATE.ta_codigo = TA.at_codigo
					INNER JOIN tb_usuario AS USU
					ON ATE.usu_codigo = USU.usu_codigo
					INNER JOIN tb_tipo_direcionamento AS TD
					ON ATE.td_codigo = TD.td_codigo
					WHERE ATE.sat_codigo LIKE ?
					AND ATE.ta_codigo LIKE ?
					AND ATE.usu_codigo LIKE ?
					AND ATE.td_codigo LIKE ?
					AND ATE.at_paciente LIKE ?
					AND ATE.ttp_codigo LIKE ?
					AND ATE.at_localidade = ?
					AND (ATE.at_processo LIKE ? OR ATE.at_processo IS NULL)
					AND (ATE.at_medicamento LIKE ? OR ATE.at_medicamento IS NULL)
					AND at_data_retorno >= ? AND at_data_retorno <= ?
					ORDER BY 1 DESC
					LIMIT 500;
				");

        $stmt = $this->getEntityManager()
            ->getConnection()
            ->prepare($query);

        $stmt->execute(
            array($this->emptyValue($data['satCodigo']),
                $this->emptyValue($data['taCodigo']),
                $this->emptyValue($data['usuCodigo']),
                $this->emptyValue($data['tdCodigo']),
                "%{$this->emptyValue($data['atPaciente'])}%",
                "%{$this->emptyValue($data['ttpCodigo'])}%",
                "{$data['atLocalidade']}",
                "%{$this->emptyValue($data['atProcesso'])}%",
                "%{$this->emptyValue($data['atMedicamento'])}%",
                $data['atDataRetornoA'],
                $data['atDataRetornoB']
            ));

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);

    }

    public function listAllAtendimentoAnalitico($data)
    {

        $query = ("SELECT ATE.at_codigo AS atCodigo, at_data_cadastro_real AS atDataCadastroReal,
                          at_data_retorno AS atDataRetorno, SAT.sat_descricao AS satCodigo,
                          TA.at_descricao AS taCodigo, at_paciente AS atPaciente,
                          concat(USU.usu_nome,' ', USU.usu_sobrenome) AS usuCodigo
                                        FROM tb_atendimento AS ATE
                                        INNER JOIN tb_status_atendimento AS SAT
                                        ON ATE.sat_codigo = SAT.sat_codigo
                                        INNER JOIN tb_tipo_atendimento AS TA
                                        ON ATE.ta_codigo = TA.at_codigo
                                        INNER JOIN tb_usuario AS USU
                                        ON ATE.usu_codigo = USU.usu_codigo
                                        INNER JOIN tb_tipo_direcionamento AS TD
                                        ON ATE.td_codigo = TD.td_codigo
                                        WHERE ATE.sat_codigo LIKE ?
                                        AND ATE.ta_codigo LIKE ?
                                        AND at_data_cadastro >= ? AND at_data_cadastro <= ?
                                        ORDER BY 1 DESC
                                ");


        $stmt = $this->getEntityManager()
            ->getConnection()
            ->prepare($query);

        $stmt->execute(array("{$this->emptyValue($data['satCodigo'])}",
            "{$this->emptyValue($data['taCodigo'])}",
            "{$data['atDataRetornoA']}",
            "{$data['atDataRetornoB']}"));

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);

    }

    public function listAtendimentoByPeriod($start, $end)
    {

        $query = ("SELECT ATE.at_codigo AS atCodigo, concat(USU.usu_nome,' ', USU.usu_sobrenome) AS usuCodigo,
                          at_paciente AS atPaciente, SAT.sat_descricao AS satCodigo, at_data_cadastro_real AS atDataCadastroReal,
                        (SELECT max(ap_data_apontamento) FROM tb_apontamento WHERE ATE.at_codigo = at_codigo) AS dataFechamento,

                /*timediff(fechamento, abertura)*/
                    TIMEDIFF((SELECT max(ap_data_apontamento)
                        FROM tb_apontamento WHERE ATE.at_codigo = at_codigo), at_data_cadastro_real) AS diferenca

                    FROM tb_atendimento AS ATE
                    INNER JOIN tb_status_atendimento AS SAT
                    ON ATE.sat_codigo = SAT.sat_codigo
                    INNER JOIN tb_tipo_atendimento AS TA
                    ON ATE.ta_codigo = TA.at_codigo
                    INNER JOIN tb_usuario AS USU
                    ON ATE.usu_codigo = USU.usu_codigo
                    WHERE ATE.sat_codigo = 3
                    AND at_data_cadastro >= ? AND at_data_cadastro <= ?
                ORDER BY ATE.at_codigo DESC");

        $stmt = $this->getEntityManager()
            ->getConnection()
            ->prepare($query);

        $stmt->execute(array("{$start}",
            "{$end}"));

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);

    }

    public function atendimentoByStatus($start, $end)
    {

        $query = (" SELECT count(ATE.sat_codigo) AS Quantidade, SAT.sat_descricao AS Status
                                        FROM tb_atendimento AS ATE
                                        INNER JOIN tb_status_atendimento AS SAT
                                        ON ATE.sat_codigo = SAT.sat_codigo
                                        WHERE at_data_cadastro >= ?
                                          AND at_data_cadastro <= ?
                                        GROUP BY ATE.sat_codigo
                                        ORDER BY ATE.sat_codigo");

        $stmt = $this->getEntityManager()
            ->getConnection()
            ->prepare($query);

        $stmt->execute(array("{$start}",
            "{$end}"));

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);

    }

    public function atendimentoByTipoAndStatus($start, $end)
    {

        $query = ("SELECT count(*) AS Quantidade,
                          TA.at_descricao AS TipoAtendimento, SAT.sat_descricao AS Status
                        FROM tb_atendimento AS ATE
                        INNER JOIN tb_tipo_atendimento AS TA
                        ON ATE.ta_codigo = TA.at_codigo
                        INNER JOIN tb_status_atendimento AS SAT
                        ON ATE.sat_codigo = SAT.sat_codigo
                        WHERE at_data_cadastro >= ?
                        AND at_data_cadastro <= ?
                        GROUP BY ATE.ta_codigo, SAT.sat_codigo
                        ORDER BY TA.at_descricao");

        $stmt = $this->getEntityManager()
            ->getConnection()
            ->prepare($query);

        $stmt->execute(array("{$start}",
            "{$end}"));

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);

    }

    public function atendimentoByPeriodCalendar()
    {

        $query = ("SELECT date_format(at_data_cadastro_real,'%Y-%m-%d') 'start',
                           count(date_format(at_data_cadastro_real,'%d')) as 'title'
                    FROM tb_atendimento
                    WHERE at_data_cadastro_real > '2016-09-01 00:00:01'
                    AND at_data_cadastro_real < '2016-10-31 23:59:59'
                    GROUP BY date_format(at_data_cadastro_real,'%d')");

        $stmt = $this->getEntityManager()
            ->getConnection()
            ->prepare($query);

        $date = new \DateTime('now');

        $stmt->execute(array($date->modify('-15 days')->format('Y-m-d 00:00:01'),
                             $date->modify('+15 days')->format('Y-m-d 23:59:59')));

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);

    }

    public function reportIndicadorProdutividade($data)
    {

        $query = ("(SELECT (SELECT usu_nome
                                FROM tb_usuario
                                WHERE usu_codigo = ATE.usu_codigo) AS 'usuario',
                        sum(CASE tipo_ligacao WHEN 1 THEN 1 ELSE 0 END) AS 'ativo',
                        sum(CASE tipo_ligacao WHEN 2 THEN 1 ELSE 0 END) AS 'receptivo',
                        count(tipo_ligacao) AS 'total'
                    FROM tb_atendimento AS ATE
                        WHERE tipo_ligacao IS NOT NULL
                        AND at_data_cadastro_real > :data_inicial
                        AND at_data_cadastro_real < :data_final
                        GROUP BY usu_codigo
                        ORDER BY usu_codigo)

                        UNION

                    (SELECT 'TOTAL',
                        sum(CASE tipo_ligacao WHEN 1 THEN 1 ELSE 0 END) AS 'ativo',
                        sum(CASE tipo_ligacao WHEN 2 THEN 1 ELSE 0 END) AS 'receptivo',
                        count(tipo_ligacao) AS 'total'
                    FROM tb_atendimento AS ATE
                        WHERE tipo_ligacao IS NOT NULL
                        AND at_data_cadastro_real > :data_inicial
                        AND at_data_cadastro_real < :data_final
                        ORDER BY usu_codigo)
                    ORDER BY 4;");

        $stmt = $this->getEntityManager()
            ->getConnection()
            ->prepare($query);

        $stmt->execute(array(':data_inicial' => $data['dataInicial'],
                             ':data_final' => $data['dataFinal']));

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);

    }

    public function getAtendimentoByMedicamento($data)
    {


        $query = ("SELECT ATE.at_codigo AS atCodigo, ATE.at_medicamento AS atMedicamento,
                          at_data_cadastro_real AS atDataCadastroReal,
						  at_data_retorno AS atDataRetorno,
                         SAT.sat_descricao AS satCodigo,
					      TA.at_descricao AS taCodigo,
                          at_paciente AS atPaciente,
                          concat(USU.usu_nome,' ', USU.usu_sobrenome) AS usuCodigo,
                          	(SELECT concat(usu_nome,' ', usu_sobrenome )
		                      FROM tb_usuario
		                        WHERE usu_codigo =
		                        (SELECT usu_codigo
								  FROM tb_apontamento
								  WHERE ap_codigo =
								    (SELECT max(ap_codigo)
									  FROM tb_apontamento
									  WHERE at_codigo = ATE.at_codigo))) AS atendente
					FROM tb_atendimento AS ATE
					INNER JOIN tb_status_atendimento AS SAT
					ON ATE.sat_codigo = SAT.sat_codigo
					INNER JOIN tb_tipo_atendimento AS TA
					ON ATE.ta_codigo = TA.at_codigo
					INNER JOIN tb_usuario AS USU
					ON ATE.usu_codigo = USU.usu_codigo
					INNER JOIN tb_tipo_direcionamento AS TD
					ON ATE.td_codigo = TD.td_codigo
					WHERE ATE.sat_codigo LIKE ?
					AND ATE.at_medicamento LIKE ?
					AND at_data_cadastro >= ? AND at_data_cadastro <= ?
					ORDER BY 1 DESC
					LIMIT 500;
				");

        $stmt = $this->getEntityManager()
            ->getConnection()
            ->prepare($query);

        $stmt->execute(
            array($this->emptyValue($data['satCodigo']),
                "%{$this->emptyValue($data['atMedicamento'])}%",
                $data['dataInicial'],
                $data['dataFinal']
            ));

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);

    }

}