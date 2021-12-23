import pysolr

solr = pysolr.Solr('http://localhost:8983/solr/Paper',timeout=100)

solr.delete(q='*:*')
solr.commit()