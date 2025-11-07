<?php
include 'LeenDB.php';

$successMessage = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register'])) {
    $fullname = $_POST['fullname'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $sql = "insert INTO messages (fullname, phone, email, subject, message, created_at)
            VALUES ('$fullname', '$phone', '$email', '$subject', '$message', CURDATE())";

    if (mysqli_query($conn, $sql)) {
        $successMessage = "✅ تم إرسال رسالتك بنجاح";
    } else {
        $successMessage = "❌ خطأ  " . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Thank You</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="submit_form-page">

<?php if (!empty($successMessage)): ?>
    <div class="success-box">
        <h1><?php echo $successMessage; ?></h1>
        <p>شكرًا لاهتمامك، سيتم التواصل معك قريبًا <br></p>
        <a href="../index.html" class="btn">العودة للصفحة الرئيسية</a>
    </div>
<?php endif; ?>

</body>
</html>