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
    <form action="./src/incs/save.php" method="post">
        <fieldset class="form_fieldset_input">
            <legend>Новая задача</legend>
            <div class="form-group">
                <label for="topic">Тема:</label>
                <input type="text" name="topic" id="topic" class="form-control" onclick="">
            </div>
            <div class="form-group">
                <label for="type">Тип:</label>
                <div class="form-control">
                    <select name="type" id="type">
                        <option value="Встреча">Встреча</option>
                        <option value="Звонок">Звонок</option>
                        <option value="Совещание">Совещание</option>
                        <option value="Дело">Дело</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="place">Место:</label>
                <input type="text" name="place" id="place" class="form-control" onclick="">
            </div>
            <div class="form-group">
                <label for="date">Дата и время:</label>
                <div class="form-control datetime">
                    <input type="date" name="date" id="date" class="date" onclick="">
                    <input type="time" name="time" id="time" class="time" onclick="">
                </div>
            </div>
            <div class="form-group">
                <label for="duration">Длительность:</label>
                <div class="form-control">
                    <select name="duration" id="duration">
                        <option value="30 минут">30 минут</option>
                        <option value="1 час">1 час</option>
                        <option value="2 часа">2 часа</option>
                        <option value="6 часов">6 часов</option>
                        <option value="Более">Более</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="comment" class="textarea_label">Комментарий:</label>
                <textarea name="comment" id="comment" class="form-control" onclick="" rows="3"></textarea>
            </div>
            <div class="form-group">
                <label></label>
                <div class="form-control">
                    <button type="submit" class="btn" onclick="">Добавить</button>
                </div>
            </div>
        </fieldset>
    </form>

    <form action="main.php?x=4&y=''" method="post">
        <fieldset class="form_fieldset_output">
            <legend>Список задач</legend>
            <div class="menu">
                <select onchange="window.location.href = this.options[this.selectedIndex].value" id="period">
                    <option value="../../../index.php">Текущие задачи</option>
                    <option value="main.php?x=1&y=Просроченные"<?= ($_GET['y']==='Просроченные'?'selected':'') ?>>Просроченные задачи</option>
                    <option value="main.php?x=2&y=Выполненные"<?= ($_GET['y']==='Выполненные'?'selected':'') ?>>Выполненные задачи</option>
                </select>
                <input type="date" name="date_out" id="date_out" onclick="">
                <button type="submit" class="btn btn_search" onclick="">Найти по дате</button>
                <!--                <nav>-->
<!--                    <a href="">сегодня</a> |-->
<!--                    <a href="">завтра</a> |-->
<!--                    <a href="">на эту неделю</a> |-->
<!--                    <a href="">на след. неделю</a>-->
<!--                </nav>-->
            </div>
            <table>
                <tr>
                    <th>Тип</th>
                    <th>Задача</th>
                    <th>Место</th>
                    <th class="special_th">Дата и время</th>
                </tr>
                <?php include '../cout_form.php';?>
            </table>
        </fieldset>
    </form>
</div>

</body>
</html>