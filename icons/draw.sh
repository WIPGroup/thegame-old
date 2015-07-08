#!/bin/bash

convert -pointsize 20 -fill black -gravity center -draw "text 2,2 '$2'" $1.png $1.png
convert -pointsize 20 -fill white -gravity center -draw "text 0,0 '$2'" $1.png $1.png
