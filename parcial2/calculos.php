<?php
    class Calculos {
        public function calcular_factorial($num) {
            $fact=1;
            for ($i=1;$i<=$num; $i= $i+1) {
                $fact=$fact*$i;
            }
            return $fact;
        }

        public function calcular_sumatoria($num) {
            $sumatoria=0;
            for ($i=1;$i<=$num; $i=$i+1) {
                $sumatoria = $sumatoria + (($i*$i)/$this->calcular_factorial($i));
            }
            return $sumatoria;
        }
    }
?>  