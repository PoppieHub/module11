<div class="about_me">
    <h1><?=  $hand['hello'] ?></h1>

    <div class="data row col-12 mt-3">
        <div class="fullname col-9">
            <div class="wrapper-person">
                <div class="person row">
                    <div class="fio row col-12">
                        <div class="firstName col-md-6">
                            <p><?= $hand['firstName'] ?></p>
                        </div>
                        <div class="lastName col-md-6">
                            <p><?= $hand['surname'] ?></p>
                        </div>
                    </div>
                    <div class="cityLabel col-md-6">
                        <p>Город:</p>
                    </div>
                    <div class="city col-md-6">
                        <p><?= $hand['city'] ?></p>
                    </div>
                    <div class="ageLabel col-md-6">
                        <p>Возраст:</p>
                    </div>
                    <div class="age col-md-6">
                        <p><?= $hand['age'] ?></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-3">
            <?= '<img class="img" src="/assets/img/picture.svg">' ?>
        </div>
    </div>

    <div class="knowledge">

        <?php  include 'includes/user-blcok/knowledge.inc.php'; ?>
        <?= '<p>'.$a.' '.$b.' '.$c.'</p>' ?> <br>

        <?php
            $a = 10;
            $b = 20;
            $c = $a + $b;
            echo '<p>'.$c.'</p>'.'<br>';
            echo'<p>'.$d.'</p>';
        ?>

    </div>

    <div class="article">
        <p class="text">
            Визитка построена на собственно реализованном mvc патерне. Условия задания очень детские и шаблон, на котором как понял нужно дать ответ, очень плох. Не знаю зачем это пишу, бла бла бла бла...
        </p>
    </div>
</div>