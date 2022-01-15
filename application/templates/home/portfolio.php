<div class="about_me">
    <div class="row col-12">
        <h6 class="mt-4 mb-2 col-12 text-center">Мой профиль на <a class="text-decoration-none text-muted" href="https://github.com/PoppieHub">GitHub</a></h6>

        <?php foreach ($hand['portfolio'] as $key => $value): ?>
            <div class="col-12 project mt-4 mb-1">
                <div class="title text-center">
                    <p class="title-portfolio"><u><?= $value['title'] ?></u></p>
                </div>
                <div class="description">
                    <p class="lead"><?= $value['description'] ?></p>
                    <?php if ($value['scr']): ?>
                        <span class="align-items-center offset-md-5 mb-2 mt-2">
                            <a class="btn btn-outline-light" href="<?php echo $value['scr']; ?>">Ссылка на репозиторий GitHub</a>
                        </span>
                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>