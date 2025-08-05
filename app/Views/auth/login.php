<!-- app/Views/auth/login.php -->
<!DOCTYPE html>
<html>
<head>
    <title><?= $title ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Login</h4>
                    </div>
                    <div class="card-body">
                        <?php if (session()->getFlashdata('error')): ?>
                            <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
                        <?php endif; ?>
                        
                        <?php if (session()->getFlashdata('success')): ?>
                            <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
                        <?php endif; ?>

                        <?php if (session()->getFlashdata('errors')): ?>
                            <div class="alert alert-danger">
                                <?php foreach (session()->getFlashdata('errors') as $error): ?>
                                    <p><?= $error ?></p>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>

                        <form action="/auth/login" method="post">
                            <div class="mb-3">
                                <label class="form-label">Username atau Email</label>
                                <input type="text" class="form-control" name="login" value="<?= old('login') ?>" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" class="form-control" name="password" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Login</button>
                            <a href="/auth/register" class="btn btn-link">Belum punya akun? Register</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>