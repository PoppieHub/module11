<div class="about_me">
    <?php if (!empty($hand['hello'])): ?>
        <h1><?=  $hand['hello'] ?></h1>
    <?php endif; ?>

    <div class="data row col-12 mt-3">
        <div class="container col-9">
            <div class="wrapper-person">
                <div class="person row">
                    <div class="empty-block col-3"></div>
                    <div id="content" class="content row col-9">
                        <div class="firstName col-md-6">
                            <?php if (!empty($hand['firstName'])): ?>
                                <p class="first-content" id="firstName"><?= $hand['firstName'] ?></p>
                            <?php endif; ?>
                        </div>
                        <div class="lastName col-md-6">
                            <?php if (!empty($hand['lastName'])): ?>
                                <p id="lastName"><?= $hand['lastName'] ?></p>
                            <?php endif; ?>
                        </div>
                        <div class="cityLabel col-md-6">
                            <p class="first-content">Город:</p>
                        </div>
                        <div class="city col-md-6">
                            <?php if (!empty($hand['city'])): ?>
                                <p id="city"><?= $hand['city'] ?></p>
                            <?php endif; ?>
                        </div>
                        <div class="ageLabel col-md-6">
                            <p class="first-content">Возраст:</p>
                        </div>
                        <div class="age col-md-6">
                            <?php if (!empty($hand['age'])): ?>
                                <p id="age"><?= $hand['age'] ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-3">
            <?= '<img class="img" alt="picture" src="/public/assets/img/picture.svg">' ?>
        </div>
    </div>

    <div class="knowledge">
        <div class="container">
            <div class="row text-center">
                <div class="title-knowledge col-12 mt-4">
                    <p>
                        <span id="random-fact">Рандомные факты</span>
                    </p>
                </div>
                <?php if (!empty($hand['ageDescription'])): ?>
                    <div class="title-knowledge col-12">
                        <p class="periodInfo"><?= 'Возрастной период: '.$hand['ageDescription'].'.' ?></p>
                    </div>
                <?php endif; ?>
                <?php if (!empty($hand['birthDays'])): ?>
                    <div class="title-knowledge col-12">
                        <p class="birthDays"><?= 'С момента рождения прошло: '.$hand['birthDays'].' дней.' ?></p>
                    </div>
                <?php endif; ?>

                <div class="title-knowledge col-12">
                    <a class="generate btn btn-outline-light refresh"><i class="fas fa-sync"></i>&#160 Сгенерировать фейковые данные</a>
                </div>
            </div>
        </div>
    </div>

    <?php if (!empty($hand['description'])): ?>
        <div class="article">
            <p class="text"><?= $hand['description'] ?></p>
        </div>
    <?php endif; ?>
</div>

<script type="text/javascript" src="../../../public/assets/js/init.js" ></script>
<script type="text/javascript" src="../../../public/assets/js/personGenerator.js" ></script>