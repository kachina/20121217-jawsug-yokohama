<?php
  require_once('AWSSDKforPHP/sdk.class.php');

  $credential = array(
                  'key'    => 'Access Key',
                  'secret' => 'Secret Access Key'
                );

  $instance_id = file_get_contents('http://169.254.169.254/latest/meta-data/instance-id');
  $ec2 = new AmazonEC2($credential);
  $ec2->set_region(AmazonEC2::REGION_TOKYO);
  $response = $ec2->describe_instances(array('InstanceId' => $instance_id));
  $instance = $response->body->reservationSet->item->instancesSet->item;

  echo 'Name = [' . $instance->tagSet->item->value . ']<br />';
  echo 'Instance Id = [' . $instance->instanceId . ']<br />';
  echo 'DNS Name = [' . $instance->dnsName . ']<br />';
