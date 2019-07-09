<form action="/MainController/update/<?php echo $items[0]['id']; ?>" method="post" name="form" id="form">
    <div class="table-responsive">
        <table class="table table-bordered" >
            <tr >
                <td> <input type="text" name="name" placeholder="Имя" value="<?php echo $items['0']['name'] ?>" class="form-control name_list" />
                    <input type="text" name="surname" placeholder="Фамилия" value="<?php echo $items['0']['surname'] ?>" class="form-control name_list" />
                    <input type="text" name="middlename" placeholder="Отчество" value="<?php echo $items['0']['middlename'] ?>"  class="form-control name_list" />
                    <input type="email" id="email" name="email" placeholder="email" value="<?php echo $items['0']['email'] ?>" class="form-control name_list" />


                    <select class="form-control name_list" name="rooms">
                        <?php for ($index = 0; $index<count($rooms); $index++)
                            echo '<option  value="'.$rooms[$index]['id'].'">'
                                .$rooms[$index]['roomName'].'</option>';
                        ?>
                    </select>
                    <input type="text" name="phone[]" placeholder="Телефон" value="<?php echo $items['0']['phone'] ?>" class="form-control name_list" />
            </tr>
        </table>

        <input type="submit" class="btn btn-info" onclick="checkEmail();" value="Изменить" />
    </div>
</form>

<div id="textEmail">

</div>

<script src="/assets/js/getEmail.js">

</script>


