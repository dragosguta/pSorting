<?php

class MergeSort {
    public function __construct($array) {
        //Call 'this' sort method
        $this->results = $this->sort($array);
        return $this->results;
    }

    private function sort($array) {
        //If the array has only 1 element, return it
        if(count($array) <= 1)
            return $array;

        //Find the middle index
        $middleIndex = ceil(count($array) / 2);
        //Break up the array into sub arrays
        $leftSub = array_slice($array, 0, $middleIndex);
        $rightSub = array_slice($array, $middleIndex);

        //Recursively call sort on the sub arrays
        $leftSub = $this->sort($leftSub);
        $rightSub = $this->sort($rightSub);

        return $this->mergeResults($leftSub, $rightSub);
    }

    private function mergeResults($left, $right) {
        //Build the resulting array
        $result = [];
        $lIndex = 0;
        $rIndex = 0;

        while($lIndex < count($left) && $rIndex < count($right)) {
            if($left[$lIndex] > $right[$rIndex]) {
                array_push($result, $right[$rIndex]);
                $rIndex++;
            }
            else
            {
                array_push($result, $left[$lIndex]);
                $lIndex++;
            }
        }

        while($lIndex < count($left)) {
            array_push($result, $left[$lIndex]);
            $lIndex++;
        }
        while($rIndex < count($right)) {
            array_push($result, $right[$rIndex]);
            $rIndex++;
        }
        return $result;
    }
}

$testArray = array(1, 10, 23, 4, 9, 21, 59, 33, 6 , 12, 99, 74, 17, 3, 8, 82, 81, 2);
print_r($testArray);
$testArray = new MergeSort($testArray);
print_r($testArray);
