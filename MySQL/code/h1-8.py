import pymysql

with open('C:\\Users\\10490\\Desktop\\电学工程导论\\data\\affiliations.txt', 'r', encoding='UTF-8') as f:
    data = f.readlines()

data = [line.strip().split('	') for line in data]

conn = pymysql.connect(host='127.0.0.1',
                       port=3306,
                       user='root',
                       passwd='',
                       db='cbr-1',
                       charset='utf8')

cursor = conn.cursor()
for index in range(len(data)):
    if not(index%100):
        cursor.executemany('INSERT INTO affiliations (AffiliationID, AffiliationName) \
                           VALUES (%s, %s)', tuple(data[index:index+100]))
    if not(index%1000):
        conn.commit()
else:
    conn.commit()