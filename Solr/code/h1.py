import pysolr
#connection
solr = pysolr.Solr('http://localhost:8983/solr/core_cbr',timeout=100)
#add data
solr.add([
    {
        "PaperID": "doc_1",
        "PaperName": "A test document",
    },
    {
        "PaperID": "doc_2",
        "PaperName": "The banana: Tasty or Dangerous?",
    },
])
solr.commit()
#search&results
results = solr.search('PaperName:banana')
[print(i) for i in results]
