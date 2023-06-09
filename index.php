<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Illusionist</title>
    <link rel="icon" href="./assets/img/logo.png">

    <!-- CDN -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- css for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- css for font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- CSS -->
    <link rel="stylesheet" href="./assets/css/base.css">
    <link rel="stylesheet" href="./assets/css/headernfooter.css">
    <link rel="stylesheet" href="./assets/css/main.css">
    <link rel="stylesheet" href="./assets/css/form.css">

    <style>
        .hor-nav-item:nth-of-type(1) {
            font-weight: bold;
        }
    </style>
</head>

<body>
    <!-- Header section -->
    <?php
    include('./ex_header.php')
    ?>

    <!-- Main content -->
    <main class="main">
        <!-- Landing section -->
        <section class="landing">
            <div class="landing--left">
                <div class="landing-header">
                    <h2 class="landing-header__heading">
                        Blood Mana is setting the new standard for blood transaction and communication in the healthcare industry.
                    </h2>
                </div>
                <div class="landing-content">
                    <p class="landing-content__desc">Blood Mana is pursuing a B2B business model, with target customers being hospitals.
                        The project strives to aid hospitals in managing, sending, and receiving blood transfusion data with each other with better reliability and precision.
                    </p>
                    <button class="landing-button">
                        <img src="./assets/img/apple_ic.png" alt="" class="landing-button__ic">
                        <span>Appstore</span>
                    </button>
                    <button class="landing-button">
                        <img src="./assets/img/gg_play_ic.png" alt="" class="landing-button__ic">
                        <span>Google Play</span>
                    </button>
                </div>
            </div>

            <div class="landing--right">
                <div class="landing--right-socials">
                    <a href=""><i class="fa-brands fa-facebook-f"></i></a>
                    <a href=""><i class="fa-brands fa-instagram"></i></a>
                    <a href=""><i class="fa-brands fa-twitter"></i></a>
                    <a href=""><i class="fa-brands fa-github"></i></a>
                </div>
            </div>
        </section>

        <!-- Service section -->
        <section class="service">
            <div class="section-header">
                <h4 class="section-header__heading">Services</h4>
                <p class="section-header__sub-heading">What we provide</p>
            </div>
            <div class="section-content service-content">
                <ul class="service-container">
                    <li class="service-item">
                        <i class="fa-sharp fa-solid fa-graduation-cap service-item__ic"></i>
                        <h5 class="service-item__title">Feature 01</h5>
                        <p class="service-item__desc">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's</p>
                    </li>
                    <li class="service-item">
                        <i class="fa-solid fa-earth-americas service-item__ic"></i>
                        <h5 class="service-item__title">Feature 02</h5>
                        <p class="service-item__desc">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
                    </li>
                    <li class="service-item">
                        <i class="fa-solid fa-map service-item__ic"></i>
                        <h5 class="service-item__title">Feature 03</h5>
                        <p class="service-item__desc">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's</p>
                    </li>
                </ul>
            </div>
        </section>

        <!-- Prototype -->
        <section class="prototype">
            <div class="prototype-content">
                <div class="prototype-content--left">
                    <img src="./assets/img/mock_phone.png" alt="" class="prototype-content__img">
                </div>
                <div class="prototype-content--right">
                    <h3>How does it work?</h3>
                    <ul class="prototype-content-container">
                        <li class="prototype-content-item">
                            <h5>01</h5>
                            <div class="prototype-content-item__details">
                                <strong>Install the app</strong>
                                <p>Lorsem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                            </div>
                        </li>
                        <li class="prototype-content-item">
                            <h5>02</h5>
                            <div class="prototype-content-item__details">
                                <strong>Sign up an account</strong>
                                <p>Lorsem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                            </div>
                        </li>
                        <li class="prototype-content-item">
                            <h5>03</h5>
                            <div class="prototype-content-item__details">
                                <strong>Study with us</strong>
                                <p>Lorsem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </section>

        <!-- Offer -->
        <section class="offer">
            <div class="section-header">
                <h4 class="section-header__heading">Our plans</h4>
                <p class="section-header__sub-heading">What we offer</p>
            </div>
            <div class="offer-content">
                <ul class="offer-container">
                    <li class="offer-item">
                        <h5 class="offer-item__title">BASIC</h5>
                        <p class="offer-item__demand">Suitable for individuals, freshmen.</p>
                        <strong class="offer-item__fee">
                            <i class="fa-solid fa-dollar-sign"></i>
                            40
                        </strong>
                        <span>/ per year</span>
                        <ul class="offer-item__benefit-container">
                            <li class="offer-item__benefit-item">
                                <i class="fa-solid fa-circle-check"></i>
                                <p>Lorem Ipsum is simply dummy text </p>
                            </li>
                            <li class="offer-item__benefit-item">
                                <i class="fa-solid fa-circle-check"></i>
                                <p>Lorem Ipsum is simply dummy text </p>
                            </li>
                            <li class="offer-item__benefit-item">
                                <i class="fa-solid fa-circle-check"></i>
                                <p>Lorem Ipsum is simply dummy text </p>
                            </li>
                        </ul>
                    </li>
                    
                    <li class="offer-item popular">
                        <h5 class="offer-item__title">PRO</h5>
                        <p class="offer-item__demand">Suitable for individuals, freshmen.</p>
                        <strong class="offer-item__fee">
                            <i class="fa-solid fa-dollar-sign"></i>
                            40
                        </strong>
                        <span>/ per year</span>
                        <ul class="offer-item__benefit-container">
                            <li class="offer-item__benefit-item">
                                <i class="fa-solid fa-circle-check"></i>
                                <p>Lorem Ipsum is simply dummy text </p>
                            </li>
                            <li class="offer-item__benefit-item">
                                <i class="fa-solid fa-circle-check"></i>
                                <p>Lorem Ipsum is simply dummy text </p>
                            </li>
                            <li class="offer-item__benefit-item">
                                <i class="fa-solid fa-circle-check"></i>
                                <p>Lorem Ipsum is simply dummy text </p>
                            </li>
                            <li class="offer-item__benefit-item">
                                <i class="fa-solid fa-circle-check"></i>
                                <p>Lorem Ipsum is simply dummy text </p>
                            </li>
                        </ul>
                    </li>

                    <li class="offer-item">
                        <h5 class="offer-item__title">PRENIUM</h5>
                        <p class="offer-item__demand">Suitable for individuals, freshmen.</p>
                        <strong class="offer-item__fee">
                            <i class="fa-solid fa-dollar-sign"></i>
                            40
                        </strong>
                        <span>/ per year</span>
                        <ul class="offer-item__benefit-container">
                            <li class="offer-item__benefit-item">
                                <i class="fa-solid fa-circle-check"></i>
                                <p>Lorem Ipsum is simply dummy text </p>
                            </li>
                            <li class="offer-item__benefit-item">
                                <i class="fa-solid fa-circle-check"></i>
                                <p>Lorem Ipsum is simply dummy text </p>
                            </li>
                            <li class="offer-item__benefit-item">
                                <i class="fa-solid fa-circle-check"></i>
                                <p>Lorem Ipsum is simply dummy text </p>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </section>

        <!-- Installation -->
        <section class="installation">
            <div class="section-header">
                <h4 class="section-header__heading">Install the app now</h4>
            </div>
            <div class="installation-content">
                <p class="installation-content__desc">
                    The app is now available on Appstore, and Google Play. Your experience and feedback contribute to the Illusionist community a lot. Thanks!
                </p>
                <ul class="installation-option-container">
                    <li class="installation-option-item">
                        <img src="./assets/img/apple_ic.png" alt="">
                        <p>Appstore</p>
                    </li>
                    <li class="installation-option-item">
                        <img src="./assets/img/gg_play_ic.png" alt="">
                        <p>Google Play</p>
                    </li>
                </ul>
            </div>
        </section>

        <!-- Back-to-top button -->
        <button class="back-to-top hidden mobile-hide">
            <i class="fa-solid fa-angles-up back-to-top-icon"></i>
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 11l5-5m0 0l5 5m-5-5v12" />
            </svg>
        </button>
    </main>

    <?php include('./footer.php') ?>
    <script>
        // Counter up
        var communityContainer = document.querySelector(".community-container");
        var communityList = document.querySelectorAll(".community-item");

        function formatNumber(x) {
            return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        }

        function counterUp(el) {
            var numberEl = el.querySelector(".community-item__number");
            numberEl.classList.add("finish");
            var end = parseInt(numberEl.innerText);
            var count = 0;
            var time = 150;
            var step = end / time;

            let counting = setInterval(() => {
                count += step;
                if (count > end) {
                    clearInterval(counting);
                    numberEl.innerText = formatNumber(end + " +");
                } else {
                    numberEl.innerText = Math.round(count) + " +";
                }
            }, 5);
        }

        window.onscroll = function() {
            var rectStatistic = communityContainer.getBoundingClientRect();
            var heightScreen = window.innerHeight;
            if (!document.querySelector(".community-item__number").classList.contains('finish')) {
                if (!(rectStatistic.bottom < 0 || rectStatistic.top > heightScreen)) {
                    communityList.forEach((item) => {
                        counterUp(item);
                    });
                }
            }
        };
    </script>

    <!-- Back-to-top JS -->
    <script>
        const showOnPx = 100;
        const backToTopButton = document.querySelector(".back-to-top");
        const scrollContainer = () => {
            return document.documentElement || document.body;
        };

        const goToTop = () => {
            document.body.scrollIntoView({
                behavior: "smooth"
            });
        };

        document.addEventListener("scroll", () => {
            console.log("Scroll Height: ", scrollContainer().scrollHeight);
            console.log("Client Height: ", scrollContainer().clientHeight);

            const scrolledPercentage =
                (scrollContainer().scrollTop /
                    (scrollContainer().scrollHeight - scrollContainer().clientHeight)) * 100;


            if (scrollContainer().scrollTop > showOnPx) {
                backToTopButton.classList.remove("hidden");
            } else {
                backToTopButton.classList.add("hidden");
            }
        });

        backToTopButton.addEventListener("click", goToTop);
    </script>
</body>

</html>