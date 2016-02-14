#! /bin/bash

DIR='/home/jf/git-repositories/web_august-hoegn/_interviews'

find $DIR -type f -print0 | while read -d $'\0' FILE ; do
	echo $FILE
	SHORT=$(cat $FILE | grep short: | awk -F ' ' '{print $2}')
	echo $SHORT

	mv $FILE $DIR/$SHORT.html
done

