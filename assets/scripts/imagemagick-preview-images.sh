#! /bin/sh

find project/exploration/documents -iname "*.pdf" -exec \
	convert \
		-resize 600 \
		-flatten {}[0] {}_width600.png \;
