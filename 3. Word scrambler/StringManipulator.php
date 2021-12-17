<?php


class StringManipulator
{

    /*
     * Leave out the first and last characters of the string
     * start iterating from left to right
     * if you encounter an odd index, swap the character with the character at the next odd index
     * if the next odd index is greater than the last element or is the last element, swap with the immediate neighbour
     * Jump the iterator by the steps you jumped for the swap
     *
     * Performing the same operation on a scrambled string will revert it to its unscrambled form
     *
     */
    //this function will unscramble a scrambled string
    public function scrambleString($string)
    {

        //if length of string is just 2 characters, return it - no
        // need to scramble, as it can be a different word altogether
        if (strlen($string) <= 2) return $string;

        //leave first and last characters out of the swap
        for ($i = 1; $i<strlen($string)-1;$i++){

            $temp = $string[$i];

            //position is odd ( swap with nearest odd )
            if($i%2 == 1){

                //next odd index is reachable
                if ($i+2 < strlen($string)-1){

                    $string[$i] = $string[$i+2];
                    $string[$i+2] = $temp;

                    $i += 2;

                }else if($i+1 < strlen($string)-1){ //next odd is not reachable

                    $string[$i] = $string[$i+1];
                    $string[$i+1] = $temp;

                    $i +=1;

                }
            }else{ //even number, scramble with the next reachable character

                if($i+1 < strlen($string)-1){

                    $string[$i] = $string[$i+1];
                    $string[$i+1] = $temp;

                    $i +=1;

                }

            }

        }

        return $string;

    }


}