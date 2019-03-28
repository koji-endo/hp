URL='https://hooks.slack.com/services/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' 
TEXT=`hostname -I`
USERNAME='beagle'
LINK_NAMES='1'  
# post 
curl="curl -X POST --data '{\"text\": \"${TEXT}\",\"username\": \"${USERNAME}\" ,\"link_names\" : ${LINK_NAMES}}' ${URL}" 
eval ${curl}
