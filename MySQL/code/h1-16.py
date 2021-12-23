import pymysql

PaperID = str(input('PaperID:'))
conn = pymysql.connect(host='127.0.0.1',
                       port=3306,
                       user='root',
                       passwd='',
                       db='cbr-1',
                       charset='utf8')

cursor = conn.cursor()
sql = 'SELECT `PaperID`,`ReferenceID` FROM `paper_reference` WHERE `PaperID` =%s'
cursor.execute(sql%PaperID)
result = cursor.fetchall()
print(result)