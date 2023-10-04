<?php
function renderAlerts($arr)
{
    $return = '';

    if ($arr !== null) {
        $return .= '<div class="alert alert-' . $arr['class'] . ' alert-dismissible fade show">';
        $return .= '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
        $return .=  $arr['text'] . '</div>';
        return $return;
    }
}
