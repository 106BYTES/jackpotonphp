import pymysql
import sys
import bluetooth
from bluetooth import *


def sensoring(id, mac):	
	port = 1
	s = bluetooth.BluetoothSocket(bluetooth.RFCOMM)
	s.connect((mac, port))
	s.send("ALL;")
	
	data = "";
	
	while 1:
		data+= s.recv(1024)
		if data.find('%') != -1:
			break
	
	splited = data.split(';')
	
	for i in splited:
		code = i[:3]
		value= i[4:]
		if code == 'MOI':
			moi = value
		if code == 'TEM' :
			temp = value
		if code == 'HUM' :
		        humi = value
		if code == 'WAT' :
		        water = value
	
	s.close()
	
	print moi+","+temp+","+humi+","+water
	
	pass

sensoring(22, "98:D3:31:90:39:CC")
