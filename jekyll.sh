#! /bin/sh

docker run --rm \
	--label=jekyll \
	--name jekyll_august_hoegn \
	--volume=$(pwd):/srv/jekyll \
	-it -p 127.0.0.1:4000:4000 \
	jekyll/jekyll:pages \
	jekyll serve --baseurl ''

