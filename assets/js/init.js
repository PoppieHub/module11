/*
const surName = document.querySelector('#surnameOutput');
const firstName = document.querySelector('#firstNameOutput');
const secondName = document.querySelector('#secondNameOutput');
const birthYear = document.querySelector('#birthYearOutput');
const gender = document.querySelector('#genderOutput');
const profession = document.querySelector('#professionOutput');
const image = document.querySelector('.avatar');

const btnDelete =  document.querySelector('.delete');
const btnRefresh =  document.querySelector('.refresh');
 */

function generate () {
    const initPerson = personGenerator.getPerson();

    const birth = initPerson.birth;
    let day = addZero(birth[1][0]), month = addZero(birth[1][1]), year = addZero(birth[1][2]);

    function addZero(arg) {
        if (arg.toString().length === 1) {
           return arg = '0' + arg.toString();
        }

        return arg.toString();
    }

    const date = `${month}/${day}/${year}`;

    initPerson.age = calculateAge(date);

    console.log(initPerson);


    /*
    surName.innerText = initPerson.surName;
    firstName.innerText = initPerson.firstName;
    secondName.innerText = initPerson.secondName;
    birthYear.innerText = initPerson.birth;
    gender.innerText = initPerson.gender;
    profession.innerText = initPerson.profession;

    if (initPerson.gender === personGenerator.GENDER_MALE){
        image.src = 'assets/img/male.svg';
    } else if (initPerson.gender === personGenerator.GENDER_FEMALE) {
        image.src = 'assets/img/female.svg';
    } else {
        image.src = 'assets/img/default.svg';
    }
     */
}

window.addEventListener('load', function () {
    generate();
});
/*

btnDelete.addEventListener('click',function () {

    image.src = 'assets/img/default.svg';

    surName.innerText = 'Фамилия';
    firstName.innerText = 'Имя';
    secondName.innerText = 'Отчество';
    birthYear.innerText = 'Дата рождения';
    gender.innerText = 'Пол';
    profession.innerText = 'Профессия';

});

btnRefresh.addEventListener('click',()=>generate());

 */

function calculateAge (birthDate) {
    birthDate = new Date(birthDate);
    let otherDate = new Date();

    let years = (otherDate.getFullYear() - birthDate.getFullYear());

    if (otherDate.getMonth() < birthDate.getMonth() ||
        otherDate.getMonth() === birthDate.getMonth() && otherDate.getDate() < birthDate.getDate()) {
        years--;
    }

    return years;
}