<?php
    require_once('plugins/phpexcel/PHPExcel/IOFactory.php');

    trait Excel {
        // Keeps the position
        private $actualRow = 1;
        private $actualColumn = 0;

        // Keeps the font
        private $fontName = 'Arial';
        private $fontSize = '11';
        private $fontStyle = '';
        private $fontColor = array('rgb' => '000000');
        private $boldStyle = false;
        private $italicStyle = false;
        private $underlineStyle = false;
        private $strikeStyle = false;

        // Keeps the border style
        private $borderStyle = array('borders' => array());

        // Keeps the style array
        private $style = '';

        // Keeps the file directory
        private $directory = '';


        public function PutRow($data) {

            foreach ($data as $value) {
                //Save the current position
                $r = $this->GetPosition('r');
                $c = $this->GetPosition('c');

                $this->PutCell($c, $r, $value);
                $this->SetPosition($r, $c + 1);

            }
            //Go to the next line
            $this->BreakLine();
        }

        public function PutCell($column, $row, $value) {
            $this->getActiveSheet()->setCellValueByColumnAndRow($column, $row, $value);
            $this->Style($column, $row);
        }

        public function BreakLine($n = 1, $c = 0) {
            $this->SetPosition($this->GetPosition('r') + $n, $c);
        }

        public function SetPosition($r, $c = 0) {
            $this->actualRow = $r;
            if ($c !== 'keep')
                $this->actualColumn = $c;
        }

        public function GetPosition($item = '') {
            switch ($item) {
                case 'r':
                    return $this->actualRow;
                    break;
                case 'c':
                    return $this->actualColumn;
                    break;
                default:
                    return array($this->actualRow, $this->actualColumn);
                    break;
            }
        }

        public function SetFont($font, $size = 11, $style = '', $color = '') {
            $style = $style . 'Style';
            // Resets the font style
            $this->boldStyle = false;
            $this->italicStyle = false;
            $this->underlineStyle = false;
            $this->strikeStyle = false;


            $this->fontName = $font;
            $this->fontSize = $size;
            if($style != 'Style')
                eval('$this->'.$style.' = true;');
            $this->fontColor = array('rgb' => $color);

            $this->MakeStyle();
        }

        public function SetBorder($border) {
            $defaultBorders = array(
                'borders' => array(
                    'left'   => array(
                        'style' => PHPExcel_Style_Border::BORDER_THIN,
                        'color' => array('argb' => '00000000'),
                    ),
                    'right'  => array(
                        'style' => PHPExcel_Style_Border::BORDER_THIN,
                        'color' => array('argb' => '00000000'),
                    ),
                    'bottom' => array(
                        'style' => PHPExcel_Style_Border::BORDER_THIN,
                        'color' => array('argb' => '00000000'),
                    ),
                    'top'    => array(
                        'style' => PHPExcel_Style_Border::BORDER_THIN,
                        'color' => array('argb' => '00000000'),
                    ),
                ),
            );
            if ($border == 'all') {
                $this->borderStyle['borders'] = $defaultBorders['borders'];
            } else {
                if($border == ''){
                    $this->borderStyle['borders'] = array();
                }else {
                    if (count(explode(',', $border)) > 1) {
                        $styles = explode(',', $border);
                        $borders = array();
                        foreach ($styles as $borderName) {
                            $this->borderStyle['borders'][$borderName] = $defaultBorders['borders'][$borderName];
                        }
                    } else {
                        $this->borderStyle['borders'][$border] = $defaultBorders['borders'][$border];
                    }
                }
            }
            $this->MakeStyle();
        }

        public function MakeStyle() {
            $this->style = array(
                'font' => array(
                    'bold'      => $this->boldStyle,
                    'italic'    => $this->italicStyle,
                    'underline' => $this->underlineStyle,
                    'strike'    => $this->strikeStyle,
                    'size'      => $this->fontSize,
                    'name'      => $this->fontName,
                    'color'     => $this->fontColor,
                ),
                'borders' => $this->borderStyle['borders'],
            );
        }


        public function Style($c, $r) {
            $this->MakeStyle();
            $this->getActiveSheet()->getStyleByColumnAndRow($c, $r)->applyFromArray($this->style);
        }

        public function Save() {

            $writer = PHPExcel_IOFactory::createWriter($this, 'Excel2007');
            $name = uniqid();
            $this->directory = _APP_ROOT_DIR.'assets/files/'.$name.'.xlsx';
            $writer->save($this->directory);

        }

        public function Close(){
            $this->Footer();
        }

        public function Download(){

            $writer = PHPExcel_IOFactory::createWriter($this, 'Excel2007');
            header ("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
            header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
            header ("Cache-Control: no-cache, must-revalidate");
            header ("Pragma: no-cache");
            header ("Content-type: application/x-msexcel");
            header ("Content-Disposition: attachment; filename=\"{$this->directory}\"" );
            header ("Content-Description: PHP Generated Data" );

            $writer->save('php://output');

        }

        public function Finish() {
            $this->Close();
            $this->Save();
            $this->Download();
        }


    }