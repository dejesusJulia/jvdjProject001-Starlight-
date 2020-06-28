// variable declaration
const navList = document.querySelector('.nav-list');
const navItem = document.querySelectorAll('.nav-item');

const dashbtn = document.querySelector('#dashlink');
const sumbtn = document.querySelector('#sumlink');
const profilebtn = document.querySelector('#profilelink');

const wrap1 = document.querySelector('#dashCont');
const wrap2 = document.querySelector('#summaryCont');
const wrap3 = document.querySelector('#editProf');

navItem.forEach(el => {
    el.addEventListener('click', function(){
        navList.querySelector('.active').classList.remove('active');

        el.classList.add('active');
        // console.log('oyy');
        // console.log(el);
    });
    
});
dashbtn.addEventListener('click', dashMethod);
sumbtn.addEventListener('click', sumMethod);
profilebtn.addEventListener('click', profMethod);

function dashMethod(){
    wrap1.style.display = 'flex';
    wrap2.style.display = 'none';
    wrap3.style.display = 'none';
}
function sumMethod(){
    wrap2.style.display = 'flex';
    wrap1.style.display = 'none';
    wrap3.style.display = 'none';
}
function profMethod(){
    wrap3.style.display = 'flex';
    wrap1.style.display = 'none';
    wrap2.style.display = 'none'; 
}


