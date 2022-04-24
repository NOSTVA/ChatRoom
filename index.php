<?php include_once "header.php"; ?>

<body>

    <div class="wrapper">
        <section class="form signup">
            <header>Chat Prototype</header>
            <form action="0" enctype="multipart/form-data">
                <div class="error-text"></div>
                <div class="name-details">
                    <div class="field input">
                        <label>First Name</label>
                        <input type="text" name= "fname" placeholder="First Name" required>
                    </div>
                    <div class="field input">
                        <label>Last Name</label>
                        <input type="text" name= "lname" placeholder="Last Name" required>
                    </div>
                </div>
                <div class="field input">
                    <label>Email Address</label>
                    <input type="text" name= "email" placeholder="Enter your email" required>
                </div>
                <div class="field input">
                    <label>Passsword</label>
                    <input type="password" name= "password" placeholder="Enter new password" required>
                </div>
                <div class="field input">
                    <label>Select Image</label>
                    <input type="file" name= "image" required>
                </div>
                <div class="field button">
                    <input type="submit" value="Continue to chat">
                </div>
            </form>
            <div class="link">Already signed up? <a href="#">Log in now</a></div>
        </section>
    </div>
    <script src="js\signup.js"></script>

</body>

</html>