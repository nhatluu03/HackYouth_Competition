<!-- Back-to-top button -->
<button class="back-to-top hidden phone-hide">
    <i class="fa-solid fa-angles-up back-to-top-icon"></i>
    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 11l5-5m0 0l5 5m-5-5v12" />
    </svg>
</button>

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
            // console.log("Scroll Height: ", scrollContainer().scrollHeight);
            // console.log("Client Height: ", scrollContainer().clientHeight);

            const scrolledPercentage =
                (scrollContainer().scrollTop /
                    (scrollContainer().scrollHeight - scrollContainer().clientHeight)) * 100;


            if (scrollContainer().scrollTop > showOnPx) {
                backToTopButton.classList.remove("hidden");
            } else {
                backToTopButton.classList.add("hidden");
            }
        }
        );

        backToTopButton.addEventListener("click", goToTop);
    </script>