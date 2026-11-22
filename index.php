<?php
include "constants.php";
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>File Actions</title>

<style>

/* RESET */
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family: Arial, sans-serif;
}

/* BODY LAYOUT (IMPORTANT FOR FOOTER) */
body{
    display:flex;
    flex-direction:column;
    min-height:100vh;
    background: linear-gradient(135deg, #eef2f3, #dfe9f3);
}

/* MAIN CONTENT CENTER */
.main{
    flex:1;
    display:flex;
    justify-content:center;
    align-items:center;
}

/* BUTTON CONTAINER */
.btn-container{
    display:flex;
    gap:20px;
    flex-wrap:wrap;
    justify-content:center;
}

/* BUTTON STYLE */
.share-btn{
    text-decoration:none;
    padding:16px 35px;
    border-radius:50px;
    background: linear-gradient(135deg, #021A54, #0a2ea8);
    color:#fff;
    font-size:18px;
    font-weight:bold;
    display:inline-flex;
    align-items:center;
    justify-content:center;
    gap:10px;
    transition: all 0.3s ease;
    box-shadow: 0 8px 20px rgba(0,0,0,0.2);
    position:relative;
    overflow:hidden;
}

/* SECOND BUTTON */
.share-btn.alt{
    background: linear-gradient(135deg, #0a8f3c, #16c75a);
}

/* GLOW EFFECT */
.share-btn::before{
    content:'';
    position:absolute;
    top:0;
    left:-100%;
    width:100%;
    height:100%;
    background: rgba(255,255,255,0.2);
    transition:0.5s;
}

.share-btn:hover::before{
    left:100%;
}

/* HOVER */
.share-btn:hover{
    transform: translateY(-5px) scale(1.05);
    box-shadow: 0 15px 30px rgba(0,0,0,0.3);
}

/* CLICK */
.share-btn:active{
    transform: scale(0.95);
}

/* ================= FOOTER ================= */
footer{
    background:#1e1e2f;
    color:#fff;
    padding:25px;
    text-align:center;
}

footer h2{
    margin-bottom:10px;
    font-size:20px;
}

.footer-links{
    margin:10px 0;
}

.footer-links a{
    color:#00bcd4;
    margin:0 10px;
    text-decoration:none;
    transition:0.3s;
}

.footer-links a:hover{
    color:#fff;
}

footer p{
    margin:8px 0;
    font-size:14px;
}

.bottom-text{
    margin-top:10px;
    font-size:12px;
    color:#aaa;
}

/* 📱 MOBILE RESPONSIVE */
@media (max-width:600px){

    .main{
        padding:20px;
    }

    .btn-container{
        flex-direction:column;
        width:100%;
    }

    .share-btn{
        width:100%;
        padding:14px;
        font-size:16px;
    }

    footer{
        padding:20px 15px;
    }

    footer h2{
        font-size:18px;
    }

    .footer-links{
        display:flex;
        flex-direction:column;
        gap:8px;
    }

    .footer-links a{
        margin:0;
        font-size:14px;
    }

    footer p{
        font-size:13px;
    }

    .bottom-text{
        font-size:11px;
    }
}

/* Header styling */
.header {
    background: linear-gradient(135deg, #172554, #2563eb);
    color: white;
    padding: 25px 40px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 30px;
    border-radius: 0 0 12px 12px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    font-family: Arial, sans-serif;
}

/* Title section */
.header-content h1 {
    margin: 0;
    font-size: 28px;
    font-weight: 700;
    letter-spacing: 0.5px;
}

.header-content p {
    margin: 8px 0 0;
    color: #dbeafe;
    font-size: 14px;
}

/* Login form */
.login-form {
    display: flex;
    align-items: flex-end;
    gap: 15px;
}

.form-group {
    display: flex;
    flex-direction: column;
    gap: 6px;
}

.form-group label {
    font-size: 13px;
    font-weight: 600;
    color: #e0e7ff;
}

.form-group input {
    width: 170px;
    padding: 10px 12px;
    border: 1px solid #93c5fd;
    border-radius: 6px;
    outline: none;
    font-size: 14px;
    background: white;
    color: #1e293b;
    transition: 0.3s;
}

.form-group input:focus {
    border-color: #facc15;
    box-shadow: 0 0 0 3px rgba(250, 204, 21, 0.2);
}

/* Login button */
.login-form button {
    padding: 10px 22px;
    background: #facc15;
    color: #172554;
    border: none;
    border-radius: 6px;
    font-size: 14px;
    font-weight: bold;
    cursor: pointer;
    transition: 0.3s;
}

.login-form button:hover {
    background: #fde047;
    transform: translateY(-2px);
}

/* Responsive design */
@media (max-width: 768px) {
    .header {
        flex-direction: column;
        align-items: stretch;
        text-align: center;
        padding: 25px 20px;
    }

    .login-form {
        flex-direction: column;
        align-items: stretch;
        width: 100%;
    }

    .form-group input {
        width: auto;
    }

    .login-form button {
        width: 100%;
    }
}

.user-info {
    display: flex;
    align-items: center;
    gap: 20px;
    color: white;
    font-size: 15px;
}

.user-info strong {
    color: #facc15;
}

.user-info button {
    padding: 9px 18px;
    background: #ef4444;
    color: white;
    border: none;
    border-radius: 6px;
    cursor: pointer;
    font-weight: bold;
}

.user-info button:hover {
    background: #dc2626;
}

</style>
</head>

<body>

<header class="header">
    <div class="header-content">
        <h1>File Sharing System</h1>
        <p>Securely share your files anywhere, anytime.</p>
    </div>
    <?php
    if (isset($_SESSION["username"])): ?>
    <div class="user-info">
        <span>Welcome, <strong id="loggedUsername"><?= $_SESSION["username"] ?></strong>!</span>
        <a href="<?= host ?>/logout.php"><button>Logout</button></a>
    </div>
    <?php else: ?>
    <form action="<?= host ?>/login.php" class="login-form" method="post">
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" name="uname" id="username"
                   placeholder="Enter username" required>
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="passw" id="password"
                   placeholder="Enter password" required>
        </div>

        <button type="submit">Login</button>
    </form>
    <?php endif; ?> 
</header>

<!-- MAIN -->
<div class="main">
    <div class="btn-container">

        <a href="<?= host ?>/file/admin.php" class="share-btn">
            📤 Share File
        </a>

        <a href="<?= host ?>/file/user.php" class="share-btn alt">
            📂 Select File
        </a>

    </div>
</div>

<!-- FOOTER -->
<footer>
    <div class="footer-links">
        <a href="http://filemanagement.gamer.gd/">Home</a>
        <a href="http://suman-thapa.com.np/">Contact</a>
    </div>

    <p>Providing quality service and user experience.</p>

    <div class="bottom-text">
        © 2026 All Rights Reserved | Powered by <strong>Suman</strong>
    </div>
</footer>

</body>
</html>