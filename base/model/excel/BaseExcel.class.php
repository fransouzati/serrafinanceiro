<?php

    class BaseExcel extends PHPExcel{
        use Excel;
        use DTO;

        private $creator = 'Serra empresas';
        private $title = 'Excel';

        private $type = '';
        private $headerColumns;

        private $data;

        public function __construct(){
            parent::__construct();

        }

        public function Header(){
            $this->SetFont('Arial');
            if($this->type != '')
                $this->PutRow(array('Tipo: '.$this->type));
            $this->BreakLine();

            $this->SetFont('Arial', 11, 'bold');
            $this->SetBorder('bottom');
            $this->PutRow($this->headerColumns);
            $this->SetBorder('');
            $this->SetFont('Arial');
        }

        public function ShowData(){
            foreach($this->data as $row){
                $this->PutRow($row);
            }
        }

        public function Footer(){

        }

        public function Initialize(){
            $this->setActiveSheetIndex(0);

            $this->getProperties()->setCreator($this->creator);
            $this->getProperties()->setTitle($this->title);
            $this->getActiveSheet()->setTitle($this->title);
            $this->Header();
        }
    }