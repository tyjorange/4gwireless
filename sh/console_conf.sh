#!/bin/bash

ifconfig $1 $2 netmask $3
#route add default gw $4
