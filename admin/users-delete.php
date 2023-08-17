<?php 
require '../config/function.php';

$paraResult = chechParamId('user_id');
if(is_numeric($paraResult)){
    $userId = validate($paraResult);

    $user = getById('users', $userId);
    if($user['status'] == 200) {
        $userDeleteRes = deleteQuery('users', $userId);
        if($userDeleteRes){
            $user = redirect('users.php', 'User Deleted Successfuly');
        } else {
            $user = redirect('users.php', 'Somthing Went Wrong');
        }
    } else {
        $user = redirect('users.php', $user['message']);
    }
} else {
    redirect('users.php', $paraResult);
}
?>