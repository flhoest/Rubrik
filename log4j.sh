#!/bin/bash

#					__________        ___.            .__  __    
#					\______   \ __ __ \_ |__  _______ |__||  | __
#					 |       _/|  |  \ | __ \ \_  __ \|  ||  |/ /
#					 |    |   \|  |  / | \_\ \ |  | \/|  ||    < 
#					 |____|_  /|____/  |___  / |__|   |__||__|_ \
#						\/             \/                  \/ 

# Get evidence of log4j presence in any VMs snapshots (from either vmware or Nutanix AHV)
# Thanks a lot to @nboyadj who created the logic
# I only put all into music ! 

# Define variables
clusterIP=1.1.1.1
search_filter=log4j*.jar
username=user
password=secret

# Create working directory
mkdir out 2> /dev/null
rm -f out/*

# Get vm ID for vmware
echo
echo Getting list of VM IDs
echo 
curl -k -X GET "https://$clusterIP/api/v1/vmware/vm" -H "accept: application/json" -u $username:$password > vmware.json

echo 
# Get vm ID for nutanix
curl -k -X GET "https://$clusterIP/api/internal/nutanix/vm" -H "accept: application/json" -u $username:$password > nutanix.json

# Rewrite vm name : vm id 
cat vmware.json | jq '.data[] | .name + "," + .id' | sed s'|"||g' > vmware.csv
cat nutanix.json | jq '.data[] | .name + "," + .id' | sed s'|"||g' >> nutanix.csv

# Loop thru vm/vmID and search for log4j for vmware
while read line; 
do 
	vmname=$(echo "${line}" | cut -d , -f 1); 
	vmid=$(echo "${line}" | cut -d , -f 2); 
	echo Working on $vmname; 
	curl -s -k -X GET "https://$clusterIP/api/v1/vmware/vm/${vmid}/search?path=$search_filter" -H "accept: application/json" -u $username:$password > "./out/$vmname.json"; 
done < vmware.csv

# Loop thru vm/vmID and search for log4j for nutanix
while read line; 
do 
	vmname=$(echo "${line}" | cut -d , -f 1); 
	vmid=$(echo "${line}" | cut -d , -f 2); 
	echo Working on $vmname; 
	curl -s -k -X GET "https://$clusterIP/api/internal/nutanix/vm/${vmid}/search?path=$search_filter" -H "accept: application/json" -u $username:$password > "./out/$vmname.json"; 
done < nutanix.csv

echo
echo Displaying results ...
echo
# Parse JSON files
cd out
ls -1 > filelist
while read f; do cat "$f" | jq '.data[] | .path' | awk -v file="$f" '{print file","$0}' ; done < filelist
echo
echo Finished.
echo
