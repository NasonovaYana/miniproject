<div id="wrapper">
    <h1>Гостевая книга: режим администратора</h1>
    <a href="/messages"><input type="submit" class="btn btn-info" value="Выйти"></a>
    <div>
        <nav>
            <ul class="pagination">
                <li class="disabled">
                    <a href="?page=1" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <?php for ($i = 1; $i <= $pageCount; $i++):
                    if ($i != $nav):?>
                        <li><a href="?page=<?= $i ?>"><?= $i ?></a></li>
                    <?php
                    else:?>
                        <li class="active"><a href="?page=<?= $i ?>"><?= $i ?></a></li>
                    <?php endif; endfor;
                ?>
                <li>
                    <a href="?page=<?= $pageCount ?>" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>

    <div class="note">
        <?php foreach ($messageList as $messageNote): ?>
            <div class="note">
                <p>
                    <span class="date"><?= $messageNote['datetime'] ?></span>
                    <span class="name"><?= $messageNote['user_name'] ?></span>
                </p>
                <p>
                    <?= $messageNote['message_text'] ?>
                </p>
            <a href=<?= '/delete/' . $messageNote['id'] ?>>Удалить новость</a>
        <?php endforeach; ?>

    </div>
    <?php if ($addToDB): ?>
        <div class="info alert alert-info">
            Запись успешно сохранена!
        </div>
    <?php endif; ?>
    <div id="form">
        <form action="" method="POST">
            <p><input class="form-control" placeholder="Ваше имя" name='user_name'></p>
            <p><textarea class="form-control" placeholder="Ваш отзыв" name="message_text"></textarea></p>
            <p><input type="submit" class="btn btn-info btn-block" value="Сохранить"></p>
        </form>
    </div>
</div>