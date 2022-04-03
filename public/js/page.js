const open = document.getElementById('button_cart');
const modal = document.getElementById('modal_container');
const close =document.getElementById('close_cart'); 
const scrollY = document.documentElement.style.getPropertyValue('--scroll-y');


open.addEventListener('click', () => {
    modal.classList.add('show');

    // window.addEventListener('scroll', () => {
    //     document.documentElement.style.setProperty('--scroll-y', `${window.scrollY}px`);
    // });
});
close.addEventListener('click', () => {
    modal.classList.remove('show');
});
window.onclick = function(event) {
    if (event.target == modal) {
        modal.classList.remove('show');
    }
}
// window.addEventListener('scroll', () => {
//     document.documentElement.style.setProperty('--scroll-y', `${window.scrollY}px`);
// });