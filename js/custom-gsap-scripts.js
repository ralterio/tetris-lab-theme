// wait until DOM is ready
document.addEventListener("DOMContentLoaded", function(event) {

  console.log("DOM loaded");

  // wait until images, links, fonts, stylesheets, and js is loaded
  // window.addEventListener("load", function(e) {

    // custom GSAP code goes here
     console.log("window loaded");
//      const tl = gsap.timeline();
//
// tl.from("#question__hero", { duration: 0.75, y: 30 }, "text");
// tl.to("#question__hero", { duration: 1, ease:"none" }, "+=2");

gsap.from("#question__hero, #hero__title, #hero__subtitle, .container__cta__start_project",{duration: 1, opacity: 0, y: 30, stagger: 1})

  // }, false);

});
