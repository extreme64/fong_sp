#!/bin/bash

# Sync dist folder content into a 
# public location taht app. uses.

# Use rsync to copy the contents. 
# - Efficient transfer: only copying the changed parts
# - Preserve permissions and timestamps: preserves the permissions and timestamps, maintain the original file metadata
# - Handle symbolic links: handle symbolic links correctly
# - Resume transfer: resume the transfer from where it left off
echo "START sync files"

# Set the source and destination directories
src_dir=$1 
dst_dir=$2

if [[ ! -e "$1" ]] || [[ ! -e "$2" ]]; then
  echo "Error: Bad source or destination directory!"
  exit 0
fi

#  Sync them
rsync -avz "$1/" "$2/"

echo "END sync files"