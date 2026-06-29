import './bootstrap';
import gsap from "gsap";

const counters =
document.querySelectorAll(".counter");

counters.forEach(counter=>{

    let target =
    +counter.dataset.target;

    let count = 0;

    let update = ()=>{

        if(count < target){

            count++;

            counter.innerText = count;

            requestAnimationFrame(update);
        }

    }

    update();
});






document.addEventListener('DOMContentLoaded', () => {

    const counters = document.querySelectorAll('.counter');

    counters.forEach(counter => {

        const target = Number(counter.dataset.target);

        let current = 0;

        const step = Math.max(1, Math.ceil(target / 80));

        const update = () => {

            current += step;

            if (current >= target) {

                counter.innerText = target.toLocaleString();

            } else {

                counter.innerText = current.toLocaleString();

                requestAnimationFrame(update);

            }

        };

        update();

    });

});

window.addEventListener("load", () => {

    const loading = document.getElementById("loading-screen");

    if (!loading) return;

    loading.classList.add("opacity-0");

    setTimeout(() => {

        loading.remove();

    }, 700);

});

// Mobile Menu

const menuBtn = document.getElementById("mobile-menu-button");

const mobileMenu = document.getElementById("mobile-menu");

if(menuBtn){

    menuBtn.addEventListener("click",()=>{

        mobileMenu.classList.toggle("hidden");

    });

}

// Navbar Scroll

const navbar = document.getElementById("navbar");

window.addEventListener("scroll",()=>{

    if(window.scrollY>50){

        navbar.classList.add(
            "bg-[#0b0f19]/90",
            "backdrop-blur-xl",
            "shadow-xl"
        );

    }else{

        navbar.classList.remove(
            "bg-[#0b0f19]/90",
            "backdrop-blur-xl",
            "shadow-xl"
        );

    }

});

/* ==========================
   Scroll Reveal
========================== */

const reveals = document.querySelectorAll(".reveal");

function revealAnimation(){

    reveals.forEach((item)=>{

        const top = item.getBoundingClientRect().top;

        const visible = window.innerHeight - 120;

        if(top < visible){

            item.classList.add("active");

        }

    });

}

window.addEventListener("scroll",revealAnimation);

window.addEventListener("load",revealAnimation);

/* ==========================
   Scroll Progress
========================== */

const progressBar = document.getElementById("scroll-progress");

window.addEventListener("scroll",()=>{

    const scrollTop = window.scrollY;

    const height =
        document.documentElement.scrollHeight
        - window.innerHeight;

    const progress =
        (scrollTop/height)*100;

    progressBar.style.width = progress+"%";

});

/* ==========================
   Smooth Anchor
========================== */

document.querySelectorAll('a[href^="#"]').forEach(anchor=>{

    anchor.addEventListener("click",function(e){

        e.preventDefault();

        const target=document.querySelector(this.getAttribute("href"));

        if(target){

            target.scrollIntoView({

                behavior:"smooth"

            });

        }

    });

});

/* ==========================
   Mouse Glow
========================== */

const glow = document.getElementById("mouse-glow");

document.addEventListener("mousemove",(e)=>{

    glow.style.left=e.clientX+"px";

    glow.style.top=e.clientY+"px";

});

/* ==========================
   Card Hover
========================== */

document.querySelectorAll(".glass-card").forEach(card=>{

    card.addEventListener("mousemove",(e)=>{

        const rect=card.getBoundingClientRect();

        const x=e.clientX-rect.left;

        const y=e.clientY-rect.top;

        const rotateY=((x/rect.width)-0.5)*12;

        const rotateX=((y/rect.height)-0.5)*-12;

        card.style.transform=
            `perspective(1000px)
            rotateX(${rotateX}deg)
            rotateY(${rotateY}deg)
            translateY(-6px)`;

    });

    card.addEventListener("mouseleave",()=>{

        card.style.transform="";

    });

});