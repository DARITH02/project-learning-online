#!/bin/bash

cd /media/riht/DATA/coding/Laravel/project-learning-online || exit

git add .
git commit -m "Auto-commit: $(date)"
git push origin master
