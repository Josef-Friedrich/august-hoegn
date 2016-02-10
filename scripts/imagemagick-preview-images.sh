#! /bin/sh

find photos -iname "*.jpg" -exec \
	convert \
		-resize 100 \
		-flatten {}[0] {}.jpg \;
