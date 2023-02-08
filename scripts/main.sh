#!/bin/sh

echo "Creating new ssh key\n"

ssh-keygen

echo "Adding ssh keys to ssh-agent\n"

eval `ssh-agent` 
chmod 400 .ssh/id_rsa.pub 
ssh-add
ssh-add -l

echo -e "Copy this key to your OpenNebula profile and press enter: \n"
cat /root/.ssh/id_rsa.pub
read

echo "Updating Ubuntu\n"

apt update

echo "Installing git\n"

apt install git

echo "Installing OpenNebula\n"

git clone https://github.com/OpenNebula/one.git
apt install gnupg2
wget -q -O- https://downloads.opennebula.org/repo/repo.key | apt-key add -
echo "deb https://downloads.opennebula.io/repo/6.0/Ubuntu/20.04/ stable opennebula" | tee /etc/apt/sources.list.d/opennebula.list
apt update

echo "Installing ANSIBLE\n"

apt install ansible -y
ansible --version

echo "Installing OpenNebula-Tools\n"

apt-get install opennebula-tools

echo "Creating VMs\n"

Endpoint=https://grid5.mif.vu.lt/cloud3/RPC2
Web_user=varu8730
Web_pass="password"
Db_user=olpe8731
Db_pass="password"
Client_user=varu8730
Client_pass="password"

CVMREZ=$(onetemplate instantiate "ubuntu-20.04" --name "webserver_vm"  --raw TCP_PORT_FORWARDING=80 --user $Web_user --password $Web_pass --endpoint $Endpoint)
Web_ID=$(echo $CVMREZ | cut -d ' ' -f 3)
echo -e "\n\nWEBSERVER ID: ${Web_ID}"

CVMREZ=$(onetemplate instantiate "ubuntu-20.04" --name "database_vm" --user $Db_user --password $Db_pass  --endpoint $Endpoint)
Db_ID=$(echo $CVMREZ |cut -d ' ' -f 3)
echo -e "DATABASE ID: ${Db_ID}"

CVMREZ=$(onetemplate instantiate "debian11-lxde" --name "client_vm" --user $Client_user --password $Client_pass  --endpoint $Endpoint)
Client_ID=$(echo $CVMREZ |cut -d ' ' -f 3)
echo -e "CLIENT ID: ${Client_ID}\n"

echo "Creating VMs. Wait for 30s"
sleep 30

mkdir /etc/ansible

onevm show $Client_ID --user $Client_user --password $Client_pass  --endpoint $Endpoint > /etc/ansible/client.txt
onevm show $Db_ID --user $Db_user --password $Db_pass  --endpoint $Endpoint > /etc/ansible/database.txt
onevm show $Web_ID --user $Web_user --password $Web_pass  --endpoint $Endpoint > /etc/ansible/webserver.txt

IPWEB=$(cat /etc/ansible/webserver.txt | grep PRIVATE\_IP| cut -d '=' -f 2 | tr -d '"')
IPDB=$(cat /etc/ansible/database.txt | grep PRIVATE\_IP| cut -d '=' -f 2 | tr -d '"')
IPCL=$(cat /etc/ansible/client.txt | grep PRIVATE\_IP| cut -d '=' -f 2 | tr -d '"')

ssh-keygen -R $IPWEB
ssh-keygen -R $IPDB
ssh-keygen -R $IPCL

ssh-keyscan $IPWEB >> $HOME/.ssh/known_hosts
ssh-keyscan $IPDB >> $HOME/.ssh/known_hosts
ssh-keyscan $IPCL >> $HOME/.ssh/known_hosts

echo -e "[webserver]\n$IPWEB\n\n[database]\n$IPDB\n\n[client]\n$IPCL" > /etc/ansible/hosts

echo "PINGING ALL MACHINES"
ansible all -m ping
echo "PINGED"

git clone https://github.com/petrovoleh/virtualization_project.git

echo '<?php $ip="'$IPDB'"; '> /home/olpe8731/virtualization_project/conn.php
echo '$conn = pg_connect("host=".$ip." port=5432 dbname=postgres user=postgres password=2pJ7wdg_dj2"); ?>' >> /home/olpe8731/virtualization_project/conn.php


echo -e "\nPlaying Database yaml"
ansible-playbook /home/olpe8731/virtualization_project/scripts/database-vm.yaml
echo -e "\nPlaying Webserver yaml"
ansible-playbook /home/olpe8731/virtualization_project/scripts/webserver-vm.yaml
echo -e "\nPlaying Client yaml"
ansible-playbook /home/olpe8731/virtualization_project/scripts/client-vm.yaml

onevm reboot ${Client_ID} --user ${Client_user} --password ${Client_pass} --endpoint ${Endpoint}
onevm reboot ${Db_ID} --user ${Db_user} --password ${Db_pass} --endpoint ${Endpoint}
onevm reboot ${Web_ID} --user ${Web_user} --password ${Web_pass} --endpoint ${Endpoint}

echo "rebooting VMs. Wait for reboot"
echo "Everything is done"