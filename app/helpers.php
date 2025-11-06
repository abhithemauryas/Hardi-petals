<?php
use Carbon\Carbon;

function isHot($updated) {
    $updated = Carbon::parse($updated);
    $days = $updated->diffInDays(now());
    return $days < 30;
}

function wrapText($text, $maxLength) {
    if (is_string($text) && strlen($text) > $maxLength) {
        $truncatedText = substr($text, 0, $maxLength) . '...';
        return $truncatedText;
    }
    return $text;
}
