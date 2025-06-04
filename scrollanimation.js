
function revealFunction(){
    window.sr = ScrollReveal({ duration:1350, distance: "250px", easing: "ease-out"});

    sr.reveal('.headerDropAmination',{origin: "top", reset: false})
    sr.reveal('.WelcomeAnimation',{origin: "top", reset: true, interval: 200})
    sr.reveal('.leftSectionAnimation',{origin: "left", reset: true, interval: 200})
    sr.reveal('.rightSectionAnimation',{origin: "bottom", reset: true,})
    sr.reveal('.bannerAnimation',{origin: "left", reset: true, interval:200})
    // sr.reveal('.propertiesAnimationHeader',{origin: "top", reset: true})
    sr.reveal('.propertiesItemAnimation',{origin: "left", reset: true, interval: 50})
    sr.reveal('.serviceSectionAnimation',{origin: "left", reset: true, interval: 50})
    sr.reveal('.newsletterAnimation',{origin: "top", reset: true})
    sr.reveal('.footerSectionAnimantion',{origin: "left", reset: true, interval: 150})
    sr.reveal('.copyrightAnimation',{origin: "bottom", reset: false})
}

window.addEventListener('load', ()=>{
    revealFunction();
})