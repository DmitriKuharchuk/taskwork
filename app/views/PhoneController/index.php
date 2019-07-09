<table class="table table-striped table-hover">
    <thead>
    <tr>
        <th>Имя</th>
        <th>Фамилия</th>
        <th>Телефон</th>
        <th>Действие</th>
    </tr>
    </thead>
    <tbody>

    <?php foreach ($phones as $item)
        echo
            '<tr>

      
        <td>'.$item['name'].'</td>
        <td>'.$item['surname'].'</td>
        <td>'.$item['phone'].'</td>

        <td>
            <a class="btn btn-success" href="/PhoneController/update/'.$item['id'].'">Изменить номер</a>
        <br>
            <a class="btn btn-success" href="/PhoneController/delete/'.$item['id'].'">Удалить номер</a>
        </td>


    </tr>';
    $index++;
    ?>
    </tbody>
</table>
