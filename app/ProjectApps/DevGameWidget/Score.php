<?php

namespace App\ProjectApps\DevGameWidget;

class Score
{
    private Array $data;

    public function __construct(Array $data)
    {
        $this->data = $data;
    }

    public function calculate()
    {
        $scoreModifier = 0; //$this->data[0]; 

        $metrics = $this->data;

        foreach($metrics as $entry) {

            if( $entry['type'] === 'click' ) {
                $scoreModifier += 8;
            }elseif( $entry['type'] === 'mousemove' ) {
                $scoreModifier += 0.006;
            }elseif( $entry['type'] === 'scroll' ) {
                $scoreModifier += 0.025;
            }elseif( $entry['type'] === 'reload' ) {
                $scoreModifier += 35;
            }
                
        }
                
        return round($scoreModifier, 1, PHP_ROUND_HALF_UP);
    }
}