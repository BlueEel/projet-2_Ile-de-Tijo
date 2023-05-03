// btn top
const btnScrollToTop = document.querySelector(".btnScrollToTop");
btnScrollToTop.addEventListener("click", function () {
    window.scrollTo({ top: 0, left: 0, behavior: "smooth" });
});
window.addEventListener("scroll", () => {
    if (window.pageYOffset > 100) {
        btnScrollToTop.classList.add("active");
    } else {
        btnScrollToTop.classList.remove("active");
    }
});

// btn menu burger
const burgerMenu = document.querySelector(".burgerMenu");
burgerMenu.addEventListener("click", function () {

});

function myFunction() {
    let element = document.getElementById("burgerMenu");
    element.classList.toggle("mystyle");
};
