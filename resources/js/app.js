import './bootstrap';

function showCaption(element) {
    element.firstElementChild.style.display = "block";
}

function hideCaption(element) {
    element.firstElementChild.style.display = "none";
}

// Use const for variables that won't be reassigned
const skillsets = document.getElementsByClassName("skillset");

Array.from(skillsets).forEach(skillset => {
    const skills = skillset.getElementsByTagName("div");
    Array.from(skills).forEach(skill => {
        const html = "<i style='color:#f8333c' class='fa fa-code'></i>&nbsp;";
        skill.insertAdjacentHTML("afterbegin", html);
    });
});

// Use const for navToggle and navLinks since they won't be reassigned
const navToggle = document.querySelector('.nav-toggle');
const navLinks = document.querySelectorAll('.nav__link');

navToggle.addEventListener('click', () => {
    document.body.classList.toggle('nav-open');
});

// Use forEach to add click event listeners to navLinks
navLinks.forEach(link => {
    link.addEventListener('click', () => {
        document.body.classList.remove('nav-open');
    });
});


// Get the button
const scrollUpBtn = document.getElementById("scrollUpBtn");

// Show the button when the user scrolls down half of the window height
window.onscroll = function() {
    if (document.body.scrollTop > window.innerHeight / 2 || document.documentElement.scrollTop > window.innerHeight / 2) {
        scrollUpBtn.style.display = "block"; // Show the button
    } else {
        scrollUpBtn.style.display = "none"; // Hide the button
    }
};

// Scroll to the top smoothly when the button is clicked
scrollUpBtn.onclick = function() {
    window.scrollTo({
        top: 0,
        behavior: "smooth" // Smooth scrolling
    });
};