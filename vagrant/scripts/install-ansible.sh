#!/bin/bash

export DEBIAN_FRONTEND=noninteractive
export PYTHONUNBUFFERED=1

sudo yum -y install epel-release
sudo yum check-update

printf '**************************\n\n'
printf 'Install ansible'
printf '**************************\n\n'
sudo yum install -y python-pip python-dev python-pycurl
sudo yum -y check-update
sudo yum -y install epel-release
sudo yum -y install ansible
sudo mkdir -p /etc/ansible

printf '**************************\n\n'
printf 'Removes executable permission on hosts.ini to avoid ansible evalute this inventory like external script'
chmod -x $1/provisioning/hosts.ini
printf '**************************\n\n'

printf '**************************\n\n'
printf 'Finish install ansible'
printf '**************************\n\n'
