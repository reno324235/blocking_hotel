<!DOCTYPE html>
<html>
<head>
    <title>Tambah User</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .container {
            max-width: 400px;
            margin: 0 auto;
            margin-top: 100px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row mt-6">
            <div class="col-12">
                <h3 class="align-center">Tambah Data User</h3>

                <form action="koneksi.php" method="POST">
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" class="form-control" id="username" name="username" required>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                    <div class="form-group">
                        <label for="role">Role</label>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" name="role" value="admin"> Admin
                        </div>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" name="role" value="user"> User
                        </div>
                        <div class="form-group mt-3">
                            <input type="submit" name="users" value="Submit" class="form-control btn btn-primary">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>