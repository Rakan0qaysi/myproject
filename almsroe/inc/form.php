<?php


set_error_handler(function(int $errno, string $errstr) {
    if ((strpos($errstr, 'Undefined array key') === false) && (strpos($errstr, 'Undefined variable') === false)) {
        return false;
    } else {
        return true;
    }
});


$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$email = $_POST['email'];

$errors = [
    'firstNameErrors' => '',
    'lastNameErrors' => '',
    'emailErrors' => '',
];

if (isset($_POST['submit'])) {

 


    if (empty($firstName)) {
        $errors ['firstNameErrors'] = 'الرجاء الإدخال الأسم الأول';
    }
    if (empty($lastName)) {
        $errors ['lastNameErrors'] = 'الرجاء الأدخال الأسم الأخير';
    }if (empty($email)) {
        $errors ['emailErrors'] = 'الرجاء إدخال بريد الإكتروني';
            }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $errors ['emailErrors'] = 'الرجاء ادخل بريد الإكتروني صحيح';
        }
        
        if (!array_filter($errors)){
                            
                $firstName = mysqli_real_escape_string($conn, $_POST['firstName']);
                $lastName =  mysqli_real_escape_string($conn, $_POST['lastName']);
                $email =     mysqli_real_escape_string($conn, $_POST['email']);


                $sql = "INSERT INTO users(firstName, lastName, email) 
                VALUES ('$firstName', '$lastName', '$email')";


                if (mysqli_query($conn, $sql)) {
                    header('Location: ' .  $_SERVER ['PHP_SELF'] );
                }else{
                    echo 'Error: ' . mysqli_error($conn);
                }
        }
}   




