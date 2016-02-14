#! /bin/bash

DIR='/home/jf/git-repositories/web_august-hoegn/_interviews'

_get_attribute_value() {
	cat $FILE | grep $1 | awk -F ' ' '{print $2}'
}

find $DIR -type f -print0 | while read -d $'\0' FILE ; do
	echo $FILE
	ID=$(_get_attribute_value id:)
	echo $ID
	SHORT=$(_get_attribute_value short:)
	echo $SHORT

	#mv $FILE $DIR/$SHORT.html
	PROJECT_DIR=/home/jf/git-repositories/web_august-hoegn/project/exploration/interviews/files
	mv $PROJECT_DIR/$ID $PROJECT_DIR/$SHORT
done

