<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Bellota:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&display=swap"
        rel="stylesheet">
    <link rel="icon" type="image/png" sizes="32x32" href="images/hackers-poulette-logo.png">
    <title>Hackers Poulette</title>
</head>

<body>
    <header class="container">
        <img src="images/hackers-poulette-logo.png" alt="Hackers Poulette logo">
        <h1>Contact us</h1>
    </header>
    
    <?php
    session_start();
    if (isset($_SESSION['success_message'])) {
        echo $_SESSION['success_message'];
        unset($_SESSION['success_message']);
    }
    ?>
    <form method="post" action="contact.php" class="container">
        <div class="mb-3">
           <label for="first-name" class="form-label">First name</label>
           <input type="text" name="first-name" id="first-name" class="form-control" placeholder="enter your name" required>
        </div>
        <div class="mb-3">
           <label for="last-name" class="form-label">Last name</label>
           <input type="text" name="last-name" id="last-name" class="form-control" placeholder="enter your last name" required>
        </div>
        <div class="mb-3">
        <label for="gender" class="form-label">Gender</label>
           <select name="gender" id="gender" class="form-select" placeholder="select" required>
               <option value="female">Female</option>
               <option value="male">Male</option>
           </select>
        </div>
        <div class="mb-3">
           <label for="email" class="form-label">Email address</label>
           <input type="email" name="email" id="email" class="form-control" placeholder="email@example.com" required>
        </div>
        <div class="mb-3">
           <label for="country" class="form-label">Country</label>
           <input type="text" name="country" id="country" class="form-control" placeholder="your country" required>
        </div>
        <div class="mb-3">
           <label for="subject" class="form-label">Subject</label>
           <select name="subject" id="subject" class="form-select">
               <option value="other">other</option>
               <option value="delivery">delivery</option>
               <option value="payments">payments</option>
           </select>
        </div>
        <div class="mb-3">
           <label for="message" class="form-label">Message</label>
           <textarea type="text" name="message" id="message" class="form-control" placeholder="enter your message here" required></textarea>
        </div>
        <div class="mb-3">
            <input type="hidden" name="honeypot" value="">
        </div>
        <div class="mb-3  mx-auto">
           <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</body>

</html>