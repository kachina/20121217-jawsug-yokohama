<?php
  require_once('AWSSDKforPHP/sdk.class.php');

  $instance_id = file_get_contents('http://169.254.169.254/latest/meta-data/instance-id');
  $ec2 = new AmazonEC2(array('default_cache_config' => '/tmp'));
  $ec2->set_region(AmazonEC2::REGION_TOKYO);
  $response = $ec2->describe_instances(array('InstanceId' => $instance_id));
  $instance = $response->body->reservationSet->item->instancesSet->item;

  echo 'Instance Id = [' . $instance->instanceId . ']<br />';
  echo 'DNS Name = [' . $instance->dnsName . ']<br />';
