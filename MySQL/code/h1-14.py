import pymysql

paperID = input('paperID:')
conn = pymysql.connect(host='127.0.0.1',
                       port=3306,
                       user='root',
                       passwd='',
                       db='cbr-1',
                       charset='utf8')

cursor = conn.cursor()
sql = 'SELECT `AuthorID`,`AuthorSequence` FROM `paper_author_affiliation` WHERE `paperID` = %s'
cursor.execute(sql%(paperID))
result = cursor.fetchall()
for i in range(len(result)):
    for m in range(len(result)):
        if result[m][1] == str(i+1):
            print(result[m])
