<?php

    class BasePDF extends FPDF{
        use PDF;
        use DTO;
        private $pdfName = 'pdf';
        private $pdfType;
        private $headerColumns = array();
        private $pdfData;
        private $rowHeights = array();
        private $yStart;
        private $xStart;

        public function __construct(){
        }

        public function Initialize($orientation = 'P', $paper = 'A4'){
            parent::__construct($orientation, 'mm', $paper);
            $this->AliasNbPages();
            $this->AddPage();
        }

        public function Header(){

            $aligns = $this->GetAligns();
            $widths = $this->GetWidths();

            $this->SetFont('Arial', '', '8');
            $this->SetAligns(array('L'));
            $this->SetWidths(array(0));
            $this->SetBorders(array('B'));
            $text = 'Relatório tipo: '.$this->pdfType.' | Gerado em: '.date('d/m/Y H:i:s');
            $this->PutRow(array($text));

            if(count($widths) != count($this->headerColumns)){
                $this->CalculateWidths();
            }

            $this->SetWidths($widths);

            $this->SetFont('Arial', 'B', 10);
            $this->SetBorders(array_fill(0, count($this->headerColumns), ''));
            $this->SetAligns(array_fill(0, count($this->headerColumns), ''));
            $this->PutRow($this->headerColumns);
            $this->SetFont('Arial', '', 10);
            $this->yStart = $this->GetY();
            $this->xStart = $this->GetX();


        }

        public function ShowData(){
            if(is_array($this->pdfData)){
                foreach($this->pdfData as $row){
                    if(is_array($row)){
                        $row = $this->CalculateData($row);
                        $h = $this->PutRow($row);
                        $this->rowHeights[] = $h;
                    }
                }
            }
        }

        public function Footer(){
            $this->MakeGrid();
            $this->rowHeights = array();

            $this->SetFont('Arial', '', 8);
            $this->SetY(-30);
            $this->Cell(0,30,'Página '.$this->PageNo().' de {nb}','',0,'R');
        }

        public function Finish(){
            return $this->OutPut($this->pdfName, 'I');
        }

        public function MakeGrid(){
            $y = $this->yStart;
            $x = 10;
            foreach($this->rowHeights as $h){
                foreach($this->GetWidths() as $w){
                    $this->Rect($x, $y, $w, $h);
                    $x = $x + $w;
                }
                $x = 10;
                $y = $y + $h;
            }
        }

        public function CalculateWidths(){
            $columns = count($this->headerColumns);
            $width = $this->w / $columns;
            $columns = array();
            $columns = array_fill(0, count($this->headerColumns), $width);
            $this->SetWidths($columns);
        }

        public function CalculateData($row){
            if(count($row) != count($this->headerColumns)){
                if(count($row) > count($this->headerColumns)){
                    $row = array_slice($row, 0, count($this->headerColumns));
                }else{
                    $diff = count($this->headerColumns) - count($row);
                    $row = array_fill(count($row), $diff, '');
                }
            }
            return $row;
        }
    }