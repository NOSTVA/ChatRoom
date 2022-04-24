<?php include_once "header.php"; ?>

<body>

    <div class="wrapper">
        <section class="form login">
            <header>Chat Prototype</header>
            <form action="0">
                <div class="error-text"></div>

                <div class="field input">
                    <label>Email Address</label>
                    <input type="text" name="email" placeholder="Enter your email">
                </div>
                <div class="field input">
                    <label>Passsword</label>
                    <input type="password" name="password" placeholder="Enter your password">
                </div>
                <div class="field button">
                    <input type="submit" value="Continue to chat">
                </div>
            </form>
            
            <div class="link">Not yet signed up? <a href="#">signup now</a></div>
        </section>
    </div>
    <script src="js\login.js"></script>
</body>

</html>