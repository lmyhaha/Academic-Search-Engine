import pysolr

solr = pysolr.Solr('http://localhost:8983/solr/Paper',timeout=100)

results = solr.search('ConferenceName:IJCAI')
[print(i) for i in results]
