<?php
include 'includes/database.php';
include 'includes/functions.php';
include 'header.php';

// Achtergrondafbeelding variabele
?>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Your Page Title</title>
  <link rel="stylesheet" href="css/styles.css">
</head>
<div class="about-section">
  <h1>Over Ons</h1>
  <p>Welkom bij ons charmante toevluchtsoord, gelegen in een rustige en pittoreske omgeving. </p>
  <p> Ons Airbnb-huisje biedt het perfecte toevluchtsoord voor reizigers die op zoek zijn naar comfort, stijl en gemak tijdens hun verblijf.</p>
</div>

<h2 style="text-align:center">Ons Team</h2>
<div class="row">
  <div class="column">
    <div class="card">
      <!-- <img src="/w3images/team1.jpg" alt="Jane" style="width:100%"> -->
      <div class="container">
        <h2>Jane Doe</h2>
        <p class="title">CEO & Founder</p>
        <p>Some text that describes me lorem ipsum ipsum lorem.</p>
        <p>jane@example.com</p>
      </div>
    </div>
  </div>

  <div class="column">
    <div class="card">
      <!-- <img src="/w3images/team2.jpg" alt="Mike" style="width:100%"> -->
      <div class="container">
        <h2>Mike Ross</h2>
        <p class="title">Art Director</p>
        <p>Some text that describes me lorem ipsum ipsum lorem.</p>
        <p>mike@example.com</p>
      </div>
    </div>
  </div>

  <div class="column">
    <div class="card">
      <!-- <img src="/w3images/team3.jpg" alt="John" style="width:100%"> -->
      <div class="container">
        <h2>John Doe</h2>
        <p class="title">Designer</p>
        <p>Some text that describes me lorem ipsum ipsum lorem.</p>
        <p>john@example.com</p>
      </div>
    </div>
  </div>
</div>