#!/bin/bash -E

# Run from repo root
MOGRIFY_IS_INSTALLED=`which mogrify`;

if [ -z $MOGRIFY_IS_INSTALLED ]; then
	echo "Looks like mogrify is not installed. Aborting."
	exit 1
fi

if [ -f ./assets/banner-1544x500.png ]; then
	rm -f ./assets/banner-772x250.png
	cp ./assets/banner-1544x500.png ./assets/banner-772x250.png
	mogrify -path ./assets -filter Triangle -define filter:support=2 -thumbnail 772 -unsharp 0.25x0.25+8+0.065 -dither None -posterize 136 -quality 82 -define jpeg:fancy-upsampling=off -define png:compression-filter=5 -define png:compression-level=9 -define png:compression-strategy=1 -define png:exclude-chunk=all -interlace none -colorspace sRGB -strip ./assets/banner-772x250.png
else
	echo "Aborting: Could not locate ./assets/banner-1544x500.png"
	exit 1
fi

if [ -f ./assets/icon-256x256.png ]; then
        rm -f ./assets/icon-128x128.png
        cp ./assets/icon-256x256.png ./assets/icon-128x128.png
        mogrify -path ./assets -filter Triangle -define filter:support=2 -thumbnail 128 -unsharp 0.25x0.25+8+0.065 -dither None -posterize 136 -quality 82 -define jpeg:fancy-upsampling=off -define png:compression-filter=5 -define png:compression-level=9 -define png:compression-strategy=1 -define png:exclude-chunk=all -interlace none -colorspace sRGB -strip ./assets/icon-128x128.png
else
        echo "Aborting: Could not locate ./assets/icon-256x256.png"
        exit 1
fi


