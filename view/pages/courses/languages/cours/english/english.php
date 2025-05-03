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
            <h6><i class="fa-solid fa-house-chimney"></i> Course / languages / English</h6>
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
                            src="/tektn/view/assets/pdf/eng.pdf"
                            width="100%" height="700"
                            style="border: none;"
                            frameborder="0"
                            >
                            </iframe>
                    </div>
                    <div class="tab-pane fade" id="video" role="tabpanel" aria-labelledby="video-tab">
                    <iframe 
                            src="https://www.youtube.com/embed/tLULIzOj-Ew"
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
                        <h1>Discover Your Ability in English </h1>
                        <div class="instructions">
                            Instructions: Answer each question, adding up your points as you go. At the end, your total score will help indicate how strong your fundamentals are in English.
                        </div>

                        <div id="quiz">
                            <div class="question">
                                <h2>1. In the sentence “Had I known, I would have acted differently,” what mood is expressed by “had known”?</h2>
                                <button onclick="selectAnswer(this, 1, 0)">a) Subjunctive pluperfect</button>
                                <button onclick="selectAnswer(this, 0, 0)">b) Past perfect indicative</button>
                                <button onclick="selectAnswer(this, 0, 0)">c) Future perfect conditional</button>
                                <button onclick="selectAnswer(this, 0, 0)">d) Present perfect subjunctive</button>
                            </div>

                            <div class="question">
                                <h2>2. What does the idiom “to cut the Gordian knot” mean?</h2>
                                <button onclick="selectAnswer(this, 0, 1)">a) To procrastinate indefinitely</button>
                                <button onclick="selectAnswer(this, 1, 1)">b) To solve a complex problem with a bold action</button>
                                <button onclick="selectAnswer(this, 0, 1)">c) To entangle oneself further</button>
                                <button onclick="selectAnswer(this, 0, 1)">d) To circumvent a legal obstacle</button>
                            </div>

                            <div class="question">
                                <h2>3. Identify the figure of speech in “The pen is mightier than the sword.”</h2>
                                <button onclick="selectAnswer(this, 0, 2)">a) Synecdoche</button>
                                <button onclick="selectAnswer(this, 1, 2)">b) Metonymy</button>
                                <button onclick="selectAnswer(this, 0, 2)">c) Oxymoron</button>
                                <button onclick="selectAnswer(this, 0, 2)">d) Hyperbole</button>
                            </div>

                            <div class="question">
                                <h2>4. Which of these words is a contronym (auto-antonym)?</h2>
                                <button onclick="selectAnswer(this, 1, 3)">a) Sanction</button>
                                <button onclick="selectAnswer(this, 0, 3)">b) Luminous</button>
                                <button onclick="selectAnswer(this, 0, 3)">c) Meticulous</button>
                                <button onclick="selectAnswer(this, 0, 3)">d) Benevolent</button>
                            </div>

                            <div class="question">
                                <h2>5. Which sentence is punctuated correctly?</h2>
                                <button onclick="selectAnswer(this, 0, 4)">a) She said “however we proceed, proceed carefully.”</button>
                                <button onclick="selectAnswer(this, 1, 4)">b) She said, “However we proceed, proceed carefully.”</button>
                                <button onclick="selectAnswer(this, 0, 4)">c) She said, however, “we proceed proceed carefully.”</button>
                                <button onclick="selectAnswer(this, 0, 4)">d) She said however “we proceed, proceed carefully.”</button>
                            </div>

                            <div class="question">
                                <h2>6. Choose the word that best completes: “The committee’s ruling was ___ by new evidence.”</h2>
                                <button onclick="selectAnswer(this, 1, 5)">a) nullified</button>
                                <button onclick="selectAnswer(this, 0, 5)">b) consolidated</button>
                                <button onclick="selectAnswer(this, 0, 5)">c) obfuscated</button>
                                <button onclick="selectAnswer(this, 0, 5)">d) corroborated</button>
                            </div>

                            <div class="question">
                                <h2>7. Which sentence correctly uses the subjunctive mood?</h2>
                                <button onclick="selectAnswer(this, 1, 6)">a) I suggest that he study harder for the exam.</button>
                                <button onclick="selectAnswer(this, 0, 6)">b) I suggest that he studies harder for the exam.</button>
                                <button onclick="selectAnswer(this, 0, 6)">c) I suggest him to study harder for the exam.</button>
                                <button onclick="selectAnswer(this, 0, 6)">d) I suggest he will study harder for the exam.</button>
                            </div>

                            <div class="question">
                                <h2>8. Which word changes meaning depending on its stress pattern?</h2>
                                <button onclick="selectAnswer(this, 1, 7)">a) Present (PRE-sent vs pre-SENT)</button>
                                <button onclick="selectAnswer(this, 0, 7)">b) Unique (u-NIQUE vs UN-ique)</button>
                                <button onclick="selectAnswer(this, 0, 7)">c) Grammar (GRAM-mar vs gram-MAR)</button>
                                <button onclick="selectAnswer(this, 0, 7)">d) Sentence (SEN-tence vs sen-TENCE)</button>
                            </div>

                            <div class="question">
                                <h2>9. Which sentence demonstrates correct subject–verb agreement?</h2>
                                <button onclick="selectAnswer(this, 1, 8)">a) The bouquet of flowers smells sweet.</button>
                                <button onclick="selectAnswer(this, 0, 8)">b) The bouquet of flowers smell sweet.</button>
                                <button onclick="selectAnswer(this, 0, 8)">c) The bouquet of flowers are smelling sweet.</button>
                                <button onclick="selectAnswer(this, 0, 8)">d) The bouquet of flowers have smelled sweet.</button>
                            </div>

                            <div class="question">
                                <h2>10. What is the archaic second-person singular pronoun?</h2>
                                <button onclick="selectAnswer(this, 1, 9)">a) Thou</button>
                                <button onclick="selectAnswer(this, 0, 9)">b) Ye</button>
                                <button onclick="selectAnswer(this, 0, 9)">c) You</button>
                                <button onclick="selectAnswer(this, 0, 9)">d) Thee</button>
                            </div>
                        </div>
                    </div>


                    </div>
                </div>
            </div>
        </div>
    </section>

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
