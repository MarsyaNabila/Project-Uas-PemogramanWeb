<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login | FoodApp</title>
    <link rel="stylesheet" href="/makanan_penjualan/public/css/style.css">
</head>
<body>

<div class="login-page">
    <div class="login-card">

        <div class="login-title">🍭 Login FoodApp</div>

        <?php if(isset($_SESSION['error'])): ?>
            <div class="login-error">
                <?= $_SESSION['error']; unset($_SESSION['error']); ?>
            </div>
        <?php endif; ?>

        <form method="POST" action="/makanan_penjualan/auth/login">
            <input 
                type="text" 
                name="username" 
                placeholder="Username" 
                required
            >

            <input 
                type="password" 
                name="password" 
                placeholder="Password" 
                required
            >

            <button type="submit" class="login-btn">
                Login
            </button>
        </form>

    </div>
</div>

</body>
</html>
