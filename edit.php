<?php

include "dbConnect.php";

/* Get the user ID */
$id = $_GET['id'];
$sql = ("SELECT * FROM users WHERE id= '$id'");
$results = $pdo->prepare($sql);
$results->execute();

/* Insert in the form the current values of the current user */
$users = $results->fetchAll();
foreach ($users as $user) {
    $name = $user['name'];
    $email = $user['email'];
    $phone = $user['phone'];
}

/* Query to update the values of the current user */
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $sql = ("UPDATE users SET name='$name', email='$email', phone='$phone' WHERE id = '$id'");
    $result = $pdo->prepare($sql);
    $result->execute();
    header('Location: index.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>CRUD - PHP</title>
</head>

<body>
    <header>
        <form method="POST">
            <div>
                <label for="name">Name</label>
                <input value="<?php echo $name; ?>" type="text" name="name" required>
            </div>
            <div>
                <label for="email">Email</label>
                <input value="<?php echo $email; ?>" type="text" name="email" required>
            </div>
            <div>
                <label for="phone">Phone</label>
                <input value="<?php echo $phone; ?>" type="text" name="phone" required>
            </div>
            <button type="submit" value="" name="submit">
                <img src="images/update.svg" alt="">
            </button>

        </form>
    </header>
    <script>
        // avoid form resubmit on page refresh
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
</body>

</html>