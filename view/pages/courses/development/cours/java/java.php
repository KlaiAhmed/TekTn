<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="icon" type="image/png" href="/tektn/view/assets/icons/icon.png" id="icon" />
    <title>Tek TN</title>

    <!-- Local Scripts -->
    <script src="/tektn/view/global/scripts/islogged.js.php" defer></script>
    <script src="/tektn/view/global/scripts/navbar.js" defer></script>
    <script src="/tektn/view/global/scripts/chatbot.js" defer></script>
    <script src="/tektn/view/global/scripts/redirect.js" defer></script>
    <script src="/tektn/view/global/scripts/quiz.js" defer></script>
    <script src="/tektn/view/global/scripts/cours.js" defer></script>
    <script src="/tektn/view/global/scripts/search.js" defer></script>


    <!-- External scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" defer></script>

    <!-- External Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" >
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" integrity="sha384-<INSERT_BOOTSTRAP_CSS_SRI_HASH>" crossorigin="anonymous">

    <!-- Local Styles -->
    <link rel="stylesheet" href="/tektn/view/global/styles/chatbot.css">
    <link rel="stylesheet" href="/tektn/view/global/styles/navstyle.css">
    <link rel="stylesheet" href="/tektn/view/global/styles/cours.css">
    <link rel="stylesheet" href="/tektn/view/global/styles/quiz.css">

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
                <input type="search" placeholder="What are you looking for?" class="search__input" name="search__form">
            </form>
            <i class="ri-close-line search__close" id="search-close"></i>
        </div>
    </section>

    <!--course-->
    <section id="content">
        <div class="title">
            <h6><i class="fa-solid fa-house-chimney"></i> Course / Development / Java</h6>
        </div>
        <div class="crd">
            <div class="card text-center">
                <div class="card-header">
                        <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" id="document-tab" data-bs-toggle="tab" href="#document" role="tab" aria-controls="document" aria-selected="true">Document</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="video-tab" data-bs-toggle="tab" href="#video" role="tab" aria-controls="video" aria-selected="false">Video</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="quiz-tab" data-bs-toggle="tab" href="#quiz" role="tab" aria-controls="quiz" aria-selected="false">Quiz</a>
                            </li>
                        </ul>
                    </div>
                <div class="card-body tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="document" role="tabpanel" aria-labelledby="document-tab">
                    <iframe
                            src="/tektn/view/assets/pdf/java.pdf"
                            width="100%" height="700"
                            style="border: none;"
                            frameborder="0"
                            >
                            </iframe>
                    </div>
                    <div class="tab-pane fade" id="video" role="tabpanel" aria-labelledby="video-tab">
                    <iframe 
                            src="https://www.youtube.com/embed/xk4_1vDrzzo"
                            frameborder="0"
                            allow="autoplay; encrypted-media"
                            allowfullscreen
                            style="width: 100%; height: 600px;"
                        ></iframe>
                    </div>
                    <div class="tab-pane fade" id="quiz" role="tabpanel" aria-labelledby="quiz-tab">
                    <div class="progress-container">
                        <div id="progress-bar" class="progress-bar"></div>
                    </div>
                    
                    <div class="container">
                        <h1>Discover Your Ability in Java</h1>
                        <div class="instructions">
                            Instructions: Answer each question, adding up your points as you go. At the end, your total score will help indicate how strong your Java fundamentals are.
                        </div>
                    
                        <div id="quiz">
                            <div class="question">
                                <h2>1. What is the correct file extension for a Java source file?</h2>
                                <button onclick="selectAnswer(this,0 , 0)">a) .jav</button>
                                <button onclick="selectAnswer(this, 0, 0)">b) .js</button>
                                <button onclick="selectAnswer(this, 1, 0)">c) .java</button>
                                <button onclick="selectAnswer(this, 0, 0)">d) .class</button>
                            </div>
                            <div class="question">
                                <h2>2. Which method is the entry point of any Java program?</h2>
                                <button onclick="selectAnswer(this, 0, 1)">a) start()</button>
                                <button onclick="selectAnswer(this, 0, 1)">b) init()</button>
                                <button onclick="selectAnswer(this, 0, 1)">c) run()</button>
                                <button onclick="selectAnswer(this, 1, 1)">d) main()</button>
                            </div>
                            <div class="question">
                                <h2>3. What is bytecode in Java?</h2>
                                <button onclick="selectAnswer(this, 0, 2)">a) Code written by the programmer</button>
                                <button onclick="selectAnswer(this, 1, 2)">b) Code compiled by the Java compiler</button>
                                <button onclick="selectAnswer(this, 0, 2)">c) Code for hardware communication</button>
                                <button onclick="selectAnswer(this, 0, 2)">d) Commented code</button>
                            </div>
                            <div class="question">
                                <h2>4. Which of the following is not a Java primitive data type?</h2>
                                <button onclick="selectAnswer(this, 0, 3)">a) int</button>
                                <button onclick="selectAnswer(this, 0, 3)">b) boolean</button>
                                <button onclick="selectAnswer(this, 0, 3)">c) double</button>
                                <button onclick="selectAnswer(this, 1, 3)">d) string</button>
                            </div>
                            <div class="question">
                                <h2>5. What is the size of an `int` in Java?</h2>
                                <button onclick="selectAnswer(this, 0, 4)">a) 2 bytes</button>
                                <button onclick="selectAnswer(this, 1, 4)">b) 4 bytes</button>
                                <button onclick="selectAnswer(this, 0, 4)">c) 8 bytes</button>
                                <button onclick="selectAnswer(this, 0, 4)">d) Depends on the system</button>
                            </div>
                            <div class="question">
                                <h2>6. Which keyword is used to inherit a class in Java?</h2>
                                <button onclick="selectAnswer(this, 0, 5)">a) implements</button>
                                <button onclick="selectAnswer(this, 1, 5)">b) extends</button>
                                <button onclick="selectAnswer(this, 0, 5)">c) inherits</button>
                                <button onclick="selectAnswer(this, 0, 5)">d) import</button>
                            </div>
                            <div class="question">
                                <h2>7. What does JVM stand for?</h2>
                                <button onclick="selectAnswer(this, 1, 6)">a) Java Virtual Machine</button>
                                <button onclick="selectAnswer(this, 0, 6)">b) Java Variable Manager</button>
                                <button onclick="selectAnswer(this, 0, 6)">c) Java Verified Memory</button>
                                <button onclick="selectAnswer(this, 0, 6)">d) Java Vendor Module</button>
                            </div>
                            <div class="question">
                                <h2>8. Which exception is thrown when a required file is not found?</h2>
                                <button onclick="selectAnswer(this, 1, 7)">a) FileNotFoundException</button>
                                <button onclick="selectAnswer(this, 0, 7)">b) IOException</button>
                                <button onclick="selectAnswer(this, 0, 7)">c) NullPointerException</button>
                                <button onclick="selectAnswer(this, 0, 7)">d) InputMismatchException</button>
                            </div>
                            <div class="question">
                                <h2>9. Which collection class does not allow duplicate elements?</h2>
                                <button onclick="selectAnswer(this, 1, 8)">a) HashSet</button>
                                <button onclick="selectAnswer(this, 0, 8)">b) ArrayList</button>
                                <button onclick="selectAnswer(this, 0, 8)">c) LinkedList</button>
                                <button onclick="selectAnswer(this, 0, 8)">d) Vector</button>
                            </div>
                            <div class="question">
                                <h2>10. Which keyword is used to prevent inheritance in Java?</h2>
                                <button onclick="selectAnswer(this, 0, 9)">a) static</button>
                                <button onclick="selectAnswer(this, 1, 9)">b) final</button>
                                <button onclick="selectAnswer(this, 0, 9)">c) private</button>
                                <button onclick="selectAnswer(this, 0, 9)">d) abstract</button>
                            </div>
                        </div>
                    
                        <button onclick="calculateResult()">See My Results</button>
                    
                        <div id="result" class="result"></div>
                    </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--chatbot-->
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

</body>
</html>
