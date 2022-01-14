<div class="about_me">
    <?php if ($hand['hello']): ?>
        <h1><?=  $hand['hello'] ?></h1>
    <?php endif; ?>

    <div class="data row col-12 mt-3">
        <div class="container col-9">
            <div class="wrapper-person">
                <div class="person row">
                    <div class="empty-block col-3"></div>
                    <div class="content row col-9">
                        <div class="firstName col-md-6">
                            <?php if ($hand['firstName']): ?>
                                <p class="first-content"><?= $hand['firstName'] ?></p>
                            <?php endif; ?>
                        </div>
                        <div class="lastName col-md-6">
                            <?php if ($hand['lastName']): ?>
                                <p><?= $hand['lastName'] ?></p>
                            <?php endif; ?>
                        </div>
                        <div class="cityLabel col-md-6">
                            <p class="first-content">Город:</p>
                        </div>
                        <div class="city col-md-6">
                            <?php if ($hand['city']): ?>
                                <p><?= $hand['city'] ?></p>
                            <?php endif; ?>
                        </div>
                        <div class="ageLabel col-md-6">
                            <p class="first-content">Возраст:</p>
                        </div>
                        <div class="age col-md-6">
                            <?php if ($hand['age']): ?>
                                <p><?= $hand['age'] ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-3">
            <?= '<img class="img" src="/assets/img/picture.svg">' ?>
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
                <?php if ($hand['ageDescription']): ?>
                    <div class="title-knowledge col-12">
                        <p><?= 'Ваш возрастной период: '.$hand['ageDescription'].'.' ?></p>
                    </div>
                <?php endif; ?>
                <?php if ($hand['birthDays']): ?>
                    <div class="title-knowledge col-12">
                        <p><?= 'С момента вашего рождени прошло: '.$hand['birthDays'].' дней.' ?></p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <?php if ($hand['description']): ?>
        <div class="article">
            <p class="text"><?= $hand['description'] ?></p>
        </div>
    <?php endif; ?>
</div>