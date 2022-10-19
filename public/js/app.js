const l1 = document.querySelector('.ligne1');
const l2 = document.querySelector('.ligne2');
const l3 = document.querySelector('.ligne3');
const titreSpans = document.querySelectorAll('h1 span');
const btns = document.querySelectorAll('.btn_home');
const logo = document.querySelector('.leaf');
const medias = document.querySelectorAll('.bulle');

window.addEventListener('load', () => {
    const TL = gsap.timeline({paused: true});

    TL
    .staggerFrom(titreSpans, 1, {top: -50, opacity:0, ease: "power2.out"}, 0.3)
    .staggerFrom(btns, 1, {opacity:0, ease: "power2.out"}, 0.3, '-=1')
    .from(l1, 1, {width:0, ease: "power2.out"}, '-=2')
    .from(l2, 1, {width:0, ease: "power2.out"}, '-=2')
    .from(l3, 1, {width:0, ease: "power2.out"}, '-=2')
    // .from(logo, 0.4, {transform: "scale(0)", ease: "power2.out"}, '-=2')
    .staggerFrom(medias, 0.6, {right:-200, ease: "power2.out"}, 0.2, '-=1')

    TL.play();
})


// Animation Menu burger
const burger = document.querySelector('.menu_burger')


burger.addEventListener('click', function() {
    burger.classList.toggle('active');
})

// Show Menu burger
const show = document.querySelector('.menu')
const cross = document.querySelector('.cross')
burger.addEventListener('click', function(){
    show.classList.toggle('show');
} )