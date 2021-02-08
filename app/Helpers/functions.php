<?php

if (!function_exists('formatDateTime')) {
    /**
     *
     * Retorna data Carbon como string no formato 'd/m/Y H:i:s'
     *
     * @param $data
     * @return $string
     *
     */
    function formatDateTime($value, $format = 'd/m/Y H:i:s')
    {
        return Carbon\Carbon::parse($value)->format($format);
    }
}

if (!function_exists('response')) {
    /**
     * @param $data
     * @return void
     */
    function response($data, $code = 200)
    {
        header('Content-type:application/json;charset=utf-8', true, $code);
        echo json_encode($data);
    }
}

if (!function_exists('comparaDatas')) {
    /**
     * Comparando as datas $dataEntrada e $dataSaida
     *
     * @param String $dataEntrada Espeara a string no formato DD/MM/YYYY.
     * @param String $dataSaida Espeara a string no formato DD/MM/YYYY.
     *
     * @return String
     * */
    function comparaDatas($dataEntrada, $dataSaida)
    {
        if (is_null($dataEntrada) and is_null($dataSaida)) {
            return -1;
        }

        $timeZone = new \DateTimeZone('UTC');

        $dataEntrada = str_replace('/', '-', $dataEntrada) . ' 00:00:00';
        $dataSaida = str_replace('/', '-', $dataSaida) . ' 00:00:00';

        $data1 = \DateTime::createFromFormat('d-m-Y H:i:s', $dataEntrada, $timeZone);
        $data2 = \DateTime::createFromFormat('d-m-Y H:i:s', $dataSaida, $timeZone);

        /** Testa se sao validas */
        if (!($data1 instanceof \DateTime)) {
            return -1;
        }

        if (!($data2 instanceof \DateTime)) {
            return -1;
        }

        if ($data1 >= $data2) {
            return true;
        } else {
            return false;
        }
    }
}

if (!function_exists('horarios')) {
    function horarios()
    {
        return ['08:00:00', '09:00:00', '10:00:00', '11:00:00', '12:00:00', '13:00:00', '14:00:00', '15:00:00', '16:00:00', '17:00:00', '18:00:00'];
    }
}

if (!function_exists('semana')) {
    function semana()
    {
        return ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sabado'];
    }
}

if (!function_exists('meses')) {
    function meses()
    {
        return ['', 'Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'];
    }
}

if (!function_exists('dataHoraDisponivel')) {
    function dataHoraDisponivel(array $indisponiveis)
    {
        $dataHoraDisponivel = diasDoMes();

        foreach ($indisponiveis as $key => $indisponivel) {
            $diaIndisponivel = formatDateTime($indisponivel['dia'], $format = 'd/m/Y');
            $horarioIndisponivel = $indisponivel['horario'];
            
            foreach ($dataHoraDisponivel as $key2 => $dia) {
                if ($dia['data'] == $diaIndisponivel) {
                    $novoHorarios = array_filter($dia['horarios'], function ($value) use ($horarioIndisponivel) {
                        return ($value != $horarioIndisponivel);
                    });

                    $dataHoraDisponivel[$key2]['horarios'] = array_values($novoHorarios);
                }
            }
        }

        return $dataHoraDisponivel;
    }
}

if (!function_exists('diasDoMes')) {
    function diasDoMes($mes = null)
    {
        $dia = "01";
        $mes = str_pad($mes ?? date("m"), 2, "0", STR_PAD_LEFT);
        $ano = date("Y");
        $data = $dia."-".$mes."-".$ano;
        
        $dia_da_semana = semana();
        $meses = meses();
        
        $dia_da_semana_inicial = date('w', strtotime($data)); // pega o dia da semana em inteiro

        $dias = array(); // lista de dias
        
        $x = (int)$dia_da_semana_inicial;
        
        $semana = 1;
        while (true) {
            $indexMes = (int)$mes;

            $d = explode('-', $data);

            $datasFutura = comparaDatas($data, date('d-m-Y'));

            if ($x != 0 && $datasFutura === true) {
                $dias[] = [
                    'dia'               => $d[0],
                    'mes'               => $d[1],
                    'ano'               => $d[2],
                    'data'              => str_replace('-', '/', $data),
                    'nome_mes'          => $meses[$indexMes],
                    'numero_semana'     => $semana,
                    'semana'            => $dia_da_semana[$x],
                    'horarios'          => horarios()
                ];
            }
        
            // verifica se mudou o mês
            $data = date('d-m-Y', strtotime("+1 day", strtotime($data)));
            $dataVerifi = explode("-", $data);
            if ($dataVerifi[1] != $mes) {
                // se mudou o mes para o loop
                break;
            }
        
            if ($x == 6) {
                $x = 0;
                $semana++;
            } else {
                $x++;
            }
        }

        return $dias;
    }
}
