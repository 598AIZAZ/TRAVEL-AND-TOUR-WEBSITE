let searchBtn = document.querySelector('#search-btn');
let searchBar = document.querySelector('.search-bar-container');
let formBtn = document.querySelector('#login-btn');
let loginForm = document.querySelector('.login-form-container');
let formClose = document.querySelector('#form-close');
let menu = document.querySelector('#menu-bar');
let navbar = document.querySelector('.navbar');
let videoBtn = document.querySelectorAll('.vid-btn');

window.onscroll = () =>{
    searchBtn.classList.remove('fa-times');
    searchBar.classList.remove('active');
    menu.classList.remove('fa-times');
    navbar.classList.remove('active');
    loginForm.classList.remove('active');
}


// Get the elements
// const signupBtn = document.getElementById("signup-btn");
// const signupFormContainer = document.getElementById("signup-form-container");

// // Add click event listener to the sign-up button
// signupBtn.addEventListener("click", function (event) {
//   event.preventDefault(); // Prevent the default button behavior
//   signupFormContainer.style.display = "block"; // Show the sign-up form container
// });

// Get the elements
const signupBtn = document.getElementById("signup-btn");
const signupFormContainer = document.getElementById("signup-form-container");
const formCloseBtn = document.getElementById("form-close");

// Add click event listener to the sign-up button
signupBtn.addEventListener("click", function (event) {
  event.preventDefault(); // Prevent the default button behavior

  // Toggle the display of the sign-up form container
  if (signupFormContainer.style.display === "block") {
    signupFormContainer.style.display = "none"; // Hide the sign-up form
  } else {
    signupFormContainer.style.display = "block"; // Show the sign-up form
  }
});

// Add click event listener to the form close button
formCloseBtn.addEventListener("click", function (event) {
  signupFormContainer.style.display = "none"; // Hide the sign-up form
});



searchBtn.addEventListener('click', () =>{
    searchBtn.classList.toggle('fa-times');
    searchBar.classList.toggle('active');
});

formBtn.addEventListener('click', () =>{
    loginForm.classList.toggle('active');
});

formClose.addEventListener('click', () =>{
   loginForm.classList.remove('active');
});

menu.addEventListener('click', () =>{
    menu.classList.toggle('fa-times');
    navbar.classList.toggle('active');
});

videoBtn.forEach(btn =>{
  btn.addEventListener('click', ()=>{
   document.querySelector('.controls .active').classList.remove('active');
   btn.classList.add('active');
   let src = btn.getAttribute('data-src');
   document.querySelector('#video-slider').src = src;
   });
});

var swiper = new Swiper(".review-slider", {
    spaceBetween: 20,
    loop:true,
    autoplay:{
        delay: 2500,
        disableOnInteraction: false,
    },
    breakpoints: {
        640: {
            slidesPerView:1,
        },
        768:{
            slidesPerView:2,
        },
        1024:{
            slidesPerView:3,
        },
    },
});


var swiper = new Swiper(".brand-slider", {
    spaceBetween: 20,
    loop:true,
    autoplay:{
        delay: 2500,
        disableOnInteraction: false,
    },
    breakpoints: {
        450: {
            slidesPerView:2,
        },
        768:{
            slidesPerView:3,
        },
        991:{
            slidesPerView:4,
        },
        1200:{
            slidesPerView:5,
        },
    },
});