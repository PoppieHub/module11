const btnGenerate = document.querySelector('.generate');
const age = document.querySelector('#age');
const firstName = document.querySelector('#firstName');
const lastName = document.querySelector('#lastName');
const city = document.querySelector('#city');
const content = document.querySelector('#content');
const birthDays = document.querySelector('.birthDays');
const periodInfo = document.querySelector('.periodInfo');

const jsonInterval = `[
    {
        "namePeriod": "подростковый",
        "periodFrom": "12",
        "periodUpTo": "16"
    },
    {
        "namePeriod": "юношеский",
        "periodFrom": "17",
        "periodUpTo": "20"
    },
    {
        "namePeriod": "зрелый возраст, 1 период",
        "periodFrom": "21",
        "periodUpTo": "34"
    },
    {
        "namePeriod": "зрелый возраст, 2 период",
        "periodFrom": "35",
        "periodUpTo": "59"
    },
    {
        "namePeriod": "пожилой возраст",
        "periodFrom": "60",
        "periodUpTo": "74"
    },
    {
        "namePeriod": "старческий возраст",
        "periodFrom": "75",
        "periodUpTo": "89"
    },
    {
        "namePeriod": "долгожители",
        "periodFrom": "90",
        "periodUpTo": "none"
    },
    {
        "namePeriod": "детский",
        "periodFrom": "none",
        "periodUpTo": "11"
    }
]`;

// преобразование JSON в объект JavaScript
const intervalObj = JSON.parse(jsonInterval);


/*
* Считает количество лет от приходящей даты
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

/*
* Добавляет нули к дате
*/
function addZero(arg) {
    if (arg.toString().length === 1) {
        return arg = '0' + arg.toString();
    }

    return arg.toString();
}

/*
* Создает селектор
*/
const createBlock = (selectorName) => {
    return document.createElement(selectorName);
}

/*
* Добавляет клас к селектору
*/
const addClass = (selectorName, classListName) => {
    return selectorName.classList.add(...classListName);
}

/*
* Вставляет значения в dom
*/
const insertValue = (initPerson, date, period) => {
    lastName.innerText = initPerson.surName;
    firstName.innerText = initPerson.firstName;
    age.innerText = initPerson.age;
    city.innerText = initPerson.city;
    birthDays.innerText = `С момента рождения прошло: ${getDiffDays(new Date(), date)} дней.`;
    periodInfo.innerText = `Возрастной период: ${period}.`;
}

/*
* Удаление созданных селекторов
*/
const clearDisplay = ()  => {
    const birthLabel = document.querySelector('.birthLabel');
    const birth = document.querySelector('.birth');

    if (birthLabel && birth) {
        content.removeChild(birthLabel);
        content.removeChild(birth);
    }
}

/*
* Получает разницу в днях между двумя датами
*/
const getDiffDays = (dateMore, dateLess) => {
    return Math.floor(( Date.parse(dateMore) - Date.parse(dateLess) ) / 86400000);
}

/*
* Получает json с периодами с сервера
*/
/*
function sendRequest() {
    let obj = {};
    let xhr = new XMLHttpRequest()
    xhr.open(
        'GET',
        '/jsonResponse',
        true
    )
    xhr.send()

    xhr.onreadystatechange = function() {
        if (xhr.readyState !== 4) {
            return
        }
        if (xhr.status === 200) {
            obj = {...JSON.parse(xhr.responseText)};
            return obj;
        } else {
            console.log('err', xhr.responseText)
        }
    }

}
*/


function generate () {

    clearDisplay();

    const initPerson = personGenerator.getPerson();

    const birth = initPerson.birth;
    let day = addZero(birth[1][0]), month = addZero(birth[1][1]), year = addZero(birth[1][2]);

    const date = `${year}/${month}/${day}`;
    initPerson.age = calculateAge(date);

    let period;
    intervalObj.forEach((element) => {
        if (initPerson.age <= element.periodUpTo && element.periodFrom === 'none') {
            period = element.namePeriod;
        } else if (element.periodFrom <= initPerson.age && element.periodUpTo === 'none') {
            period = element.namePeriod;
        } else if (element.periodFrom <= initPerson.age && initPerson.age <= element.periodUpTo) {
            period = element.namePeriod;
        }
    });

    insertValue(initPerson, date, period);

    let birthLabelDiv = createBlock('div');
    addClass(birthLabelDiv,['birthLabel', 'col-md-6']);

    let pLabel = createBlock('p');
    addClass(pLabel,['first-content-birth']);
    pLabel.innerText = 'Дата рождения:';

    let birthDiv = createBlock('div');
    addClass(birthDiv,['birth', 'col-md-6']);

    let p = createBlock('p');
    p.innerText = birth[0];

    birthLabelDiv.appendChild(pLabel);
    birthDiv.appendChild(p);
    content.appendChild(birthLabelDiv);
    content.appendChild(birthDiv);

    //console.log(sendRequest());

}

btnGenerate.addEventListener('click', function () {
    generate();
    api();
});

window.addEventListener('load', function () {
    api();
});
