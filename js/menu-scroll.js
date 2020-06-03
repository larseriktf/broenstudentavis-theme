// When the user scrolls down 80px from the top of the document, resize the navbar's padding and the logo's font size
window.onscroll = () => {
    let header = document.getElementById("site-header");
    let logo = document.getElementsByClassName("custom-logo")[0];
    let title = document.getElementById("site-title");
    let scroll_amount = 80;

    if (document.body.scrollTop > scroll_amount || document.documentElement.scrollTop > scroll_amount) { // this needs a rework, along with the css
        header.style.height = "2em";
        logo.style.display = "none";
        logo.style.opacity = "0";

        title.style.display = "block";
        title.style.opacity = "1";
    } else {
        header.style.height = "8em";
        logo.style.display = "block";
        logo.style.opacity = "1";

        title.style.display = "none";
        title.style.opacity = "0";
    }
}