import pymysql

conn = pymysql.connect(host='127.0.0.1',
                       port=3306,
                       user='root',
                       passwd='',
                       db='cbr-1',
                       charset='utf8')

cursor = conn.cursor()
cursor.execute('CREATE TABLE `conferences`( \
               `ConferenceID` VARCHAR(10) NOT NULL,\
               `ConferenceName` VARCHAR(10) NULL,\
               PRIMARY KEY (`ConferenceID`),\
               INDEX `ID` USING BTREE (`ConferenceID`))\
               ENGINE = InnoDB,\
               DEFAULT CHARACTER SET = utf8mb4')

conn.commit()