import pymysql

conn = pymysql.connect(host='127.0.0.1',
                       port=3306,
                       user='root',
                       passwd='',
                       db='cbr-1',
                       charset='utf8')

cursor = conn.cursor()
cursor.execute('CREATE TABLE `affiliations`( \
               `AffiliationID` VARCHAR(10) NOT NULL,\
               `AffiliationName` VARCHAR(100) NULL,\
               PRIMARY KEY (`AffiliationID`),\
               INDEX `ID` USING BTREE (`AffiliationID`))\
               ENGINE = InnoDB,\
               DEFAULT CHARACTER SET = utf8mb4')

conn.commit()