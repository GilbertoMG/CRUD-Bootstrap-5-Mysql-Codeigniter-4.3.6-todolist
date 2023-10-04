<?php
function dataDBtoBRL($str)
{
    if (strlen($str) >= 8 && trim($str) != "0000-00-00") {
        $dataArray = explode("-", $str);
        return $dataArray[2] . '/' . $dataArray[1] . '/' . $dataArray[0]; // 2016-01-30
    }

    return ""; // vazio

}
