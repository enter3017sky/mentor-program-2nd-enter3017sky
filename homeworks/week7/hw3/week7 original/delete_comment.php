<?php

    include_once('./check_login.php');
    require_once('./conn.php');
    require_once('./utils.php');

    if (
        isset($_POST['id']) && 
        !empty($_POST['id'])
    ){
        $id = $_POST['id'];

            // 刪除主留言，或子留言
        $sql = 
        "DELETE FROM enter3017sky_comments 
        WHERE (id = ? or parent_id = ?)
        AND username = ?";
        // 增加判斷條件，使用者 id 符合才能刪除文章
        /* $parent_id 是數字，所以不用引號框起來 */

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("iis", $id, $id, $user);
        if ($stmt->execute()) {
            // server redirect ，PHP 的重新導向
            // header('location: ./index.php');
            echo json_encode(array(
                'result' => 'Success',
                'message' => 'Delete Success'
            ));

        } else {
            // client redirect ，JavaScript 的重新導向
            // printMessage($conn->error, './index.php');
            echo json_encode(array(
                'result' => 'Fail',
                'message' => 'Delete Fail'
            ));
        }
    } else {
        // printMessage('刪除錯誤!!', './index.php');
        echo json_encode(array(
            'result' => 'no execute',
            'message' => 'no execute'
        ));
    }
?>