    <p style="color:crimson">WELCOME  <?php $name=$this->Session->read('account'); echo $name['tUser']['name'] ?></p>
    <form action="/xuanduc190499/chat/feed" method="POST" enctype="multipart/form-data">
        <input type = "text" name="id" style="display:none;" value="<?php if(isset($data)) echo $data['tFeed']['id']; ?>">
        <p style='color:red'>Name:</p>
        <input readonly type='text' name='name' value="<?php echo $name['tUser']['name'] ?>"></input>
        <a href="/xuanduc190499/user/logout" class='nut_log_out'>Log Out</a>
        <p style='color:blue'>Messange:</p>
        <input type = "textarea" name="message" value="<?php if(isset($data)) echo $data['tFeed']['message'];?>">
            <?php if (empty($data)) { ?>
            <input type ="submit" name = "post" value = "POST">
            <?php } else { ?>
            <input type ="submit" name = "edit" value = "EDIT" >
            <?php } ?>
        <input type="file" accept="image/*, video/*" name="data[tFeed][file]">
    </form>

    <table style="width:100%; border:1px solid black; border-collapse:collapse">
    <tr>
        <th>Ten </th>
        <th>Tin nhan</th>
        <th>Anh hoac video</th>
        <th>Thoi gian</th>
        <th>Cap nhat</th>
        <th>Xoa</th>
        <th>Sua</th>
    </tr>
    <?php foreach($chats as $chat):?>
    <tr>
        <td><?php echo $chat['tFeed']['name']; ?></td>
        <td><?php echo $chat['tFeed']['message']; ?></td>
        <?php if($chat['tFeed']['image_file_name']){ ?>
        <td><img style="width:128px;height:128px" src="/xuanduc190499/app/webroot/img/upload/<?php echo $chat['tFeed']['image_file_name'] ?>"></td>
        <?php } ?>
        <?php if($chat['tFeed']['video_file_name']){ ?>
        <td><video controls>
            <source src="/xuanduc190499/app/webroot/video/upload/<?php echo $chat['tFeed']['video_file_name'] ?>" >
        </video></td>
        <?php } else{ ?>
        <td></td>
        <?php } ?>
        <td><?php echo $chat['tFeed']['create_at']; ?></td>
        <td><?php echo $chat['tFeed']['update_at']; ?></td>
        <td><a href="/xuanduc190499/chat/edit/<?php echo $chat['tFeed']['id']; ?>">Edit</a> </td>
        <td><a href="/xuanduc190499/chat/delete/<?php echo $chat['tFeed']['id']; ?>" onclick=" confirm('Are you sure you want to delete this item?')">Delete</a></td>
    </tr>
    <?php endforeach; ?>
    </table> 
