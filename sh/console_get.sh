#! /bin/bash
ifconfig $1 | grep inet | sed -n '1p' | awk '{print $2}' | awk -F ':' '{print $2}'
ifconfig $1 | grep inet | sed -n '1p' | awk '{print $4}' | awk -F ':' '{print $2}'
route -n | grep $1 | grep UG | awk '{print $2}'
