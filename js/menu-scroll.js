// When the user scrolls down 80px from the top of the document, resize the navbar's padding and the logo's font size
window.onscroll = () => {
    let header = document.getElementById("site-header");
    let logo = document.getElementsByClassName("custom-logo");
    let scroll_amount = 80;

    if (document.body.scrollTop > scroll_amount || document.documentElement.scrollTop > scroll_amount) {
        header.style.padding = "0";
    } else {
        header.style.padding = "1.5em";
    }
}