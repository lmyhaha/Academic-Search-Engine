import pymysql

conn = pymysql.connect(host='127.0.0.1',
                       port=3306,
                       user='root',
                       passwd='',
                       db='cbr-1',
                       charset='utf8')

cursor = conn.cursor()
cursor.execute('CREATE TABLE `paper_author_affiliation`( \
               `PaperID` VARCHAR(10) NULL,\
               `AuthorID` VARCHAR(10) NULL,\
               `AffiliationID` VARCHAR(10) NULL,\
               `AuthorSequence` VARCHAR(10) NULL,\
               PRIMARY KEY (`PaperID`,`AuthorSequence`),\
               INDEX `ID` USING BTREE (`AuthorID`,`AuthorSequence`))\
               ENGINE = InnoDB,\
               DEFAULT CHARACTER SET = utf8mb4')

conn.commit()