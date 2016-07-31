#!/bin/bash
# Usage: ./update_browserhax.sh <path to repos base directory> <path to pub_html root>

# You will have to adjust for hard-coded absolute file-paths used in the scripts.
# See also the setup described here: https://github.com/yellows8/3ds_browserhax_common

repobase=$1
webroot=$2

function get_repo
{
	echo "Processing $1..."
	cd "$repobase"
	if [[ -d $1 ]]; then
		cd "$1" && git pull --progress
	else
		git clone "https://github.com/yellows8/$1.git" --progress
	fi
}

function create_symlink
{
	if [ ! -L "$webroot/$2" ]; then
		ln -s "$repobase/$1" "$webroot/$2"
	fi
}

get_repo browserhax_site
get_repo 3ds_browserhax_common
get_repo browserhax_fright
get_repo 3ds_webkithax

create_symlink browserhax_site/3dsbrowserhax.php 3dsbrowserhax.php
create_symlink browserhax_site/3dsbrowserhax.php 3dsbrowserhax_auto.php
create_symlink browserhax_site/3dsbrowserhax_auto_qrcode.png 3dsbrowserhax_auto_qrcode.png

create_symlink 3ds_browserhax_common/3dsbrowserhax_common.php 3dsbrowserhax_common.php

create_symlink browserhax_fright/browserhax_fright.php browserhax_fright.php
create_symlink browserhax_fright/browserhax_fright_tx3g.php browserhax_fright_tx3g.php
create_symlink browserhax_fright/skater31hax.php skater31hax.php
create_symlink browserhax_fright/frighthax_header.mp4 frighthax_header.mp4
create_symlink browserhax_fright/frighthax_header_tx3g.mp4 frighthax_header_tx3g.mp4

# Obsolete exploits are not included here.

create_symlink 3ds_webkithax/3dsbrowserhax_webkit_r106972.php spider28hax.php
create_symlink 3ds_webkithax/spider31hax.php spider31hax.php

