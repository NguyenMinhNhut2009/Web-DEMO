<?php

$id = (int) $_GET['id'];
$list_users = get_users_status($id);
if (empty($list_users)) {
    $_SESSION['error'] = "Dữ liệu không tồn tại";
    redirect_to("?mod=users&act=main");
}

/**
 * 	kiểm tra xem rằng danh mục có sản phẩm chưa
 */
$sql = "SELECT* from bill where user_id = $id LIMIT 1";
$list_userskh = array();
$result = mysqli_query($conn, $sql);
$num_rows = mysqli_num_rows($result);
if ($num_rows > 0) {
    $row = $result->fetch_assoc();
    $list_userskh[] = $row;
}


if ($list_userskh == NULL) {
//    $num = deletecategory("category", $id);
    $sql = "DELETE from users where user_id = $id";
    $list_kh = array();
    $result = mysqli_query($conn, $sql);
    $num_rows = mysqli_num_rows($result);
    if ($num_rows > 0) {
        $row = $result->fetch_assoc();
        $list_kh[] = $row;
    }
    if ($list_kh > 0) {
        $_SESSION['success'] = "Xóa thành công";
        redirect_to("?mod=users&act=main");
    } else {
        $_SESSION['error'] = "Xóa thất bại";
        redirect_to("?mod=users&act=main");
    }
} else {
    $_SESSION['error'] = "Khách hàng có đơn hàng ! Nên không thể xóa";
    redirect_to("?mod=users&act=main");
}
?>