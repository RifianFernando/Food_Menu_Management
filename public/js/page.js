$(document).ready(() => {
    $('.search').on('submit', () => {
        return false;
    });
});
$('.search').keypress((e) => {
    if (e.which === 13) {
        $('.search').submit();
        alert('Form submitted successfully.')
    }
})


let section = document.querySelectorAll('section');
let navLinks = document.querySelectorAll('nav a');

window.onscroll = () =>{
    //changing navbar
    if(window.pageYOffset > 5){
        document.getElementById("navigationBar").style.backgroundColor = "rgba(51, 66, 87, 0.8)";
    } else {
        document.getElementById("navigationBar").style.backgroundColor = "rgba(51, 66, 87, 0)";
    }

    if(window.pageYOffset > 5){
        document.getElementById("navigationBar").style.backgroundColor = "rgba(51, 66, 87, 0.8)";
    } else {
        document.getElementById("navigationBar").style.backgroundColor = "rgba(51, 66, 87, 0)";
    }

    //scrollspy
    section.forEach(sec =>{

        let top = window.scrollY;
        let offset = sec.offsetTop - 150;
        let height = sec.offsetHeight;
        let id = sec.getAttribute('id');

        if(top >= offset && top < offset + height){
            navLinks.forEach(links =>{
                links.classList.remove('active');
                document.querySelector('nav a[href*=' + id + ']').classList.add('active');

            })
        }
    })
};
