import "./bootstrap";

/* ==========================================
   DOM READY
========================================== */

document.addEventListener("DOMContentLoaded", () => {

    initLoader();
    initCounters();
    initMobileMenu();
    initNavbar();
    initReveal();
    initProgressBar();
    initSmoothScroll();
    initMouseGlow();
    initGlassCard();

});

/* ==========================================
   Loader
========================================== */

function initLoader() {

    const loader = document.getElementById("loading-screen");

    if (!loader) return;

    window.addEventListener("load", () => {

        loader.classList.add("opacity-0");

        setTimeout(() => {

            loader.remove();

        }, 700);

    });

}

/* ==========================================
   Counter
========================================== */

function initCounters() {

    const counters = document.querySelectorAll(".counter");

    if (!counters.length) return;

    counters.forEach(counter => {

        const target = Number(counter.dataset.target);

        let current = 0;

        const step = Math.max(1, Math.ceil(target / 80));

        function update() {

            current += step;

            if (current >= target) {

                counter.innerText = target.toLocaleString();

                return;

            }

            counter.innerText = current.toLocaleString();

            requestAnimationFrame(update);

        }

        update();

    });

}

/* ==========================================
   Mobile Menu
========================================== */

function initMobileMenu() {

    const button = document.getElementById("mobile-menu-button");

    const menu = document.getElementById("mobile-menu");

    if (!button || !menu) return;

    button.addEventListener("click", () => {

        menu.classList.toggle("hidden");

    });

}

/* ==========================================
   Navbar
========================================== */

function initNavbar() {

    const navbar = document.getElementById("navbar");

    if (!navbar) return;

    window.addEventListener("scroll", () => {

        if (window.scrollY > 50) {

            navbar.classList.add(
                "bg-[#0b0f19]/90",
                "backdrop-blur-xl",
                "shadow-xl"
            );

        } else {

            navbar.classList.remove(
                "bg-[#0b0f19]/90",
                "backdrop-blur-xl",
                "shadow-xl"
            );

        }

    });

}

/* ==========================================
   Scroll Reveal
========================================== */

function initReveal() {

    const reveals = document.querySelectorAll(".reveal");

    if (!reveals.length) return;

    function reveal() {

        reveals.forEach(item => {

            const top = item.getBoundingClientRect().top;

            if (top < window.innerHeight - 120) {

                item.classList.add("active");

            }

        });

    }

    reveal();

    window.addEventListener("scroll", reveal);

}

/* ==========================================
   Scroll Progress
========================================== */

function initProgressBar() {

    const progressBar = document.getElementById("scroll-progress");

    if (!progressBar) return;

    window.addEventListener("scroll", () => {

        const scrollTop = window.scrollY;

        const height =
            document.documentElement.scrollHeight -
            window.innerHeight;

        const progress = (scrollTop / height) * 100;

        progressBar.style.width = progress + "%";

    });

}

/* ==========================================
   Smooth Scroll
========================================== */

function initSmoothScroll() {

    document.querySelectorAll('a[href^="#"]').forEach(anchor => {

        anchor.addEventListener("click", function (e) {

            const target = document.querySelector(
                this.getAttribute("href")
            );

            if (!target) return;

            e.preventDefault();

            target.scrollIntoView({

                behavior: "smooth"

            });

        });

    });

}

/* ==========================================
   Mouse Glow
========================================== */

function initMouseGlow() {

    if (window.innerWidth < 768) return;

    const glow = document.getElementById("mouse-glow");

    if (!glow) return;

    document.addEventListener("mousemove", e => {

        glow.style.left = e.clientX + "px";

        glow.style.top = e.clientY + "px";

    });

}

/* ==========================================
   Glass Card Hover
========================================== */

function initGlassCard() {

    if (window.innerWidth < 768) return;

    document.querySelectorAll(".glass-card").forEach(card => {

        card.addEventListener("mousemove", e => {

            const rect = card.getBoundingClientRect();

            const x = e.clientX - rect.left;

            const y = e.clientY - rect.top;

            const rotateY = ((x / rect.width) - 0.5) * 12;

            const rotateX = ((y / rect.height) - 0.5) * -12;

            card.style.transform = `
                perspective(1000px)
                rotateX(${rotateX}deg)
                rotateY(${rotateY}deg)
                translateY(-6px)
            `;

        });

        card.addEventListener("mouseleave", () => {

            card.style.transform = "";

        });

    });

}