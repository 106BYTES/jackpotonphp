import pymysql
import sys
import bluetooth
from bluetooth import *

mac = "98:D3:31:90:39:CC"

def pumping():
        port = 1
        s = bluetooth.BluetoothSocket(bluetooth.RFCOMM)
        s.connect((mac, port))
        s.send("PMP;")
        data = "";

        while 1:
                data+= s.recv(1024)
                if data.find('%') != -1:
                        break

        splited = data.split(';')
        pass

pumping()

