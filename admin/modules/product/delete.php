<?php

$id = (int) $_GET['id'];
$list_product =  get_product_status($id);
if (empty($list_product)) {
    $_SESSION['error'] = "Dữ liệu không tồn tại";
    redirect_to("?mod=product&act=main");
}

/**
 * 	kiểm tra xem rằng danh mục có sản phẩm chưa
 */
$sql = "SELECT* from bill_detail where product_id = $id LIMIT 1";
$list_productsp = array();
$result = mysqli_query($conn, $sql);
$num_rows = mysqli_num_rows($result);
if ($num_rows > 0) {
    $row = $result->fetch_assoc();
    $list_productsp[] = $row;
}


if ($list_productsp == NULL) {
//    $num = deletecategory("category", $id);
    $sql = "DELETE from product where id = $id";
    $list_sp = array();
    $result = mysqli_query($conn, $sql);
    $num_rows = mysqli_num_rows($result);
    if ($num_rows > 0) {
        $row = $result->fetch_assoc();
        $list_sp[] = $row;
    }
    if ($list_sp > 0) {
        $_SESSION['success'] = "Xóa thành công";
        redirect_to("?mod=product&act=main");
    } else {
        $_SESSION['error'] = "Xóa thất bại";
        redirect_to("?mod=product&act=main");
    }
} else {
    $_SESSION['error'] = "Khách hàng đang đặt hàng sản phẩm này ! Nên không thể xóa";
    redirect_to("?mod=product&act=main");
}
?>