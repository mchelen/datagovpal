#!/bin/bash 
# downloads latest copies of data.gov catalog in csv and rdf formats

# delete old csv catalog (suppress errors)
rm data_gov_catalog.csv 2>/dev/null
# download csv format
wget "http://www.data.gov/data_gov_catalog.csv"


# delete old rdf catalog (suppress errors)
rm dataset-92.rdf 2>/dev/null
# download rdf format
wget "http://www.data.gov/semantic/data/alpha/92/dataset-92.rdf.gz"
# extract gzipped rdf
gunzip "dataset-92.rdf.gz"
