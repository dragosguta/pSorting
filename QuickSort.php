<?php

class QuickSort {

    public function __construct(&$array) {
        //Constructor calls the sort method
        $this->sort($array, 0, count($array) - 1);
    }

    private function partition(&$array, $left, $right) {

        //Select the median as the pivot
        $pivot = $array[($left + $right) / 2];

        while($left <= $right) {
            while($array[$left] < $pivot) {
                $left++;
            }
            while($array[$right] > $pivot) {
                $right--;
            }
            if($left <= $right) {
                $this->swap($array, $left, $right);
                $left++;
                $right--;
            }
        }
        return $left;
    }

    //Rearrange the items in the array
    private function swap(&$array, $firstIndex, $lastIndex) {
        $temp = $array[$firstIndex];
        $array[$firstIndex] = $array[$lastIndex];
        $array[$lastIndex] = $temp;
    }

    //Recursive sort call with partition
    private function sort(&$array, $leftIndex, $rightIndex) {
        if($array == null || count($array) == 0)
            return;
        else {
            $index = $this->partition($array, $leftIndex, $rightIndex);
            if($leftIndex < $index - 1)
                $this->sort($array, $leftIndex, $index - 1);
            if($rightIndex > $index)
                $this->sort($array, $index, $rightIndex);
        }
    }
}

$testArray = array(1, 10, 23, 4, 9, 21, 59, 33, 6 , 12, 99, 74, 17, 3, 8, 82, 81, 2);
print_r($testArray);
new QuickSort($testArray);
print_r($testArray);
