const btnGenerate = document.querySelector('.generate');
const age = document.querySelector('#age');
const firstName = document.querySelector('#firstName');
const lastName = document.querySelector('#lastName');
const city = document.querySelector('#city');
const content = document.querySelector('#content');

/*
* Считает колличество лет от приходящей даты
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

/*
* Api Генерирует рандомные исторические факты
*/
function api () {

    return  $.get('http://numbersapi.com/random/year?callback=showNumber', function(data) {
        $('#random-fact').text(data);
    });

}

const createBlock = (selectorName, className) => {
    const selector = document.createElement(selectorName);

    if(className){
        selector.classList.add(className);
    }

    return selector;
}

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

    console.log(content);

    lastName.innerText = initPerson.surName;
    firstName.innerText = initPerson.firstName;
    age.innerText = initPerson.age;
    city.innerText = initPerson.city;

    console.log(createBlock('div','birth'));

}

btnGenerate.addEventListener('click', function () {
    generate();
    api();
});

window.addEventListener('load', function () {
    api();
});
