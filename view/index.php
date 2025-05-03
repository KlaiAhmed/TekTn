<?php
require_once __DIR__ . '/../controller/stats.php';
$ctrl = new Statscontroller();
$counts = $ctrl->getCounts();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="./assets/icons/icon.png">
    <title>Tek TN</title>

    <!-- local Scripts -->
    <script src="./global/scripts/islogged.js.php" defer></script>
    <script src="./global/scripts/navbar.js" defer></script>
    <script src="./global/scripts/chatbot.js" defer></script>
    <script src="/tektn/view/global/scripts/redirect.js" defer></script>
    <script src="/tektn/view/global/scripts/search.js" defer></script>

    <!-- External Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css">

    <!-- Local Styles -->
    <link rel="stylesheet" href="./global/styles/navstyle.css">
    <link rel="stylesheet" href="./global/styles/chatbot.css">
    <link rel="stylesheet" href="styles.css">
</head>

<body>

    <!-- Navbar -->
    <section>
        <div id="navbar">
            <a  class="lien" data-url="/tektn/view/index.php">
                <img src="/tektn/view/assets/icons/icon.png" alt="logo" id="logo">
            </a>
            <div id="linkscontainer">
            <ul id="ul">

                <!--search icon-->
                <li>
                    <img src="/tektn/view/assets/icons/search.png" id="search-btn"></img>
                </li>
                <li class="nav__close" id="nav-close">
                    <i class="ri-close-line"></i>
                </li>
                
                <!--logged -->
                <li class="dropdown">
                    <button class="profile-btn" onclick="toggledrop()">
                        <svg class="bi bi-person" viewBox="0 0 16 16" fill="currentColor">
                            <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z"/>
                        </svg>
                    </button>
                    <div class="dropdown-content" id="drop">
                        <a data-url="/tektn/view/pages/profile/profile.php" class="value lien">
                            <svg viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" data-name="Layer 2"><path fill="#7D8590" d="m1.5 13v1a.5.5 0 0 0 .3379.4731 18.9718 18.9718 0 0 0 6.1621 1.0269 18.9629 18.9629 0 0 0 6.1621-1.0269.5.5 0 0 0 .3379-.4731v-1a6.5083 6.5083 0 0 0 -4.461-6.1676 3.5 3.5 0 1 0 -4.078 0 6.5083 6.5083 0 0 0 -4.461 6.1676zm4-9a2.5 2.5 0 1 1 2.5 2.5 2.5026 2.5026 0 0 1 -2.5-2.5zm2.5 3.5a5.5066 5.5066 0 0 1 5.5 5.5v.6392a18.08 18.08 0 0 1 -11 0v-.6392a5.5066 5.5066 0 0 1 5.5-5.5z"></path></svg>
                            Profile
                        </a>
                        <a  data-url="/tektn/view/pages/feedback/feedback.php" class="value lien">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="#7D8590" class="bi bi-hand-thumbs-up" viewBox="0 0 16 16"><path d="M8.864.046C7.908-.193 7.02.53 6.956 1.466c-.072 1.051-.23 2.016-.428 2.59-.125.36-.479 1.013-1.04 1.639-.557.623-1.282 1.178-2.131 1.41C2.685 7.288 2 7.87 2 8.72v4.001c0 .845.682 1.464 1.448 1.545 1.07.114 1.564.415 2.068.723l.048.03c.272.165.578.348.97.484.397.136.861.217 1.466.217h3.5c.937 0 1.599-.477 1.934-1.064a1.86 1.86 0 0 0 .254-.912c0-.152-.023-.312-.077-.464.201-.263.38-.578.488-.901.11-.33.172-.762.004-1.149.069-.13.12-.269.159-.403.077-.27.113-.568.113-.857 0-.288-.036-.585-.113-.856a2 2 0 0 0-.138-.362 1.9 1.9 0 0 0 .234-1.734c-.206-.592-.682-1.1-1.2-1.272-.847-.282-1.803-.276-2.516-.211a10 10 0 0 0-.443.05 9.4 9.4 0 0 0-.062-4.509A1.38 1.38 0 0 0 9.125.111zM11.5 14.721H8c-.51 0-.863-.069-1.14-.164-.281-.097-.506-.228-.776-.393l-.04-.024c-.555-.339-1.198-.731-2.49-.868-.333-.036-.554-.29-.554-.55V8.72c0-.254.226-.543.62-.65 1.095-.3 1.977-.996 2.614-1.708.635-.71 1.064-1.475 1.238-1.978.243-.7.407-1.768.482-2.85.025-.362.36-.594.667-.518l.262.066c.16.04.258.143.288.255a8.34 8.34 0 0 1-.145 4.725.5.5 0 0 0 .595.644l.003-.001.014-.003.058-.014a9 9 0 0 1 1.036-.157c.663-.06 1.457-.054 2.11.164.175.058.45.3.57.65.107.308.087.67-.266 1.022l-.353.353.353.354c.043.043.105.141.154.315.048.167.075.37.075.581 0 .212-.027.414-.075.582-.05.174-.111.272-.154.315l-.353.353.353.354c.047.047.109.177.005.488a2.2 2.2 0 0 1-.505.805l-.353.353.353.354c.006.005.041.05.041.17a.9.9 0 0 1-.121.416c-.165.288-.503.56-1.066.56z"/></svg>
                            Feedback
                        </a>
                        <a data-url="/tektn/controller/logout.php" class="value lien">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="#7D8590" class="bi bi-box-arrow-left" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0z"/><path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708z"/></svg>
                            Logout
                        </a>
                    </div>
                </li>

                <!--not logged-->
                <li>
                <a class="links lien" data-url="/tektn/view/pages/login/login.php">
                    <span class="animation">Login</span>
                </a>
                </li>
                <li>
                <a class="links lien" data-url="/tektn/view/pages/login/login.php?form=signup">
                    <span class="animation">Signup</span>
                </a>
                </li>
            </ul>
        </div>

        <!-- Search bar -->
        <div class="search" id="search">
            <form action="#" class="search__form">
                <i class="ri-search-line search__icon"></i>
                <input type="search" placeholder="What are you looking for?" class="search__input" name="search__form" autocomplete="off">
            </form>
            <i class="ri-close-line search__close" id="search-close"></i>
        </div>
    </section>


    <!--banner-->
    <br>
    <section>
        <main class="main">
            <div class="section banner banner-section">
                <div class="container banner-column">
                    <img class="banner-image" src="/tektn/view/assets/images/banner.webp" alt="Illustration">
                    <div class="banner-inner">
                        <h1 class="heading-xl">All your learning, all in one place.</h1>
                        <p class="paragraph">
                            Dive into interactive courses, explore rich resources, and unlock your full potential, anytime inspiration strikes.
                            Your journey to knowledge starts here.
                        </p>
                        <a href="/tektn/view/index.php#cards" class="btn btn-darken btn-inline" style="padding: 10px 20px; font-size: 14px;">
                            Get Started &emsp;<i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </main>
   </section>

    <!--Stat cards-->
    <br>
    <div class="stat-container">

        <div class="stat-card">
            <h3>Topics</h3>
            <div class="count"><?= htmlspecialchars($counts['topics']) ?></div>
        </div>

        <div class="stat-card">
            <h3>Courses</h3>
            <div class="count"><?= htmlspecialchars($counts['courses']) ?></div>
        </div>

        <div class="stat-card">
            <h3>Students enrolled</h3>
            <div class="count"><?= htmlspecialchars($counts['users']) ?></div>
        </div>

        <div class="stat-card">
            <h3>Staff Members</h3>
            <div class="count"><?= htmlspecialchars($counts['staff_members']) ?></div>
        </div>
    </div>

    <!--Carrousel-->
    <br>
    <section id="carrousel">
        <div class="motivational-text">
            <h2>Most Visited Courses</h2>
            <p>Browse the courses our learners love the most! 🔥📚</p>
        </div>
        <div class="slider">
        <div class="slide-track">
        <div class="container-cards">
        <div class="card" style="width: 19rem">
        <img src="https://images.unsplash.com/photo-1526379095098-d400fd0bf935?w=1000&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8cHl0aG9ufGVufDB8fDB8fHww" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">Python</h5>
            <a data-url="/tektn/view/pages/courses/development/cours/python/python.php" class="btn btn-primary" onclick="window.location.href=this.dataset.url">Visit</a>
        </div>
        </div>
        <div class="card" style="width: 19rem">
        <img src="https://plus.unsplash.com/premium_photo-1675367606828-5d2e9bcd5d80?w=1000&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NXx8ZXNwYWdub2x8ZW58MHx8MHx8fDA%3D" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">Espagnol</h5>
            <a data-url="/tektn/view/pages/courses/languages/cours/spanish/spanish.php" class="btn btn-primary" onclick="window.location.href=this.dataset.url">Visit</a>
        </div>
        </div>
        <div class="card" style="width: 19rem">
        <img src="https://images.unsplash.com/photo-1599507593499-a3f7d7d97667?w=1000&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8UEhQfGVufDB8fDB8fHww" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">PHP</h5>
            <a data-url="/tektn/view/pages/courses/development/cours/php/php.php" class="btn btn-primary" onclick="window.location.href=this.dataset.url">Visit</a>
        </div>
        </div>
        <div class="card" style="width: 19rem">
        <img src="https://plus.unsplash.com/premium_photo-1663013659189-58ff1c9e1976?w=1000&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NXx8TWFya2V0aW5nJTIwQW5hbHlzaXN8ZW58MHx8MHx8fDA%3D" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">Marketing</h5>
            <a data-url="/tektn/view/pages/courses/marketing/cours/analyse/analyse.php" class="btn btn-primary" onclick="window.location.href=this.dataset.url">Visit</a>
        </div>
        </div>
        <div class="card" style="width: 19rem">
        <img src="https://images.unsplash.com/photo-1743179508997-3298efe1a439?w=1000&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8N3x8ZnJlbnNoJTIwZmxhZ3xlbnwwfHwwfHx8MA%3D%3D" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">French</h5>
            <a data-url="/tektn/view/pages/courses/languages/cours/French/French.php" class="btn btn-primary" onclick="window.location.href=this.dataset.url">Visit</a>
        </div>
        </div>
        <div class="card" style="width: 19rem">
        <img src="https://images.unsplash.com/photo-1635070041078-e363dbe005cb?w=1000&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8bWF0aHxlbnwwfHwwfHx8MA%3D%3D" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">Math</h5>
            <a data-url="/tektn/view/pages/courses/science/cours/math/math.php" class="btn btn-primary" onclick="window.location.href=this.dataset.url">Visit</a>
        </div>
        </div>
        <div class="card" style="width: 19rem">
        <img src="https://images.unsplash.com/photo-1628863353691-0071c8c1874c?w=1000&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8M3x8Y2hlbWlzdHJ5fGVufDB8fDB8fHww" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">Chemistry</h5>
            <a data-url="/tektn/view/pages/courses/science/cours/chimie/chimie.php" class="btn btn-primary" onclick="window.location.href=this.dataset.url">Visit</a>
        </div>
        </div>
        <div class="card" style="width: 19rem">
        <img src="https://images.unsplash.com/photo-1557838923-2985c318be48?w=1000&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8RGlnaXRhbCUyME1hcmtldGluZ3xlbnwwfHwwfHx8MA%3D%3D" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">Digital Marketing</h5>
            <a data-url="/tektn/view/pages/courses/marketing/cours/digital/digital.php" class="btn btn-primary" onclick="window.location.href=this.dataset.url">Visit</a>
        </div>
        </div>
        <div class="card" style="width: 19rem">
        <img src="https://images.unsplash.com/photo-1609599006353-e629aaabfeae?w=1000&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8cXVyYW58ZW58MHx8MHx8fDA%3D" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">Quran</h5>
            <a data-url="/tektn/view/pages/courses/islamic/course/quran/quran.php" class="btn btn-primary" onclick="window.location.href=this.dataset.url">Visit</a>
        </div>
        </div>
        <div class="card" style="width: 19rem">
        <img src="https://images.unsplash.com/photo-1611162617213-7d7a39e9b1d7?w=1000&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8ZmlnbWF8ZW58MHx8MHx8fDA%3D" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">Figma</h5>
            <a data-url="/tektn/view/pages/courses/design/cours/figma/figma.php" class="btn btn-primary" onclick="window.location.href=this.dataset.url">Visit</a>
        </div>
        </div>
        <div class="card" style="width: 19rem">
        <img src="https://images.unsplash.com/photo-1526379095098-d400fd0bf935?w=1000&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8cHl0aG9ufGVufDB8fDB8fHww" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">Python</h5>
            <a data-url="/tektn/view/pages/courses/development/cours/python/python.php" class="btn btn-primary" onclick="window.location.href=this.dataset.url">Visit</a>
        </div>
        </div>
        <div class="card" style="width: 19rem">
        <img src="https://plus.unsplash.com/premium_photo-1675367606828-5d2e9bcd5d80?w=1000&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NXx8ZXNwYWdub2x8ZW58MHx8MHx8fDA%3D" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">Espagnol</h5>
            <a data-url="/tektn/view/pages/courses/languages/cours/spanish/spanish.php" class="btn btn-primary" onclick="window.location.href=this.dataset.url">Visit</a>
        </div>
        </div>
        <div class="card" style="width: 19rem">
        <img src="https://images.unsplash.com/photo-1599507593499-a3f7d7d97667?w=1000&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8UEhQfGVufDB8fDB8fHww" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">PHP</h5>
            <a data-url="/tektn/view/pages/courses/development/cours/php/php.php" class="btn btn-primary" onclick="window.location.href=this.dataset.url">Visit</a>
        </div>
        </div>
        <div class="card" style="width: 19rem">
        <img src="https://plus.unsplash.com/premium_photo-1663013659189-58ff1c9e1976?w=1000&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NXx8TWFya2V0aW5nJTIwQW5hbHlzaXN8ZW58MHx8MHx8fDA%3D" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">Marketing Analysis</h5>
            <a data-url="/tektn/view/pages/courses/marketing/cours/analyse/analyse.php" class="btn btn-primary" onclick="window.location.href=this.dataset.url">Visit</a>
        </div>
        </div>
        <div class="card" style="width: 19rem">
        <img src="https://images.unsplash.com/photo-1743179508997-3298efe1a439?w=1000&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8N3x8ZnJlbnNoJTIwZmxhZ3xlbnwwfHwwfHx8MA%3D%3D" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">French</h5>
            <a data-url="/tektn/view/pages/courses/languages/cours/French/French.php" class="btn btn-primary" onclick="window.location.href=this.dataset.url">Visit</a>
        </div>
        </div>
        <div class="card" style="width: 19rem">
        <img src="https://images.unsplash.com/photo-1635070041078-e363dbe005cb?w=1000&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8bWF0aHxlbnwwfHwwfHx8MA%3D%3D" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">Math</h5>
            <a data-url="/tektn/view/pages/courses/science/cours/math/math.php" class="btn btn-primary" onclick="window.location.href=this.dataset.url">Visit</a>
        </div>
        </div>
        <div class="card" style="width: 19rem">
        <img src="https://images.unsplash.com/photo-1628863353691-0071c8c1874c?w=1000&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8M3x8Y2hlbWlzdHJ5fGVufDB8fDB8fHww" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">Chemistry</h5>
            <a data-url="/tektn/view/pages/courses/science/cours/chimie/chimie.php" class="btn btn-primary" onclick="window.location.href=this.dataset.url">Visit</a>
        </div>
        </div>
        <div class="card" style="width: 19rem">
        <img src="https://images.unsplash.com/photo-1557838923-2985c318be48?w=1000&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8RGlnaXRhbCUyME1hcmtldGluZ3xlbnwwfHwwfHx8MA%3D%3D" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">Digital Marketing</h5>
            <a data-url="/tektn/view/pages/courses/marketing/cours/digital/digital.php" class="btn btn-primary" onclick="window.location.href=this.dataset.url">Visit</a>
        </div>
        </div>
        <div class="card" style="width: 19rem">
        <img src="https://images.unsplash.com/photo-1609599006353-e629aaabfeae?w=1000&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8cXVyYW58ZW58MHx8MHx8fDA%3D" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">Quran</h5>
            <a data-url="/tektn/view/pages/courses/islamic/course/quran/quran.php" class="btn btn-primary" onclick="window.location.href=this.dataset.url">Visit</a>
        </div>
        </div>
        <div class="card" style="width: 19rem">
        <img src="https://images.unsplash.com/photo-1611162617213-7d7a39e9b1d7?w=1000&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8ZmlnbWF8ZW58MHx8MHx8fDA%3D" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">Figma</h5>
            <a data-url="/tektn/view/pages/courses/design/cours/figma/figma.php" class="btn btn-primary" onclick="window.location.href=this.dataset.url">Visit</a>
        </div>
        </div>
        </div>
        </div>
        </div>
    </section>
 
    <!--Course cards-->
    <section id="cards">
    <div class="card-container">
        <a data-url="./pages/courses/development/dev.php" class="card lien">
            <img src="./assets/images/dev.avif" alt="Development">
            <div class="link">
                <span>Development</span>
                <div class="arrow-icon"> 
                    <svg viewBox="0 0 330 330">
                        <path d="M250.606,154.389l-150-149.996c-5.857-5.858-15.355-5.858-21.213,0.001 
                            c-5.857,5.858-5.857,15.355,0.001,21.213l139.393,139.39L79.393,304.394c-5.857,5.858-5.857,15.355,0.001,21.213 
                            C82.322,328.536,86.161,330,90,330s7.678-1.464,10.607-4.394l149.999-150.004c2.814-2.813,4.394-6.628,4.394-10.606 
                            C255,161.018,253.42,157.202,250.606,154.389z">
                        </path>
                    </svg>
                </div>
            </div>
        </a>

        <a data-url="./pages/courses/marketing/marketing.php" class="card lien">
            <img src="./assets/images/marketing.jpg" alt="Marketing">
            <div class="link">
                <span>Marketing</span>
                <div class="arrow-icon"> 
                    <svg viewBox="0 0 330 330">
                        <path d="M250.606,154.389l-150-149.996c-5.857-5.858-15.355-5.858-21.213,0.001 
                            c-5.857,5.858-5.857,15.355,0.001,21.213l139.393,139.39L79.393,304.394c-5.857,5.858-5.857,15.355,0.001,21.213 
                            C82.322,328.536,86.161,330,90,330s7.678-1.464,10.607-4.394l149.999-150.004c2.814-2.813,4.394-6.628,4.394-10.606 
                            C255,161.018,253.42,157.202,250.606,154.389z">
                        </path>
                    </svg>
                </div>
            </div>
        </a>

        <a data-url="./pages/courses/science/science.php" class="card lien">
            <img src="./assets/images/science.jpg" alt="Science">
            <div class="link">
                <span>Science</span>
                <div class="arrow-icon"> 
                    <svg viewBox="0 0 330 330">
                        <path d="M250.606,154.389l-150-149.996c-5.857-5.858-15.355-5.858-21.213,0.001 
                            c-5.857,5.858-5.857,15.355,0.001,21.213l139.393,139.39L79.393,304.394c-5.857,5.858-5.857,15.355,0.001,21.213 
                            C82.322,328.536,86.161,330,90,330s7.678-1.464,10.607-4.394l149.999-150.004c2.814-2.813,4.394-6.628,4.394-10.606 
                            C255,161.018,253.42,157.202,250.606,154.389z">
                        </path>
                    </svg>
                </div>
            </div>
        </a>

        <a data-url="./pages/courses/design/design.php" class="card lien">
            <img src="./assets/images/design.avif" alt="design">
            <div class="link">
                <span>Design</span>
                <Div class="arrow-icon"> 
                    <svg viewBox="0 0 330 330">
                        <path d="M250.606,154.389l-150-149.996c-5.857-5.858-15.355-5.858-21.213,0.001 
                            c-5.857,5.858-5.857,15.355,0.001,21.213l139.393,139.39L79.393,304.394c-5.857,5.858-5.857,15.355,0.001,21.213 
                            C82.322,328.536,86.161,330,90,330s7.678-1.464,10.607-4.394l149.999-150.004c2.814-2.813,4.394-6.628,4.394-10.606 
                            C255,161.018,253.42,157.202,250.606,154.389z">
                        </path>
                    </svg>
                </div>
            </div>
        </a>

        <a data-url="./pages/courses/languages/languages.php" class="card lien">
            <img src="./assets/images/laguages.jpg" alt="Languages">
            <div class="link">
                <span>Languages</span>
                <div class="arrow-icon"> 
                    <svg viewBox="0 0 330 330">
                        <path d="M250.606,154.389l-150-149.996c-5.857-5.858-15.355-5.858-21.213,0.001 
                            c-5.857,5.858-5.857,15.355,0.001,21.213l139.393,139.39L79.393,304.394c-5.857,5.858-5.857,15.355,0.001,21.213 
                            C82.322,328.536,86.161,330,90,330s7.678-1.464,10.607-4.394l149.999-150.004c2.814-2.813,4.394-6.628,4.394-10.606 
                            C255,161.018,253.42,157.202,250.606,154.389z">
                        </path>
                    </svg>
                </div>
            </div>
        </a>

        <a data-url="./pages/courses/islamic/islamic.php" class="card lien">
            <img src="./assets/images/islamic.avif" alt="إسلاميات">
            <div class="link">
                <span>إسلاميات</span>
                <div class="arrow-icon"> 
                    <svg viewBox="0 0 330 330">
                        <path d="M250.606,154.389l-150-149.996c-5.857-5.858-15.355-5.858-21.213,0.001 
                            c-5.857,5.858-5.857,15.355,0.001,21.213l139.393,139.39L79.393,304.394c-5.857,5.858-5.857,15.355,0.001,21.213 
                            C82.322,328.536,86.161,330,90,330s7.678-1.464,10.607-4.394l149.999-150.004c2.814-2.813,4.394-6.628,4.394-10.606 
                            C255,161.018,253.42,157.202,250.606,154.389z">
                        </path>
                    </svg>
                </div>
            </div>
        </a>
    </div>
    </section>


    <!--Hero-->
    <br>
    <br>
    <section class="hero">
      <div class="hero-content">
      <h1>Your Revolutionary Learning Platform</h1>
        <p>
        Our philosophy is founded on the deep conviction that, to achieve excellence, our students must not only acquire knowledge but also draw inspiration from the extraordinary journeys that have shaped history.
        </p>

        <a href="/tektn/view/pages/login/login.php?form=signup" class="button">Signup</a>
      </div>
      <div class="hero-image">
        <img src="/tektn/view/assets/images/mockup.png" alt="Illustration plateforme sur laptop">
      </div>
    </section>


    <!-- AI chat-->
    <div id="chatbot-container" class="chatbot-container">
        <div class="chat-toggle" onclick="toggleChat()">
            <svg
                stroke-linejoin="round"
                stroke-linecap="round"
                stroke="currentColor"
                stroke-width="2"
                viewBox="0 0 24 24"
                height="44"
                width="44"
                xmlns="http://www.w3.org/2000/svg"
                class="w-8 hover:scale-125 duration-200 hover:stroke-blue-500"
                fill="none">
                <path fill="none" d="M0 0h24v24H0z" stroke="none"></path>
                <path d="M8 9h8"></path>
                <path d="M8 13h6"></path>
                <path d="M18 4a3 3 0 0 1 3 3v8a3 3 0 0 1 -3 3h-5l-5 3v-3h-2a3 3 0 0 1 -3 -3v-8a3 3 0 0 1 3 -3h12z"></path>
            </svg>
        </div>

        <div id="chat-container" class="chat-container" style="display: none;">
            <div id="messages-container" class="messages-container"></div>
            <div id="loader" class="loader" style="display: none;">
                <span class="load"></span>
            </div>
            <div class="input-container">
                <input type="text" id="chat-input" placeholder="Type your message...">
                <button onclick="sendMessage()" >Send</button>
            </div>
        </div>
    </div>
    

    <!-- Footer -->
    <footer class="footer">
        <div class="footer-container">
            <div class="footer-section">
                <h4>About Us</h4>
                <p>A non profit e-learning company provides free educational resources to learners worldwide.</p>
            </div>

            <div class="footer-section">
                <h4>Contact</h4>
                <ul>
                <li>Email: tektn@tek.tn</li>
                <li>Phone: (+216) 28 418 808</li>
                <li>Address: Sousse, Tunisia</li>
                </ul>
            </div>

            <div class="footer-section">
                <h4>Follow Us</h4>
                <ul class="social-icons flex-container">
                    <li>
                        <a href="https://www.youtube.com/watch?v=HDQV--rBJf4" target="_blank" aria-label="Follow us on Instagram">
                        <i class="fab fa-instagram"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://youtu.be/oPLObjVAvIU?si=q_trl7Y8He6v-WK_" target="_blank" aria-label="Follow us on Facebook">
                        <i class="fab fa-facebook-f"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://youtu.be/dMXJHw2z8s4?si=U1aeuth2in_FgrON" target="_blank" aria-label="Follow us on Twitter">
                        <i class="fab fa-twitter"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="footer-bottom">
            <p>&copy; <?php echo date("Y"); ?> Tek TN. All rights reserved</p>
        </div>
    </footer>

    <script src="main.js"></script>
</body>
</html>