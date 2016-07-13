<?php

    /**
     * Centralize the export classes and methods
     */
    class Export {

        public $pdf;
        public $excel;

        /**
         * @param string $pdf - class's name
         * @param string $excel - class's name
         */
        public function __construct($pdf = 'BasePDF', $excel = 'BaseExcel') {
            $this->pdf = new $pdf();
            $this->excel = new $excel();
        }

    }