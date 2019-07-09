<form action="/PhoneController/update/<?php echo $phone[0]['id']; ?>" method="post" name="add_name" id="add_name">
    <div class="table-responsive">
        <table class="table table-bordered" >
            <tr >
                <td> <input type="text" name="phone" placeholder="Имя" class="form-control name_list"  value="<?php echo $phone[0]['phone']?>"/>
                </td>
        </table>
    </div>  <input type="submit" class="btn btn-info" value="Submit" />
</form>
