<?php

function formatDatetime($time, $format = DATETIME_FORMAT)
{
    return date(DATETIME_FORMAT, strtotime($time));
}

function deviceStatus($status)
{
	if($status === 0) echo "Đang hoạt động";
	else echo "Đang bảo trì";
}