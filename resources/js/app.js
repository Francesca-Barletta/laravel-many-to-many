import './bootstrap';
import '~resources/scss/app.scss';
import '~icons/bootstrap-icons.scss';
import * as bootstrap from 'bootstrap';
import.meta.glob([
    '../img/**'
])


document.querySelectorAll('.delete-form').forEach(form =>{
    form.addEventListener('submit', (ev)=>{
        console.log('click');
        ev.preventDefault();

        const modalDomElement = form.querySelector('.modal');
        const modalDomElementYes = form.querySelector('.modal-yes');
        const modalDomElementNo = form.querySelector('.modal-no');

        modalDomElement.classList.add('visible');

        modalDomElementNo.addEventListener('click', function(){
            modalDomElement.classList.remove('visible');
        })

        modalDomElementYes.addEventListener('click', function(){

            form.submit();
        })
    })
})