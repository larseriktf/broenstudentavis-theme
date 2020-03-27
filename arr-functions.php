<?php

function booleanTilString($boolean) {
    if ($boolean == "1") {
        return "Ja";
    }
    else {
        return "Nei";
    }
}

function konverterDato($dato) {
    $dato = str_replace('.', '-', $dato);
    return date('Y-m-d', strtotime($dato));
}

function datoTilTekst($dato) {
    $mnd = array('01' => 'Januar', '02' => 'Februar', '03' => 'Mars', '04' => 'April', '05' => 'Mai', '06' => 'Juni',
        '07' => 'Juli', '08' => 'August', '09' => 'September', '10' => 'Oktober', '11' => 'November', '12' => 'Desember');

    $mndTall = substr($dato, 5, 2);
    $mndTekst = $mnd[$mndTall];

    if (substr($dato, 8, 1) == '0') {
        $dag = substr($dato, 9, 1);
    }
    else {
        $dag = substr($dato, 8, 2);
    }

    $ar = substr($dato, 0, 4);

    return $dag . ". " . $mndTekst . " " . $ar;
}

function arrfarge($arrType) {
    if ($arrType == "sos") {
        return "sos";
    }
    else if ($arrType == "fsp") {
        return "fsp";
    }
    else if ($arrType == "for") {
        return "for";
    }
    else if ($arrType == "sih") {
        return "sih";
    }
    else {
        return "andre";
    }
}
