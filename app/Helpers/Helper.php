<?php
function getStatusOrder($order)
{
    $status_text = '';
    if ($order->is_payment == 0) {
        $status_text .= '<h4 class="order-item-status is-pending">Chờ thanh toán</h4>';
    } else {
        switch ($order->status) {
            case 0:
                $status_text .= '<h4 class="order-item-status is-pending">Chờ xác nhận</h4>';
                break;
            case 1:
                $status_text .= '<h4 class="order-item-status is-going">Đang giao hàng</h4>';
                break;
            case 2:
                $status_text .= '<h4 class="order-item-status is-going">Đã xác nhận</h4>';
                break;
            case 3:
                $status_text .= '<h4 class="order-item-status is-pending">Đã hủy</h4>';
                break;
        }
    }
    return $status_text;
}
function formetNumber($price)
{
    return number_format($price, 0, '', ',');
}
function formatPrice($price)
{
    return number_format($price, 0, '', ',') . ' đ';
}
function getPriceOfLevel($user, $price)
{
    switch ($user->level) {
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
function selected($value1, $value2)
{
    if ($value1 == $value2) {
        return 'selected = "selected"';
    }
}
