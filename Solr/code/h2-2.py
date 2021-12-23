import pysolr
import pymysql
solr = pysolr.Solr('http://localhost:8983/solr/Paper',timeout=100)
solr.delete(q='*:*')
conn = pymysql.connect(host='127.0.0.1',
                       port=3306,
                       user='root',
                       passwd='',
                       db='cbr-1',
                       charset='utf8')
cursor = conn.cursor()
cursor.execute('select * from Papers')
results = cursor.fetchall()
papers = []
for data in results:
    paper = {}
    paper["PaperID"] = data[0]
    paper["Title"] = data[1]
    paper["Year"] = data[2]
    paper["ConferenceID"] = data[3]
    cursor.execute("select `ConferenceName` from `conferences` where `ConferenceID` = '%s'" % data[3])
    paper["ConferenceName"] = cursor.fetchone()
    cursor.execute("select A.`AuthorID`,`AuthorName` from paper_author_affiliation A inner join authors B on A.authorID=B.authorID where `PaperID` = '%s'" % data[0])
    for i in cursor.fetchall():
        paper.setdefault("Authors_ID", []).append(i[0])
        paper.setdefault("Authors_Name", []).append(i[1])
    papers.append(paper)
solr.add(papers)
solr.commit()
