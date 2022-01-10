const personGenerator = {
    surnameJson: `{  
        "count": 15,
        "list": {
            "id_1": "Иванов",
            "id_2": "Смирнов",
            "id_3": "Кузнецов",
            "id_4": "Васильев",
            "id_5": "Петров",
            "id_6": "Михайлов",
            "id_7": "Новиков",
            "id_8": "Федоров",
            "id_9": "Кравцов",
            "id_10": "Николаев",
            "id_11": "Семёнов",
            "id_12": "Славин",
            "id_13": "Степанов",
            "id_14": "Павлов",
            "id_15": "Александров",
            "id_16": "Морозов"
        }
    }`,

    firstNameMaleJson: `{
        "count": 10,
        "list": {     
            "id_1": "Александр",
            "id_2": "Максим",
            "id_3": "Иван",
            "id_4": "Артем",
            "id_5": "Дмитрий",
            "id_6": "Никита",
            "id_7": "Михаил",
            "id_8": "Даниил",
            "id_9": "Егор",
            "id_10": "Андрей"
        }
    }`,

    firstNameFemaleJson: `{
        "count": 10,
        "list": {     
            "id_1": "Анастасия",
            "id_2": "Алиса",
            "id_3": "Виктория",
            "id_4": "София",
            "id_5": "Елизавета",
            "id_6": "Ксения",
            "id_7": "Дарья",
            "id_8": "Елизавета",
            "id_9": "Анна",
            "id_10": "Ева"
        }
    }`,

    secondNameJson: `{
        "count":10,
        "list": {
            "id_1": "Владиславович",
            "id_2": "Дмитриевич",
            "id_3": "Артемьевич",
            "id_4": "Олегович",
            "id_5": "Константинович",
            "id_6": "Сергеевич",
            "id_7": "Матвеевич",
            "id_8": "Иванович",
            "id_9": "Кириллович",
            "id_10": "Максимович"
        }
    }`,

    professionJson: `{
        "male": {
             "count": 5,
             "list": {
                 "id_1": "Full-stack разработчик",
                 "id_2": "Аналитик баз данных",
                 "id_3": "Тестировщик",
                 "id_4": "Контент-менеджер",
                 "id_5": "Тим лид"
             }
        },
        "female": {
            "count": 5,
            "list": {
                "id_1": "Project-manager",
                "id_2": "Маркетолог",
                "id_3": "Дизайнер",
                "id_4": "HR",
                "id_5": "Дата-инженер"
            }
        },
        "duo": {
            "count": 7,
            "list": {
                "id_1": "DevOps-инженер",
                "id_2": "Seo-специалист",
                "id_3": "Системный аналитик",
                "id_4": "QA-инженер",
                "id_5": "Product-manager",
                "id_6": "Frontend-разработчик",
                "id_7": "Backend-разработчик"
            }
        }
    }`,

    month: `{
        "count": 12,
        "list": {
            "id_1" : "декабря",
            "id_2" : "января",
            "id_3" : "февраля",
            "id_4" : "марта",
            "id_5" : "апреля",
            "id_6" : "мая",
            "id_7" : "июня",
            "id_8" : "июля",
            "id_9" : "августа",
            "id_10": "сентября",
            "id_11": "октября",
            "id_12": "ноября"
        }
    }`,

    GENDER_MALE: 'Мужчина',
    GENDER_FEMALE: 'Женщина',

    randomIntNumber: (max = 1, min = 0) => Math.floor(Math.random() * (max - min + 1) + min),

    randomValue: function (json) {
        const obj = JSON.parse(json);
        const prop = `id_${this.randomIntNumber(obj.count, 1)}`;  // this = personGenerator

        return obj.list[prop];
    },

    randomGenderValue: function(number) {
        return Math.floor(Math.random() * number);
    },

    randomGender: function() {
        let current = this.randomGenderValue(2);

        (current > 0)? current = this.GENDER_FEMALE: current = this.GENDER_MALE;

        return current;
    },

    randomFirstName: function(gender) {

        if (gender === this.GENDER_MALE) {
            return this.randomValue(this.firstNameMaleJson);
        }

        return this.randomValue(this.firstNameFemaleJson);
    },


    randomSurname: function(gender) {

        if (gender === this.GENDER_FEMALE) {
            return this.randomValue(this.surnameJson) + 'а';
        }

        return this.randomValue(this.surnameJson);
    },

    randomSecondName: function(gender) {
        let secondName = this.randomValue(this.secondNameJson);

        if (gender === this.GENDER_FEMALE) {
            secondName = secondName.substring(0, secondName.length - 2);
            secondName += 'на';
        }

        return secondName;
    },

    randomDate: function() {
        let day, month, year;

        year = this.randomIntNumber(1989,2003);
        month  = this.randomValue(this.month);

        if (month === 'февраля') {
            day = this.randomIntNumber(1, 28);
        } else {
            day = this.randomIntNumber(1,31);
        }

        return `${day} ${month} ${year}`;
    },

    randomProfession: function(gender) {
        const current = this.randomGenderValue(2); //проверка на общую профессией
        const obj = JSON.parse(this.professionJson);
        let prop;

        if (current > 0) {
            prop = `id_${this.randomIntNumber(obj.duo.count, 1)}`;

            return obj.duo.list[prop]; //общая профессия
        } else {
            if (gender === this.GENDER_MALE) {
                prop = `id_${this.randomIntNumber(obj.male.count, 1)}`;

                return obj.male.list[prop]; //мужская профессия
            } else {
                prop = `id_${this.randomIntNumber(obj.female.count, 1)}`;

                return obj.female.list[prop]; //женская профессия
            }
        }
    },

    getPerson: function () {
        this.person = {};
        this.person.gender = this.randomGender();
        this.person.firstName = this.randomFirstName(this.person.gender);
        this.person.surName= this.randomSurname(this.person.gender);
        this.person.secondName = this.randomSecondName(this.person.gender);
        this.person.birth = this.randomDate();
        this.person.profession = this.randomProfession(this.person.gender);

        return this.person;
    }
};
