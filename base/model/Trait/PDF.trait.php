<?php

    trait PDF{
        private $widths;
        private $aligns;
        private $borders;
        private $angle;

        /**
         * @param Array $widths
         **/
        function SetWidths($widths){
            $this->widths = $widths;
        }

        /**
         * @return Array
         */
        public function GetWidths(){
            return $this->widths;
        }

        /**
         * @param Array $aligns - possible values: L, R, C
         **/
        function SetAligns($aligns){
            $this->aligns=$aligns;
        }

        /**
         * @return Array
         **/
        public function GetAligns(){
            return $this->aligns;
        }


        /**
         * @param Array $borders - possible values: B, T, L, R. Can be mixed (LRBT)
         *
         **/
        function SetBorders($borders){
            $this->borders = $borders;
        }

        /**
         * @return Array
         **/
        public function GetBorders(){
            return $this->borders;
        }

        /**
         *
         * @param Array $data - row data
         * @param Boolean $mm - measure by milimeters or points
         * @link http://www.fpdf.org/en/script/script3.php
         * @return int - height of the line.
         **/
        function PutRow($data, $mm = true){
            // 	//Calculate the height of the row
            $nb = 0;
            for($i=0;$i<count($data);$i++){
                $nb= max($nb, $this->NbLines($this->widths[$i], $data[$i]));
            }
            //  echo $nb.'<br />';
            if($mm)
                $h = 5 * $nb;
            else
                $h= 10 * $nb;

            //Issue a page break first if needed
            $this->CheckPageBreak($h, $mm);

            //Draw the cells of the row
            for($i=0;$i<count($data);$i++){
                $w=$this->widths[$i];
                $a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'J';
                $b=isset($this->borders[$i]) ? $this->borders[$i] : 0;
                //Save the current position
                $x=$this->GetX();
                $y=$this->GetY();
                //Print the text
                if($mm)
                    $this->MultiCell($w,5,$data[$i],$b, $a);
                else
                    $this->MultiCell($w,15,$data[$i],$b, $a);

                //Put the position to the right of the cell

                $this->SetXY($x+$w,$y);
            }
            //Go to the next line
            if($mm){
                $this->Ln($h);
            }else{
                if($h > 15)
                    $this->Ln($h + 20);
                else
                    $this->Ln($h + 10);
            }
            return $h;
        }

        /**
         * @param Integer $height - actual height of the page
         * @param Boolean $mm - measure by milimeters or points
         * @return Boolean - true if break, false if not
         *
         **/
        function CheckPageBreak($height, $mm = true){
            //If the height h would cause an overflow, add a new page immediately
            if($mm){
                if($this->GetY() + $height > $this->PageBreakTrigger){
                    $this->AddPage($this->CurOrientation);
                    return true;
                }
            }else{
                if($height > 15){
                    if($this->GetY() + ($height + ($height * 2)) > $this->PageBreakTrigger){
                        $this->AddPage($this->CurOrientation);
                        return true;
                    }
                }else{
                    if($this->GetY() + $height + 30 > $this->PageBreakTrigger){
                        $this->AddPage($this->CurOrientation);
                        return true;
                    }
                }
            }
        }

        /**
         * Calculates the number of the lines that one cell will take
         *
         * @param Integer $w - width of the cell
         * @param String $txt
         * @return Integer - number of the lines
         **/
        function NbLines($w,$txt){
            if($this->GetStringWidth($txt) + 5 < $w)
                return 1;
            //Computes the number of lines a MultiCell of width w will take
            $cw=&$this->CurrentFont['cw'];
            if($w==0)
                $w=$this->w-$this->rMargin-$this->x;
            $wmax=($w-2*$this->cMargin)*1000/$this->FontSize;
            $s=str_replace("\r",'',$txt);
            $nb=strlen($s);
            if($nb>0 and $s[$nb-1]=="\n")
                $nb--;
            $sep=-1;
            $i=0;
            $j=0;
            $l=0;
            $nl=1;
            while($i<$nb){
                $c=$s[$i];
                if($c=="\n"){
                    $i++;
                    $sep=-1;
                    $j=$i;
                    $l=0;
                    $nl++;
                    continue;
                }
                if($c==' ')
                    $sep=$i;
                $l+=$cw[$c];
                if($l>$wmax){
                    if($sep==-1){
                        if($i==$j)
                            $i++;
                    }else{
                        $i=$sep+1;
                    }
                    $sep=-1;
                    $j=$i;
                    $l=0;
                    $nl++;
                }else{
                    $i++;
                }
            }
            return $nl;
        }

        /**
         * Sets the rotation angle of the text that will be written
         * ### Caution when calling this funcion, try to call only through "RotatedText" function ###
         *
         * @param Float|Integer $angle
         * @param Float|Integer $x
         * @param Float|Integer $y
         * @return void
         */
        public function Rotate($angle,$x=-1,$y=-1){
            if($x==-1)
                $x=$this->x;
            if($y==-1)
                $y=$this->y;
            if($this->angle!=0)
                $this->_out('Q');
            $this->angle=$angle;
            if($angle!=0)
            {
                $angle*=M_PI/180;
                $c=cos($angle);
                $s=sin($angle);
                $cx=$x*$this->k;
                $cy=($this->h-$y)*$this->k;
                $this->_out(sprintf('q %.5F %.5F %.5F %.5F %.2F %.2F cm 1 0 0 1 %.2F %.2F cm',$c,$s,-$s,$c,$cx,$cy,-$cx,-$cy));
            }
        }

        /**
         * Put an rotated text on the PDF
         *
         * @param Float|Integer $x
         * @param Float|Integer $y
         * @param String $txt
         * @param Float|Integer $angle
         * @return void
         *
         */
        public function RotatedText($x,$y,$txt,$angle){
            //Text rotated around its origin
            $this->Rotate($angle,$x,$y);
            $this->Text($x,$y,$txt);
            $this->Rotate(0);
        }

    }
