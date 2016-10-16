<?php

use ArrayCircleFetch\ArrayCircleFetch;

class ArrayCircleFetchTest extends PHPUnit_Framework_TestCase
{
    
    public function testGet()
    {
        $array = $this->getArray();
        
        $array[50][200] = "my desided value is on middle";
        $array[50][201] = "i am neighbor";
        $circlefetch = new ArrayCircleFetch($array);
        
        $result = $circlefetch->get(["x" => 50, "y"=> 200], 3);
        
        $this->assertCount(13, $result); //center plus 12
        $this->assertContains("my desided value is on middle", $result);
        $this->assertContains("i am neighbor", $result);
        $this->assertContains(1, $result);
    }
    
    protected function getArray()
    {
        $array = [];
        
        for($x = 0; $x < 1024; $x++){
            $array[$x] = [];
            for($y = 0; $y < 1024; $y++){
                $array[$x][$y] = 1;
            }
        }
        
        return $array;
    }
    
}
