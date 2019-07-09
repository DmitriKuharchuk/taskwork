<table class="table table-striped table-hover">
    <thead>
    <tr>
        <th>Имя</th>
        <th>Фамилия</th>
        <th>Отчетство</th>
        <th>Email</th>
        <th>Помещение</th>
        <th>Дейтсвие</th>
    </tr>
    </thead>
    <tbody>

    <?php foreach ($items as $item)
    echo
    '<tr>

        <td>'.$item['name'].'</td>
        <td>'.$item['surname'].'</td>
        <td>'.$item['middlename'].'</td>
        <td>'.$item['email'].'</td>
        <td>'.$item['roomName'].'</td>

        <td>
            <a class="btn btn-success" href="/MainController/update/'.$item['id'].'">Изменить сотрудника</a>
        <br>
            <a class="btn btn-success" href="/MainController/delete/'.$item['id'].'">Удалить сотрудника</a>
        </td>


    </tr>';

          ?>
    </tbody>
</table>

<a href="/MainController/add" class="btn btn-success">Добавить сотрудника</a>