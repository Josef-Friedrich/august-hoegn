build:
	jekyll build

serve:
	jekyll serve

serve_docker:
	docker run --rm \
		--label=jekyll \
		--name jekyll \
		--volume=$(pwd):/srv/jekyll \
		-it -p 4000:4000 \
		jekyll/jekyll:latest \
		jekyll serve --baseurl ''

.PHONY: build serve serve_docker
