<?php 
require '../config/function.php';
if(isset($_POST['saveUser'])) {
    $name = validate($_POST['name']);
    $phone = validate($_POST['phone']);
    $email = validate($_POST['email']);
    $password = validate($_POST['password']);
    $is_ban = validate($_POST['is_ban']) == true ? 1:0;
    $role = validate($_POST['role']);
    
    if ($name != '' || $email != '' || $phone != '' || $password != '' || $role != '' || $is_ban != '' ) {
        $query = "INSERT INTO users (username, user_email, user_password, user_phone, is_ban, role) 
                VALUES ('$name','$email','$password','$phone','$is_ban','$role')";
        $result = mysqli_query($conn, $query);
        if($result){
            redirect('users.php', 'User/Admin Added Successfuly');
        } else {
            redirect('users-create.php', 'Somthing Went Wrong');
        }
    } else {
        redirect('users-create.php', 'Please fill all the input fields.');
    }
}

if(isset($_POST['updateUser'])) {
    $name = validate($_POST['name']);
    $phone = validate($_POST['phone']);
    $email = validate($_POST['email']);
    $password = validate($_POST['password']);
    $is_ban = validate($_POST['is_ban']) == true ? 1:0;
    $role = validate($_POST['role']);

    $userId = validate($_POST['userId']);
    $user = getById('users', $userId);
    if($user['status'] != 200) {
        redirect('users-edit.php?user_id='.$userId, 'No Such ID is Found.');
    }
    
    if ($name != '' || $email != '' || $phone != '' || $password != '' || $role != '' || $is_ban != '' ) {
        $query = "UPDATE users SET 
                    username = '$name',
                    user_email = '$email',
                    user_password = '$password', 
                    user_phone = '$phone', 
                    is_ban = '$is_ban', 
                    role = '$role'
                    WHERE user_id = '$userId'";
        $result = mysqli_query($conn, $query);
        if($result){
            redirect('users-edit.php?user_id='.$userId, 'User/Admin Updated Successfuly');
        } else {
            redirect('users-create.php', 'Somthing Went Wrong');
        }
    } else {
        redirect('users-create.php', 'Please fill all the input fields.');
    }
}
?>