<form action="/MainController/addWorkman" method="post" name="add_name" id="add_name">
    <div class="table-responsive">
        <table class="table table-bordered" >
            <tr >
                <td> <input type="text" name="name" placeholder="Имя" class="form-control name_list" />
                 <input type="text" name="surname" placeholder="Фамилия" class="form-control name_list" />
                <input type="text" name="middlename" placeholder="Отчество" class="form-control name_list" />
                <input type="email" id="email" name="email" placeholder="email" class="form-control name_list" />
                    <select class="form-control name_list" name="rooms">
                        <?php for ($index = 0; $index<count($rooms); $index++)
                            echo '<option  value="'.$rooms[$index]['id'].'">'
                                .$rooms[$index]['roomName'].'</option>';
                        ?>
                    </select>

                <input type="text" name="phone[]" placeholder="Телефон" class="form-control name_list" />
                    <div id="dynamic_field">

                    </div>
                <button type="button" name="add" id="add" class="btn btn-success">+</button>
            </tr>
        </table>

    </div>  <input type="submit" class="btn btn-info" value="Submit" onclick="checkEmail()" />
</form>
<div id="textEmail">

</div>

<script type="text/javascript" src="/assets/js/addUser.js">

</script>


