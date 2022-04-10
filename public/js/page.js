const open = document.getElementById('button_cart');
const modal = document.getElementById('modal_container');
const close = document.getElementById('close_cart'); 
const body = document.querySelector("*");

open.addEventListener('click', () => {
    modal.classList.add('show');
    body.classList.toggle("overflow");
});

close.addEventListener('click', () => {
    modal.classList.remove('show');
    body.classList.toggle("overflow");
});

window.onclick = function(event) {
    if (event.target == modal) {
        modal.classList.remove('show');
        body.classList.toggle("overflow");
    }
}

function food() {  
    
}  

function drink(){

}