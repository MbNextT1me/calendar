<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/for_index.css" type="text/css" />
    <title>my_calendar</title>
</head>

<body>
    <div class="container">
        <h1>Мой календарь</h1>
        <form action="../update.php?id=<?= $_GET['id']?>" method="post">
            <fieldset class="form_fieldset_input">
                <legend>Текущая задача</legend>
                <div class="form-group">
                    <label for="topic">Тема:</label>
                    <input type="text" name="topic" id="topic" class="form-control" onclick="" value=<?=$_GET['topic']?>>
                </div>
                <div class="form-group">
                    <label for="type">Тип:</label>
                    <div class="form-control">
                        <select name="type" id="type">
                            <option <?= ($_GET['type']==='Встреча'?'selected':'') ?>>Встреча</option>
                            <option <?= ($_GET['type']==='Звонок'?'selected':'') ?>>Звонок</option>
                            <option <?= ($_GET['type']==='Совещание'?'selected':'') ?>>Совещание</option>
                            <option <?= ($_GET['type']==='Дело'?'selected':'') ?>>Дело</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="place">Место:</label>
                    <input type="text" name="place" id="place" class="form-control" onclick="" value=<?= $_GET['place']?>>
                </div>
                <div class="form-group">
                    <label for="date">Дата и время:</label>
                    <div class="form-control datetime">
                        <input type="date" name="date" id="date" class="date" onclick="" value= <?= $_GET['datetime']?>>
                        <?php $buff = $_GET['datetime'];
                        $buff = explode(" ", "$buff");
                        ?>
                        <input type="time" name="time" id="time" class="time" onclick=""
                               value=<?= $buff[1]?>>
                    </div>
                </div>
                <div class="form-group">
                    <label for="duration">Длительность:</label>
                    <div class="form-control">
                        <select name="duration" id="duration">
                            <option <?= ($_GET['duration']==='30 минут'?'selected':'') ?>>30 минут</option>
                            <option <?= ($_GET['duration']==='1 час'?'selected':'') ?>>1 час</option>
                            <option <?= ($_GET['duration']==='2 часа'?'selected':'') ?>>2 часа</option>
                            <option <?= ($_GET['duration']==='6 часов'?'selected':'') ?>>6 часов</option>
                            <option <?= ($_GET['duration']==='Более'?'selected':'') ?>>Более</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="comment" class="textarea_label">Комментарий:</label>
                    <textarea name="comment" id="comment" class="form-control" onclick="" rows="3"><?= $_GET['comment'] ?></textarea>
                </div>
                <div class="form-group">
                    <label></label>
                    <div class="form-control special_form_control">
                        <a class="btn btn_task btn_a" href="../../../index.php">Назад</a>
                        <a style="color:black" class="btn btn_task btn_a" href='../del.php?id=<?= $_GET['id'] ?>'>Удалить</a>
                        <a style="color:black" class="btn btn_task btn_a" href='../complete.php?id=<?= $_GET['id'] ?>'>Выполнить</a>
                        <button type="submit" class="btn btn_task" onclick="">Сохранить</button>
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
</body>
</html>
