#! /bin/bash

DIR='/home/jf/git-repositories/web_august-hoegn/_archives'

_get_attribute_value() {
	cat $FILE | grep $1 | awk -F ' ' '{print $2}'
}

find $DIR -type f -print0 | while read -d $'\0' FILE ; do
	DATUM=$(_get_attribute_value datum:)
	ID=$(_get_attribute_value id:)
	echo "a${ID}a"
	#ID=$(printf '%03d' "$ID")
	#echo $ID
	#echo "${DATUM}_$ID"

	#mv $FILE $DIR/$SHORT.html
	#PROJECT_DIR=/home/jf/git-repositories/web_august-hoegn/project/exploration/interviews/files
	#mv $PROJECT_DIR/$ID $PROJECT_DIR/$SHORT
done

