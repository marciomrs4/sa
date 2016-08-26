<?php

namespace SA\AtendimentoBundle\Report;

use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;

class ReportAtendimentoAnalitico
{

    private $container;

    public function __construct(ContainerInterface $containerInterface)
    {
        $this->container = $containerInterface;
    }

    public function createReportAtendimentoAnaliticoXLS($dataBaseResult, $user)
    {
        $ExcelObj = $this->container->get('phpexcel')->createPHPExcelObject();

        $ExcelObj->getProperties()->setCreator('SA')
            ->setLastModifiedBy('SA')
            ->setTitle('SA - EXCEl')
            ->setSubject('SA-Relatorio')
            ->setDescription('SA-Relatorio')
            ->setKeywords('SA-Relatorio');

        $ExcelObj->setActiveSheetIndex(0);

        $ExcelObj->getActiveSheet()->setTitle('Relatorio Atendimento Analitico');

        $ExcelObj->getActiveSheet()->mergeCells('B2:H3')
            ->setCellValue('B2','Relatorio Analitico: Criado em ' .
                date('d-m-Y H:i:s'). ' por ' .
                $user->getUsuNome().' '. $user->getUsuSobrenome());

        $ExcelObj->getActiveSheet()->getStyle('B2')->applyFromArray(array(
            'font' => array('bold' =>true,'size'=>20),
            'alignment' => array('horizontal' => \PHPExcel_Style_Alignment::HORIZONTAL_CENTER)
        ));


        $ExcelObj->setActiveSheetIndex(0)->setCellValue('B5', 'Protocolo')->getStyle('B5')
            ->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $ExcelObj->getActiveSheet()->getStyle('B5')->getFont()->getColor()
            ->setARGB(\PHPExcel_Style_Color::COLOR_WHITE);

        $ExcelObj->setActiveSheetIndex(0)->setCellValue('C5', 'Data do Atendimento')->getStyle('C5')
            ->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $ExcelObj->getActiveSheet()->getStyle('C5')->getFont()->getColor()
            ->setARGB(\PHPExcel_Style_Color::COLOR_WHITE);

        $ExcelObj->setActiveSheetIndex(0)->setCellValue('D5', 'Data de Retorno')->getStyle('D5')
            ->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $ExcelObj->getActiveSheet()->getStyle('D5')->getFont()->getColor()
            ->setARGB(\PHPExcel_Style_Color::COLOR_WHITE);

        $ExcelObj->setActiveSheetIndex(0)->setCellValue('E5', 'Status')->getStyle('E5')
            ->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $ExcelObj->getActiveSheet()->getStyle('E5')->getFont()->getColor()
            ->setARGB(\PHPExcel_Style_Color::COLOR_WHITE);

        $ExcelObj->setActiveSheetIndex(0)->setCellValue('F5', 'Tipo de Atendimento')->getStyle('F5')
            ->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $ExcelObj->getActiveSheet()->getStyle('F5')->getFont()->getColor()
            ->setARGB(\PHPExcel_Style_Color::COLOR_WHITE);

        $ExcelObj->setActiveSheetIndex(0)->setCellValue('G5', 'Paciente')->getStyle('G5')
            ->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $ExcelObj->getActiveSheet()->getStyle('G5')->getFont()->getColor()
            ->setARGB(\PHPExcel_Style_Color::COLOR_WHITE);

        $ExcelObj->setActiveSheetIndex(0)->setCellValue('H5', 'Paciente')->getStyle('H5')
            ->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $ExcelObj->getActiveSheet()->getStyle('H5')->getFont()->getColor()
            ->setARGB(\PHPExcel_Style_Color::COLOR_WHITE);


        $ExcelObj->setActiveSheetIndex(0)
            ->getColumnDimension('B')
            ->setWidth(7)->setAutoSize(true);
        $ExcelObj->setActiveSheetIndex(0)
            ->getColumnDimension('C')
            ->setWidth(25)->setAutoSize(true);
        $ExcelObj->setActiveSheetIndex(0)
            ->getColumnDimension('D')
            ->setWidth(15)->setAutoSize(true);
        $ExcelObj->setActiveSheetIndex(0)
            ->getColumnDimension('E')
            ->setWidth(20)->setAutoSize(true);
        $ExcelObj->setActiveSheetIndex(0)
            ->getColumnDimension('F')
            ->setWidth(20)->setAutoSize(true);
        $ExcelObj->setActiveSheetIndex(0)
            ->getColumnDimension('G')
            ->setWidth(20)->setAutoSize(true);
        $ExcelObj->setActiveSheetIndex(0)
            ->getColumnDimension('H')
            ->setWidth(20)->setAutoSize(true);

        $ExcelObj->getActiveSheet()
            ->getStyle('B5:H5')
            ->getFill()
            ->setFillType(\PHPExcel_Style_Fill::FILL_SOLID)
            ->getStartColor()
            ->setARGB('0E81F5');


        $row = 6;
        foreach ($dataBaseResult as $item) {
            $atDataRetorno = new \DateTime($item['atDataRetorno']);
            $atDataCadastroReal = new \DateTime($item['atDataCadastroReal']);

            $ExcelObj->setActiveSheetIndex(0)
                ->setCellValue('B'.$row, $item['atCodigo'])
                ->setCellValue('C'.$row, $atDataCadastroReal->format('d-m-Y H:i:s'))
                ->setCellValue('D'.$row, $atDataRetorno->format('d-m-Y'))
                ->setCellValue('E'.$row, $item['satCodigo'])
                ->setCellValue('F'.$row, $item['taCodigo'])
                ->setCellValue('G'.$row, $item['atPaciente'])
                ->setCellValue('H'.$row, $item['usuCodigo']);

            $row++;
        }


        $writer = $this->container->get('phpexcel')->createWriter($ExcelObj,'Excel2007');

        $response = $this->container->get('phpexcel')->createStreamedResponse($writer);

        $dispositionHeader = $response->headers->makeDisposition(
            ResponseHeaderBag::DISPOSITION_ATTACHMENT,
            'Relatorio-Atendimento-Analitico.xls'
        );

        $response->headers->set('Content-Type', 'text/vnd.ms-excel; charset=utf-8');
        $response->headers->set('Pragma', 'public');
        $response->headers->set('Cache-Control', 'maxage=1');
        $response->headers->set('Content-Disposition', $dispositionHeader);

        return $response;

    }

}