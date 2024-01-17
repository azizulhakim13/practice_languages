<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div class="text-bg-warning ">
        <div class="container py-5">
            <h2 class="pb-3">Registration Form:</h2>
            <form action="connect.php" method="post">
                <label for="user">Name: </label><br>
                <input type="text" name="name" id="name" required><br><br>

                <label for="email">Email:</label><br>
                <input type="email" name="email" id="email" required><br><br>

                <label for="phone">Phone:</label><br>
                <input type="text" name="phone" id="phone" required><br><br>

                <label for="bgroup">Blood Group:</label><br>
                <input type="text" name="bgroup" id="bgroup" required><br><br>

                <input class="btn btn-dark" type="submit" name="submit" id="submit">         
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>