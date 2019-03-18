<?php

function formatDatetime($time, $format = DATETIME_FORMAT)
{
    return date(DATETIME_FORMAT, strtotime($time));
}