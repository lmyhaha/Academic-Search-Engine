with open("F:/电类工程导论/第三周/lab1data/papers.txt", encoding="utf-8") as f1:
    data1 = f1.readlines()
with open("F:/电类工程导论/第三周/lab1data/authors.txt", encoding="utf-8") as f2:
    data2 = f2.readlines()
with open("F:/电类工程导论/第三周/lab1data/conferences.txt", encoding="utf-8") as f3:
    data3 = f3.readlines()
with open("F:/电类工程导论/第三周/lab1data/paper_author_affiliation.txt",encoding="utf-8") as f4:
    data4 = f4.readlines()
with open("F:/电类工程导论/第三周/lab1data/paper_reference.txt",encoding="utf-8") as f5:
    data5 = f5.readlines()
dic2 = {}
dic3 = {}
dic4 = {}
dic5 = {}
search_dic1={}
dic0 = {}   #年份对照
dic1 = {}   #会议ID对照
#Build Searchdic
for index,line in enumerate(data1):
    line = line.strip().split("\t")
    search_dic1[line[0]]=line[1]    # PaperID,Title,Year,ConferenceID
    dic0[line[0]]=line[2];  
    dic1[line[0]]=line[3];
print("dic1 finished");




# Build AuthorID: AuthorName dictionary
for index, line in enumerate(data2):
    line = line.strip().split("\t")
    dic2[line[0]] = line[1]            #AuthorID,AuthorName
print("dic2 finished");

# Build ConferenceID: ConferenceName dictionary
for index, line in enumerate(data3):
    line = line.strip().split("\t")
    dic3[line[0]] = line[1]             #ConfereceID,ConferenceName
# Build PaperID: AuthorID dictionary
print("dic3 finished");

for index, line in enumerate(data4):
    line = line.strip().split("\t")
    if line[0] in dic4.keys():
        dic4[line[0]].append(line[1])    #PaperID,AuthorID,AffiliationID,AuthorSeuence
    else:
        dic4[line[0]] = [line[1]]
print("dic4 finished");

# Build PaperID: ReferenceID dictionary
for index, line in enumerate(data5):    #PaperID,ReferenceID
    line =line.strip().split("\t")
    if line[0] in dic5.keys():
        dic5[line[0]].append(line[1])
    else:
        dic5[line[0]] = [line[1]]
print("dic5 finished");


def search_title(paperid):
    return search_dic1[paperid]
dic6={}
#Build PaperID:ReferenceName dictionary
for index,line in enumerate(data5):     
    line=line.strip().split("\t")
    if line[0] in dic6.keys():
        dic6[line[0]].append(search_dic1[line[1]])
    else:
        dic6[line[0]]=[search_dic1[line[1]]]
print("dic6 finished");

dic7={}
#Build PaperID:ReferenceYear dictionary
for index,line in enumerate(data5):     
    line=line.strip().split("\t")
    if line[0] in dic7.keys():
        dic7[line[0]].append(dic0[line[1]])
    else:
        dic7[line[0]]=[dic0[line[1]]]
print("dic7 finished");

dic8={}
#Build PaperID:ReferenceYear dictionary
for index,line in enumerate(data5):     
    line=line.strip().split("\t")
    if line[0] in dic8.keys():
        dic8[line[0]].append(dic3[dic1[line[1]]])
    else:
        dic8[line[0]]=[dic3[dic1[line[1]]]]
print("dic8 finished");

# add information



import pysolr
solr = pysolr.Solr('http://localhost:8983/solr/lab2', timeout=100)
solr.delete(q='*:*');
k=0
for index, line in enumerate(data1):
    line = line.strip().split("\t")
    list1 = []
    for i in dic4[line[0]]:
        list1.append(dic2[i])
    if(line[0] in dic5.keys()):
        solr.add(
        [{
        "PaperID": line[0], "Title": line[1],
        "Year": line[2], "ConferenceID": line[3],
        "ConferenceName": dic3[line[3]],
        "AuthorID": dic4[line[0]], "AuthorName": list1,
        "ReferenceID":dic5[line[0]],"ReferenceName":dic6[line[0]],
        "ReferenceYear":dic7[line[0]],"ReferenceConference":dic8[line[0]]
        },
        ])
    else:
        solr.add(
            [{
                "PaperID": line[0], "Title": line[1],
                "Year": line[2], "ConferenceID": line[3],
                "ConferenceName": dic3[line[3]],
                "AuthorID": dic4[line[0]], "AuthorName": list1,
                "ReferenceID": [""], "ReferenceName": [""],
                "ReferenceYear":[""],"ReferenceConferenceName":[""]
            },
            ])
    k+=1
    if(k%1000==0):
        print(k)
solr.commit();
