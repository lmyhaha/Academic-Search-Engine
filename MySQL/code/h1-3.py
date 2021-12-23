import pymysql

conn = pymysql.connect(host='127.0.0.1',
                       port=3306,
                       user='root',
                       passwd='',
                       db='cbr-1',
                       charset='utf8')

cursor = conn.cursor()
cursor.execute('CREATE TABLE `authors`( \
               `AuthorID` VARCHAR(10) NOT NULL,\
               `AuthorName` VARCHAR(100) NULL,\
               PRIMARY KEY (`AuthorID`),\
               INDEX `ID` USING BTREE (`AuthorID`))\
               ENGINE = InnoDB,\
               DEFAULT CHARACTER SET = utf8mb4')

conn.commit()