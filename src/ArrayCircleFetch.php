<?php

namespace ArrayCircleFetch;

class ArrayCircleFetch
{
    public $array;
    public $sizeof_x;
    public $sizeof_y;

    public function __construct($array)
    {
        $this->array = $array;
        $this->sizeof_x = sizeof($array);
        $this->sizeof_y = sizeof($array[0]);
        
        // validate 2 dimensions array, regular indexes
    }
    
    /**
     * @param array $center example: ["x" => 5, "y" => 10]
     * @param int $radius in indexes
     */
    public function get($center, $radius)
    {        
        $radius -=1; //remove the center
        
        $included_values = [];
                
        for($x = 0; $x < $this->sizeof_x; $x++){
            for($y = 0; $y < $this->sizeof_y; $y++){
                
                $a = abs($x - ($center['x']));
                $b = abs($y - ($center['y']));
                
                $c = sqrt($a*$a + $b*$b);
                
                if ($c <= $radius) {
                    $included_values[] = $this->array[$x][$y];
                }
            }
        }
        
        return $included_values;
    }
    
}
