<?php

/**
 * Render do label para exibir o erro
 * @param string string
 * @return string
 */
function renderLabel($erro, $field)
{
    return (empty($erro) ? '' . $field . '' : '<small class="text-danger">' . $erro . '</small>');
}

/**
 * classe do CSS is-valid ou is-invalid
 * @param string string
 * @return string
 */
function toggleCSSValidOrInvalid($erro)
{
    return (empty($erro) ? '' : ' is-invalid ');
}

function status($status)
{
    $st = [];

    switch ($status) {
        case 0:
            $st[0] = 'warning';
            $st[1] = 'Pendente';
            break;
        case 1:
            $st[0] = 'success';
            $st[1] = 'Finalizada';
            break;
        case 2:
            $st[0] = 'danger';
            $st[1] = 'Atrasada';
            break;
        case 3:
            $st[0] = 'danger';
            $st[1] = 'Cancelada';
            break;
        case 4:
            $st[0] = 'info';
            $st[1] = 'Indefinido';
            break;
    }
    return '<span class="d-block text-center text-' . $st[0] . '">' . $st[1] . '</span>';
}

function priority($priority)
{
    $st = [];

    switch ($priority) {

        case 1:
            $st[0] = 'danger';
            $st[1] = 'Urgente';
            break;
        case 2:
            $st[0] = 'danger';
            $st[1] = 'Importante';
            break;
        case 3:
            $st[0] = 'warning';
            $st[1] = 'Media';
            break;
        case 4:
            $st[0] = 'info';
            $st[1] = 'baixa';
            break;
    }
    return '<span class="badge text-bg-' . $st[0] . ' d-block text-center">' . $st[1] . '</span>';
}
