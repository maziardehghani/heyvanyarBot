<?php
require 'Core/Message.php';

new Message(file_get_contents('php://input'));
