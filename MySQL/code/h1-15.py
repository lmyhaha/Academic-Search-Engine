import pymysql

paperID = input('paperID:')
conn = pymysql.connect(host='127.0.0.1',
                       port=3306,
                       user='root',
                       passwd='',
                       db='cbr-1',
                       charset='utf8')

cursor = conn.cursor()
sql = 'SELECT * FROM paper_author_affiliation A INNER JOIN authors B ON A.authorID=B.authorID WHERE `paperID` = '
cursor.execute(sql+'%s'%str(paperID))
result = cursor.fetchall()
for i in range(len(result)):
    for m in range(len(result)):
        if result[m][3] == str(i+1):
            print(result[m][3], result[m][5])
