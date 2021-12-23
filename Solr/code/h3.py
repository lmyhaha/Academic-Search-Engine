import pysolr

solr = pysolr.Solr('http://localhost:8983/solr/Paper',timeout=100)

results = solr.search('Title:commonsense')
[print(i) for i in results]
