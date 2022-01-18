<?php

function formetNumber($price)
{
    return number_format($price, 0, '', ',');
}
function formatPrice($price)
{
    return number_format($price, 0, '', ',').' đ';
}
function getPriceOfLevel($user, $price) {
    switch ($user->level){
        case 1:
            return $price->price_ctv;
            break;
        case 2: 
            return $price->price_new_daily;
    }
}
function orderStatus($status)
{
    if ($status == 0) {
        return '<span class="text-warning status-order">Chờ xử lý</span>';
    } elseif ($status == 1 || $status == 2) {
        return '<span class="text-info status-order">Đang xử lý</span>';
    } elseif ($status == 3) {
        return '<span class="text-success status-order">Thành công</span>';
    } elseif ($status == 4) {
        return '<span class="text-danger status-order">Đã hủy</span>';
    } else {
        return '<span class="text-light status-order">Đơn hàng hoàn</span>';
    }
}
function shippingStatus($status)
{
    if ($status == 1) {
        return '<span class="text-warning">Chờ lấy hàng</span>';
    } elseif ($status == 2) {
        return '<span class="text-info">Đang giao hàng</span>';
    } elseif ($status == 3) {
        return '<span class="text-success">Đã giao hàng</span>';
    } elseif ($status == 4) {
        return '<span class="text-danger">Đã hủy</span>';
    } else {
        return '<span class="text-light">Đơn hàng hoàn</span>';
    }
}
function shippingMethod($method)
{
    if ($method == 'EMS') {
        return 'Chuyển phát nhanh';
    } else {
        return 'Chuyển phát thường';
    }
}

function checked($value1, $value2)
{
    if ($value1 == $value2) {
        return 'checked';
    }
    return;
}
