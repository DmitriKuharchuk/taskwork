<table class="table table-striped table-hover">
    <thead>
    <tr>
        <th>Название помещения</th>
        <th>Действие</th>
    </tr>
    </thead>
    <tbody>

    <?php foreach ($rooms as $item)
        echo
            '<tr>

      
        <td>'.$item['roomName'].'</td>

        <td>
            <a class="btn btn-success" href="/RoomController/update/'.$item['id'].'">Изменить помещение</a>
        <br>
            <a class="btn btn-success" href="/RoomController/delete/'.$item['id'].'">Удалить помещение</a>
        </td>


    </tr>';
    $index++;
    ?>
    </tbody>
</table>

<a href="/RoomController/add" class="btn btn-success">Добавить помещение</a>