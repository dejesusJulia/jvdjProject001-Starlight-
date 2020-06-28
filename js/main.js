
console.log('Please Login');

//Click login

const nameInput = document.querySelector('#sn');
var passInput = document.querySelector('#pw');
const startForm = document.querySelector('.start-form').addEventListener('submit', onSubmit);
const regLink = document.querySelector('#register-link').addEventListener('click', confirmForm);
console.log(nameInput.id);
// show password login
var show = document.querySelector('#showpass').addEventListener('click', function(){
    (passInput.type == "password") ? passInput.type = "text" : passInput.type = "password"; 
});

//for reg
const submitForm = document.querySelector('#submit-btn').addEventListener('click', confirmForm);
const reqFields = document.querySelector('.req-fields');


//for login submission
function onSubmit(){
        if(nameInput.value == '' || passInput.value == '') {
            alert('Please enter all fields');
        } else {
            console.log('login success');
        }
}
//for registration
function confirmForm(e){
        //e.preventDefault();
        console.log(1);

        if(reqFields.value == ''){
            alert('Please fill out the required fields');
        }else{
            confirm('Are you sure you want to submit?');
        }
    }







