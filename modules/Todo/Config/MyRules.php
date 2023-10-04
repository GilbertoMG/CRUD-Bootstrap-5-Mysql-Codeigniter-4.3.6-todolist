<?php

namespace Modules\Todo\Config;

class MyRules
{
    function isValidDateAndFuture($date)
    {
        // Obtém a data de hoje (sem levar em conta os minutos)
        $today = new \DateTime('today');

        // Tenta criar um objeto DateTime a partir da data fornecida
        $inputDate = \DateTime::createFromFormat('Y-m-d', $date);

        // Verifica se a data foi criada corretamente e se é válida
        if (!$inputDate || $inputDate->format('Y-m-d') !== $date) {
            return false; // A data é inválida
        }

        // Compara a data de hoje com a data fornecida (apenas o dia é considerado)
        if ($inputDate < $today) {
            return false; // A data não é maior que hoje
        }

        return true; // A data é válida e maior que hoje
    }
   
}
