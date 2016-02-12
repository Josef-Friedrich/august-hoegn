#! /bin/bash

find . -print0 | while read -d $'\0' FILE ; do
	FILE=${FILE:2}
	echo "---
title: 
file: $FILE
---
" > ${FILE}.html 
done

