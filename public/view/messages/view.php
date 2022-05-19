
<div id="wrapper">
    <h1>Гостевая книга</h1>

    <div class="note">
        <p>
            <span class="date"><?= $messageNote['datetime'] ?></span>
            <span class="name"><?= $messageNote['user_name'] ?></span>
        </p>
        <p>
            <?= $messageNote['message_text'] ?>
        </p>
        <a href=<?='/messages/'.$previousId?>><input type="submit" class="btn" value="Предыдущий отзыв"></a>
        <a href="/messages"><input type="submit" class="btn btn-info" value="Вернуться на главную"></a>
        <a href=<?='/messages/'.$nextId?>><input type="submit" class="btn" value="Следующий отзыв"></a>

    </div>
</div>
