<?php echo Modules::run('dashboard/dashboard/cp'); ?>

<div id="dashboard">
    <h2>INBOX</h2>
        <hr/>
    <a href="/dashboard/inbox/by_date">Sort by date</a> |
    <a href="/dashboard/inbox/by_topic">Sort by topic</a> |
    <a href="/dashboard/export" target="_blank">Export Messages</a><br/>
<hr/>
    <br/>
<?php if(isset($messages) && $messages != NULL):?>
    <?php foreach($messages->result() as $message):?>
    <div class="message <?php if($message->conversation_undread == 1) echo "unread";?>">
    <h2>
    <a href="/dashboard/delete/<?php echo $message->conversation_id;?>">[DELETE]</a>
    <a href="/dashboard/show_message/<?php echo $message->conversation_id;?>">[READ] <?php echo trim(html_entity_decode($message->conversation_subject,ENT_COMPAT,'UTF-8'),"'");?></a>
    </h2>
            <p>Last reply: <?php echo date('d/m/Y H:i:s',$message->conversation_last_reply)?>
            <p></p>
        </div>
    <?php endforeach;?>
<?php else:?>
No Messages ...
<?php endif;?>
</div>
