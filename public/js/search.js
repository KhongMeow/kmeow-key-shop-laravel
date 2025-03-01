const show_search = document.querySelector(".show-search");
const search_place = document.querySelector(".search-place");
const shovv = document.querySelector(".hide-search");
const body = document.querySelector(".body");
const search_input = document.querySelector("#search-input")

show_search.addEventListener("click", () => {
    search_place.classList.toggle("search-place");
    search_place.classList.toggle("shovv");
    body.classList.toggle("overflow-hidden")
    body.classList.toggle("overflow-auto")
    search_input.value = "";
})
shovv.addEventListener("click", () => {
    search_place.classList.toggle("search-place");
    search_place.classList.toggle("shovv");
    body.classList.toggle("overflow-hidden")
    body.classList.toggle("overflow-auto")
    search_input.value = "";
})