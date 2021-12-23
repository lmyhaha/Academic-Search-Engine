import pymysql

PaperID = input('PaperID:')
conn = pymysql.connect(host='127.0.0.1',
                       port=3306,
                       user='root',
                       passwd='',
                       db='cbr-1',
                       charset='utf8')

cursor = conn.cursor()
cursor.execute('SELECT `PaperID`,`Title`,`PaperPublishYear` FROM `papers` WHERE `PaperID` = ')
result = cursor.fetchone()
print(result)
