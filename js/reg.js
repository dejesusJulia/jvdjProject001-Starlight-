console.log('Register');

const userTab = document.querySelector('.reg-container nav .user');
const adminTab = document.querySelector('.reg-container nav .admin');
// console.log(userTab.classList);
// console.log(adminTab.classList);
const userSection = document.querySelector('.reg-container #user');
const adminSection = document.querySelector('.reg-container #admin');
// console.log(userSection.id);
// console.log(adminSection.id);
const userPass = document.querySelector('#user-pass');
const adminPass = document.querySelector('#admin-pass');
// console.log(userPass.type);
// console.log(adminPass.type);
const showPassUser = document.querySelector('#showpassUser');
// console.log(showPassUser.id);
const showPassAdmin = document.querySelector('#showpassAdmin');
// console.log(showPassAdmin.id);
const userSub = document.querySelector('#user-sub');
const adminSub = document.querySelector('#admin-sub');

userTab.addEventListener('click', function(){
    userTab.classList.add('selected');
    adminTab.classList.remove('selected');

    userSection.classList.add('show');
    adminSection.classList.remove('show');
});

adminTab.addEventListener('click', function(){
    adminTab.classList.add('selected');
    userTab.classList.remove('selected');

    userSection.classList.remove('show');
    adminSection.classList.add('show');
});

showPassUser.addEventListener('click', function(){
    (userPass.type == "password") ? userPass.type = "text" : userPass.type = "password";
});

showPassAdmin.addEventListener('click', function(){
    (adminPass.type == "password") ? adminPass.type = "text" : adminPass.type = "password";
});

userSub.addEventListener('click', function(e){
    confirm('Are you sure you want to submit?');
});
adminSub.addEventListener('click', function(e){
    confirm('Are you sure you want to submit?');
});

