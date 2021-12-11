<?php
//Question 1
function factors($x)
{
    $i = 1;
    $string = "";
    while ($i <= $x) {
        if ($x % $i == 0) {
            if ($i * 1 == $x) {
                $string .= $i;
            } else {
                $string .= $i . ", ";
            }
        }
        $i++;
    }
    return $string;
}

// Question 2
function tax($income, $mStatus)
{
    $mStatus = strtoupper($mStatus);

    if ($mStatus == "SINGLE") {
        if ($income < 30000) {
            $taxRate = 0.20;
        } else {
            $taxRate = 0.25;
        }
    } else if ($mStatus == "MARRIED") {
        if ($income < 50000) {
            $taxRate = 0.10;
        } else {
            $taxRate = 0.15;
        }
    }

    return $income * $taxRate;
}

//Question 3
function stdDev($arr)
{
    $numOfElements = count($arr);

    $variance = 0.0;
    $average = array_sum($arr) / $numOfElements;

    foreach ($arr as $i) {
        $variance += ($i - $average) ** 2;
    }

    return sqrt($variance / $numOfElements);
}

// Question 4
function compoundInterest($p, $r, $n)
{
    return pow($p * (1 + ($r / 100)), $n);
}

// Question 5
function createIdPassword($x, $y)
{
    $fname = strtoupper($x);
    $lname = strtoupper($y);
    $id = substr($fname, 0, 1) . $lname;
    $password = substr($fname, 0, 1)  . substr($fname, strlen($fname) - 1, 1) . substr($lname, 0, 3) . strlen($fname) . strlen($lname);
    return array("id" => $id, "password" => $password);
}

// Question 6
function removeDuplicates($array)
{
    $arrayLength = count($array);
    $newArray = array();

    for ($i = 0; $i < $arrayLength; $i++) {
        for ($j = $i + 1; $j < $arrayLength; $j++) {
            if ($array[$j] != $array[$i] && !array_search($array[$i], $newArray)) {
                $newArray[$i] = $array[$i];
            }
        }
    }
    return $newArray;
}

// Question 7
class Student
{
    private $name;
    private $gpa;
    public function __construct($name, $gpa)
    {
        $this->name = $name;
        $this->gpa = $gpa;
    }
    public function getName()
    {
        return $this->name;
    }
    public function getGpa()
    {
        return $this->gpa;
    }
    public function setName($name)
    {
        $this->name = $name;
    }
    public function setGpa($gpa)
    {
        $this->gpa = $gpa;
    }
    public function isHonors()
    {
        if ($this->gpa >= 3.0) {
            return "true";
        } else {
            return "false";
        }
    }
    public function toString()
    {
        return $this->name . " " . $this->gpa;
    }
}

// Question 8

function university($idString)
{
    return preg_match("/^[E]-\d{3}[a-z]-\d[a-z]{2}\d/", $idString);
}

function phone($phoneNo)
{
    return preg_match("/\b(313|248|734)-\b\d{3}-\d{4}$/", $phoneNo);
}

?>