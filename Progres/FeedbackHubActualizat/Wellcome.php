<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FeedbackHub</title>
    <link rel="stylesheet" href="styleWellcome.css">
</head>
<body>
    <?php
    session_start();
    $isLoggedIn = isset($_SESSION['user_id']);
    ?>
    <!-- Continutul site-ului -->
    <header>
        <div class="navbar">
            <a href="#section1">Home</a>
            <a href="#section2">Purpose</a>
            <a href="Login.html">Login</a>
            <a href="FeedbackForms.php">Feedback</a>
            <?php if ($isLoggedIn): ?>
                <a href="Profil.php">Profile</a>
            <?php endif; ?>
            <a href="#footer">Contact</a>
        </div>
    </header>
    <nav>
        <!-- Navigația site-ului -->
    </nav>
    <main>
        <section id="section1">
            <h2>FeedbackHub</h2>
        </section>
        <section id="section2">
            <div class="left-column">
                <p>FeedbackHub is the ideal platform for sharing and receiving honest opinions on any topic. Users can evaluate services, products, and experiences, contributing to their continuous improvement. Join our community and help build a better-informed world through constructive feedback.</p>
            </div>
            <div class="right-column">
                <img src="pics/Feedback1.png" alt="Feedback Image">
            </div>
        </section>
        <section id="section3">
            <h2>What can you do on our platform?</h2>
            <div class="columns-container">
                <div class="column">
                    <img src="pics/flower.png" alt="Image 1">
                </div>
                <div class="column">
                    <img src="pics/scrie.png" class="vertical-images" alt="Image 2">
                    <img src="pics/lista.png" class="vertical-images" alt="Image 3">
                </div>
                <div class="column">
                    <img src="pics/login.png" class="vertical-images" alt="Image 4">
                    <img src="pics/stat.png" class="vertical-images" alt="Image 5">
                </div>
            </div>
        </section>
        <section id="section4">
            <h2>The emotion Chart by Plutchik:</h2>
            <h2>A Structured Analysis of the Human Emotional Spectrum</h2>
            <div class="columns-container">
                <div class="left-column">
                    <img src="pics/diagram.svg" alt="Diagrama Emoțiilor de Plutchik">
                </div>
                <div class="right-column">
                    <p>Tell us what you think!</p>
                    <p>Here are key points about the Plutchik Wheel of Emotions:
                    <p>Eight Primary Emotions: Joy, Trust, Fear, Surprise, Sadness, Disgust, Anger, Anticipation.</p>
                    <p>Emotion Dyads: Combining two primary emotions creates secondary emotions (e.g., Joy + Trust = Love).</p>
                    <p>Intensity Variations: Emotions vary in intensity (e.g., Rage → Anger → Annoyance).
</p>
<p>    Adaptive Function: Emotions aid survival (e.g., Fear triggers fight-or-flight).
</p>
<p>    Opposite Emotions: Opposites are across from each other (e.g., Joy vs. Sadness).
</p>
<p>    Three-Dimensional Model: A 3D cone model shows intensity from mild to intense.
</p>
<p>    Emotion Blends: Complex emotions arise from blends (e.g., Joy + Anticipation = Optimism).
</p>
<p>    Therapeutic Use: Helps in identifying and managing emotions in therapy.
</p>
<p>    Cultural Universality: Primary emotions are universally experienced.
</p>
<p>    Educational Tool: Used to teach emotional intelligence.
</p>
<p>    Visual Aid: Simplifies complex emotional experiences.
</p>
<p>    Research: Widely accepted, but some argue it oversimplifies emotions.
</p>
<p>The Plutchik Wheel helps visualize and understand how emotions interact and affect behavior.</p>
</p>

                </div>
            </div>
        </section>
    </main>
    <footer id="footer">
        <div class="footer-container">
            <div class="left-column">
                <p>Contact</p>
            </div>
            <div class="right-column">
                <img src="pics/contact.png" alt="Contact">
            </div>
        </div>
    </footer>
</body>
</html>
