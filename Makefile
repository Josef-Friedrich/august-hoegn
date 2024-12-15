build:
	sudo docker run --rm \
		--label=jekyll \
		--name=jekyll \
		-ti \
		--volume="$(PWD):/srv/jekyll" \
		jekyll/jekyll:latest \
		jekyll build

serve:
	sudo docker run --rm \
		--label=jekyll \
		--name=jekyll \
		--volume="$(PWD):/srv/jekyll" \
		-it -p 4000:4000 \
		jekyll/jekyll:latest \
		jekyll serve

.PHONY: build serve
