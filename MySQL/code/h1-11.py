import pymysql

conn = pymysql.connect(host='127.0.0.1',
                       port=3306,
                       user='root',
                       passwd='',
                       db='cbr-1',
                       charset='utf8')

cursor = conn.cursor()
cursor.execute('CREATE TABLE `paper_reference`( \
               `PaperID` VARCHAR(10) NULL,\
               `ReferenceID` VARCHAR(10) NULL,\
               INDEX `ID` USING BTREE (`PaperID`))\
               ENGINE = InnoDB,\
               DEFAULT CHARACTER SET = utf8mb4')

conn.commit()