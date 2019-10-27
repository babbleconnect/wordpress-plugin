#!/bin/bash -E

if [ -z $1 ]; then
	echo 'Please include the path to your checked-out SVN directory as an argument'
	exit 1
fi

if [ ! -d "$1" ]; then
	echo "$1 does not appear to be a valid directory"
	exit 1
fi

# @TODO: Consider parsing readme.txt for this or otherwise getting it from somewhere (more) idiot-proof.
VERSION='1.0.0'
if [ -z $2 ]; then
	echo 'No version detected (2nd argument). Using "1.0.0".'
	read -p "That okay with you? " makesure

	makesure=${makesure,,}
	case $makesure in
		yes|y|yeah|ok|okay|si|oui|foshizzle ) makesure='';;
		* ) echo "⛔️ Aborting."; exit;;
	esac
else
	VERSION=$2
fi

DIR="$( cd "$( dirname "${BASH_SOURCE[0]}" )/.." >/dev/null && pwd )"

TRUNK="$1/trunk"
ASSETS="$1/assets"
TAGS="$1/tags/$VERSION"
SRC="$DIR/src"

if [ ! -d $TRUNK ]; then
	echo "$TRUNK was not found."
	exit 1
fi

if [ ! -d $ASSETS ]; then
        echo "$ASSETS was not found."
        exit 1
fi

if [ ! -d $SRC ]; then
        echo "$SRC was not found."
        exit 1
fi

if [ ! -d "$1/tags" ]; then
	echo "$1/tags was not found."
	exit 1
fi

rm -rf $TRUNK/*
rm -rf $ASSETS/*
rm -rf $TAGS

cp -r $SRC/* $TRUNK
cp readme.txt $TRUNK

mkdir $TAGS
cp -r $TRUNK/* $TAGS
cp -r ./assets/* $ASSETS

echo "All done."
exit
