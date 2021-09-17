<?php
include "dbConnect.php";

/* GET DATA FROM FORM AND INSERT INTO DATABASE */
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $sql = "INSERT INTO users (name, email, phone)
                       VALUES ('$name', '$email', '$phone')";
    $result = $pdo->prepare($sql);
    $result->execute();
    header('Locatiin: index.php');
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
                <input type="text" name="name" required>
            </div>
            <div>
                <label for="email">Email</label>
                <input type="text" name="email" required>
            </div>
            <div>
                <label for="phone">Phone</label>
                <input type="text" name="phone" required>
            </div>
            <button type="submit" value="" name="submit">
                <img src="images/add.svg" alt="">
            </button>
        </form>
    </header>
    <main>
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>E-mail</th>
                    <th>Phone</th>
                    <th>Edit</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $result = $pdo->prepare("SELECT * FROM users");
                $result->execute();
                $users = $result->fetchAll();
                foreach ($users as $user) {
                ?>
                    <tr>
                        <td>
                            <?php echo $user['name']; ?>
                        </td>
                        <td>
                            <?php echo $user['email']; ?>
                        </td>
                        <td>
                            <?php echo $user['phone']; ?>
                        </td>
                        <td class="buttons">


                            <button class="btn-edit">
                                <a href="">
                                    <img src="images/edit.svg" alt="">
                                </a>
                            </button>


                            <button class="btn-delete">
                                <a href="delete.php?id=<?php echo $user['id']; ?>">
                                    <img src="images/delete.svg" alt="">
                                </a>
                            </button>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </main>

    <script>
        // avoid form resubmit on page refresh
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
</body>

</html>