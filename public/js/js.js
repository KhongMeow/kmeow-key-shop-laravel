function isNumberKey(evt) {
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    // Charcode 8 is for backspace, 48 is for 0 and 57 is for 9
    return (charCode >= 48 && charCode <= 57) || charCode === 8;
}


const cc_number = document.getElementById('cc-number.value ===');
const errorElement = document.getElementById('error');

function cardspace() {
    var carddigit = document.getElementById('cc-number').value;
    if (carddigit.length == 4 || carddigit.length == 9 || carddigit.length == 14) {
        document.getElementById('cc-number').value = carddigit + ' ';
        document.getElementById('cc-number').max = 1;
    }
}

function addSlashes() {
    var expire_date = document.getElementById('cc-exp').value;
    if (expire_date.length == 4) {
        document.getElementById('cc-exp').value = expire_date + '/';
        document.getElementById('cc-exp').max = 1;
    }
}

function validate(evt) {
    var theEvent = evt || window.event;
    var key = theEvent.keyCode || theEvent.which;
    key = String.fromCharCode(key);
    var regex = /[0-9]/;
    if (!regex.test(key)) {
        theEvent.returnValue = false;
        if (theEvent.preventDefault) theEvent.preventDefault();
    }
}




// function Alert() {
//     alert("Thank You!!!!!!!!!");
// }
const bar = document.querySelector("#bar");
const category = document.querySelector("#category");
const header_background = document.querySelector("#header-backgound");
const right = document.querySelector("#right");
const search = document.querySelector("#search");
const content = document.querySelector("#content");

const blank_background = document.querySelector("#blank-background");

bar.addEventListener("click", () => {
    category.classList.toggle("max-lg:hidden");
    search.classList.toggle("max-lg:hidden");
    category.classList.toggle("block");
    header_background.classList.toggle("max-lg:fixed");
    header_background.classList.toggle("max-lg:h-[20rem]");
    header_background.classList.toggle("max-lg:rounded-b");
    // content.classList.toggle("pt-[5rem]");
    // alert("Meiw");
});


const cart = document.querySelector("#cart");
const cart_pop_up = document.querySelector("#cart-pop-up");
const cart_cancel = document.querySelector("#cart-cancel");

cart.addEventListener("click", () => {
    cart_pop_up.classList.toggle("hidden");
    profile_pop_up.classList.add("hidden");
    blank_background.classList.remove("hidden");
    // blank_background.classList.toggle("hidden");
});
cart_cancel.addEventListener("click", () => {
    cart_pop_up.classList.toggle("hidden");
    profile_pop_up.classList.add("hidden");
    blank_background.classList.add("hidden");
    // blank_background.classList.add("hidden");
});


const profile = document.querySelector("#profile");
const profile_pop_up = document.querySelector("#profile-pop-up");

profile.addEventListener("click", () => {
    profile_pop_up.classList.toggle("hidden");
    cart_pop_up.classList.add("hidden");
    blank_background.classList.remove("hidden");
});

blank_background.addEventListener("click", () => {
    cart_pop_up.classList.add("hidden");
    profile_pop_up.classList.add("hidden");
    blank_background.classList.add("hidden");
});

document.addEventListener("DOMContentLoaded", function() {
    var bodyElement = document.querySelector('body');

    var bodyHeight = window.getComputedStyle(bodyElement).height;
    // alert(bodyHeight);
    blank_background.style.height = bodyHeight;
});