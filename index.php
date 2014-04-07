<?php
require_once "phar://iron_mq.phar";

$ironmq = new IronMQ(array(
    "token" => 'XXXXXXXXX',
    "project_id" => 'XXXXXXXXX'
));

$ironmq->postMessage($queue_name, "Test Message", array(
    "timeout" => 120, # Timeout, in seconds. After timeout, item will be placed back on queue. Defaults to 60.
    "delay" => 5, # The item will not be available on the queue until this many seconds have passed. Defaults to 0.
    "expires_in" => 2*24*3600 # How long, in seconds, to keep the item on the queue before it is deleted.
));

$ironmq->postMessages($queue_name, array("Message 1", "Message 2"), array(
    "timeout" => 120
));

$ironmq->getMessage($queue_name);

$ironmq->getMessage($queue_name, 3);

$ironmq->deleteMessage($queue_name, $message_id);

$ironmq->deleteMessages($queue_name, array("xxxxxxxxx", "xxxxxxxxx"));
