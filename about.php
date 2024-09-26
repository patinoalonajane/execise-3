<?php

$feedbackFile = 'feedback.txt';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $feedback = htmlspecialchars($_POST['feedback']);
    
    
    $feedbackEntry = "Feedback: $feedback, Submitted on: " . date('Y-m-d H:i:s') . "\n";

   
    file_put_contents($feedbackFile, $feedbackEntry, FILE_APPEND);
}


$feedbackEntries = [];
if (file_exists($feedbackFile)) {
    $feedbackEntries = file($feedbackFile, FILE_IGNORE_NEW_LINES);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>About Us</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="aboutstyle.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
</head>
<body background="Bg.jpg">

    <div class="navbar">
            <h1>Group Nine</h1>
            <div>
                <a href="index.php">Home</a>
                <a href="about.php">About</a>
                <a href="contact.php">Contact</a>
            </div>
    </div>
    <div class="container">
        <h1 style="text-align: center;">About Us</h1>
       
        
        
        <div class="section">
            <div class="description">
                <h2>Our Mission</h2>
                <p>
                Our mission is to empower individuals through innovative solutions and exceptional service. We are dedicated to fostering growth 
                and success in our community by providing quality products, inspiring creativity, and maintaining a commitment to excellence. 
                We believe in building lasting relationships with our clients and partners, ensuring their needs are met with integrity and professionalism.
                </p>
            </div>
            <img src="Aboutimg.png" alt="Mission Image">
        </div>

       
        <div class="section">
            <img src="Aboutimg.png" alt="Vision Image">
            <div class="description">
                <h2>Our Vision</h2>
                <p>
                Our vision is to be a leading force in our industry, recognized for our commitment to innovation and sustainability.
                We aspire to create a world where individuals are empowered to achieve their dreams and contribute positively to society.
                Through our dedication to excellence and collaboration, we aim to inspire change and foster a brighter future for all.
                </p>
            </div>
        </div>

        <div class="container">
        <h1 style="text-align: center;">Feedback</h1>
        
      
        <div class="feedback-section">
            <h2 style="text-align: center;">We value your feedback!</h2>
            <form id="feedbackForm" method="POST" action="about.php">
                <label for="feedback">Your Feedback:</label>
                <textarea id="feedback" name="feedback" required></textarea>
                <button type="submit">Submit Feedback</button>
            </form>
        </div>

       
        <div class="past-feedback">
            <h2 style="text-align: center;">Past Feedback</h2>
            <?php if (!empty($feedbackEntries)): ?>
                <ul>
                    <?php foreach ($feedbackEntries as $entry): ?>
                        <li><?= htmlspecialchars($entry) ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php else: ?>
                <p>No feedback yet.</p>
            <?php endif; ?>
        </div>
    </div>

</body>
</html>