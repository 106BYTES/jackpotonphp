import pymysql
import sys
import bluetooth
from bluetooth import *


def sensoring(id, mac):	
	print "texttext"

	port = 3
	s = bluetooth.BluetoothSocket(bluetooth.RFCOMM)
	s.connect((mac, port))
	s.send("ALL;")
	
	data = "";
	
	while 1:
		data+= sock.recv(1024)
		if data.find('%') != -1:
			break
	
	splited = data.split(';')
	
	for i in splited:
		code = i[0:3]
		if code == 'MOI':
			moi = i[4:]
		if code == 'TEM' :
			temp = i[4:]
		if code == 'HUM' :
		        humi = i[4:]
		if code == 'WAT' :
		        water = i[4:]
	
	sock.close()
	
	# MySQL Connection
	conn = pymysql.connect(host='localhost', user='Default', password='1234', db='plants', charset='utf8')
	
	# Connection Cursor
	curs = conn.cursor()
	
	# SQ
	sql_head = "UPDATE plants_table SET lux = 0 , temperature = "+temp+" , humidity = "+humi+" , water = "+water+" , moisture = "+moi;
	curs.execute(sql_head+" WHERE id="+id);
	
	# Connection
	conn.close()
	
	pass

sensoring("17", "98:D3:31:90:39:CC")
