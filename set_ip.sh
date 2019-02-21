#!/bin/bash
function __readINI() {
  INIFILE=$1; SECTION=$2; ITEM=$3
  _readIni=`awk -F '=' '/\['$SECTION'\]/{a=1}a==1&&$1~/'$ITEM'/{print $2;exit}' $INIFILE`
 echo ${_readIni}
}

if [ -z "$1" ];then
# ipaddr
_IP0=( $( __readINI ip.conf eth0 ipaddr ) )
# netmask
_mask0=( $( __readINI ip.conf eth0 netmask ) )
# gateway 
_gate0=( $( __readINI ip.conf eth0 gateway ) )
ifconfig eth0 ${_IP0} netmask ${_mask0}
# ipaddr
_IP1=( $( __readINI ip.conf eth1 ipaddr ) )
# netmask
_mask1=( $( __readINI ip.conf eth1 netmask ) )
# gateway 
_gate1=( $( __readINI ip.conf eth1 gateway ) )
ifconfig eth1 ${_IP1} netmask ${_mask1}
exit
else
# ipaddr
_IP=( $( __readINI ip.conf $1 ipaddr ) )
# netmask
_mask=( $( __readINI ip.conf $1 netmask ) )
# gateway 
_gate=( $( __readINI ip.conf $1 gateway ) )
ifconfig $1 ${_IP} netmask ${_mask}
fi
