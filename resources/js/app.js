import './bootstrap';
import gsap from "gsap";

window.addEventListener("load", () => {

    gsap.to("#loader",{
        opacity:0,
        duration:1,
        delay:1.5,

        onComplete:()=>{
            document
                .getElementById("loader")
                .remove();
        }
    });

    gsap.from(".hero-title",{
        y:80,
        opacity:0,
        duration:1.2
    });

    gsap.from(".hero-description",{
        y:50,
        opacity:0,
        duration:1.2,
        delay:.3
    });

    gsap.from(".hero-logo",{
        scale:.7,
        opacity:0,
        duration:1.5
    });
});

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

window.addEventListener("load", () => {

    const loader =
        document.getElementById("loader");

    if(loader){

        loader.style.opacity = "0";

        setTimeout(() => {

            loader.remove();

        },500);

    }

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