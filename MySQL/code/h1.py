import pymysql

conn = pymysql.connect(host='127.0.0.1',
                       port=3306,
                       user='root',
                       passwd='',
                       db='cbr-1',
                       charset='utf8')

cursor = conn.cursor()
cursor.execute('CREATE TABLE `papers`( \
               `PaperID` VARCHAR(10) NOT NULL,\
               `Title` VARCHAR(1000) NULL,\
               `PaperPublishYear` VARCHAR(10) NULL,\
               `ConferencelID` VARCHAR(10) NULL,\
               PRIMARY KEY (`PaperID`),\
               INDEX `ID` USING BTREE (`PaperID`))\
               ENGINE = InnoDB,\
               DEFAULT CHARACTER SET = utf8mb4')

conn.commit()